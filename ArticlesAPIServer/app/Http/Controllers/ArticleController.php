<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Picture;
use App\Category;

class ArticleController extends Controller
{
    public function __construct ()
	{
		
	}

	public function getArticle()
	{
		$data = Article::all();
		return $data->toJson();
	}

	public function getArticleById($id){
		$data = Article::where('id',$id)->first();
		return $data->toJson();
	}

	public function getArticleByCategory($category){
		$data = Category::where('name',$category)->first();
		return $data->articles->toJson();
	}

	public function insertArticle(Request $request)
	{
		$data = $request->all();
		$article = new Article;
		$article->title = $data['title'];
		$article->content = $data['content'];
		$article->user_record = $data['user'];
		if ($request->has('remark')) {
			$article->remark = $data['remark'];
		}
		$article->save();
		$article->categories()->sync($data['categories']);
		if ($request->hasFile('images')) {
			$images = $request->file('images');
			foreach ($images as $image) {
				$picture = new Picture;
				$picture->link = $image->move('uploads/'.$data['user'].'/'.$article->id, uniqid().$image->getClientOriginalName());
				$picture->user_record = $data['user'];
				$picture->article_id = $article->id;
				$picture->save();
			}
		}
		$json = array('success' => 'true');
    	return json_encode($json);
	}

	public function editArticle(Request $request)
	{
		$data = $request->all();
		$article = Article::where('id', $data['id'])->first();
		$article->title = $data['title'];
		$article->content = $data['content'];
		if ($request->has('remark')) {
			$article->remark = $data['remark'];
		}
		$article->categories()->sync($data['categories']);
		$article->user_modified = $data['user'];
		$article->save();
		$json = array('success' => 'true');
    	return json_encode($json);
	}	

	public function deleteArticle(Request $request)
	{
		$data = $request->all();
		$article = Article::where('id', $data['id'])->first();
		$article->delete();
		$json = array('success' => 'true');
		return json_encode($json);
	}

	public function insertPicture(Request $request)
	{
		if ($request->hasFile('image')) {
			$data = $request->all();
			$picture = new Picture;
			$picture->link = $data['image']->move('uploads/'.$data['user'].'/'.$data['article_id'], uniqid().$data['image']->getClientOriginalName());
			if ($request->has('remark')) {
				$picture->remark = $data['remark'];
			}
			$picture->user_record = $data['user'];
			$picture->article_id = $data['article_id'];
			$picture->save();
			$json = array('success' => 'true');
			return json_encode($json);
		}
		$json = array('success' => 'false');
		return json_encode($json);
    	
	}

	public function deletePicture(Request $request)
	{
		$data = $request->all();
		$picture = Picture::where('id', $data['id'])->first();
		$picture->delete();
		$json = array('success' => 'true');
		return json_encode($json);
	}
}
