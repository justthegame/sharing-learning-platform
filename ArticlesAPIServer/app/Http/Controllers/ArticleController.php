<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Article;
use Picture;

class ArticleController extends Controller
{
    public function __construct ()
	{
		
	}

	public function insertArticle(Request $request)
	{
		$data = $request->all();
		$keyword = new Article;
		$keyword->title = $data['title'];
		$keyword->content = $data['content'];
		$keyword->remark = $data['remark'];
		$keyword->user_record = $data['user'];
		$keyword->save();
		$json = array('success' => 'true');
    	return json_encode($json);
	}

	public function editArticle(Request $request)
	{
		$data = $request->all();
		$keyword = Article::where('id', $data['id'])->first();
		$keyword->title = $data['title'];
		$keyword->content = $data['content'];
		$keyword->remark = $data['remark'];
		$keyword->user_modified = $data['user'];
		$keyword->save();
		$json = array('success' => 'true');
    	return json_encode($json);
	}	

	public function deleteArticle(Request $request)
	{
		$data = $request->all();
		$keyword = Article::where('id', $data['id'])->first();
		$keyword->delete();
		$json = array('success' => 'true');
	}

	public function deletePicture(Request $request)
	{
		$data = $request->all();
		$keyword = Picture::where('id', $data['id'])->first();
		$keyword->delete();
		$json = array('success' => 'true');
	}
}
