<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Picture;
use App\Category;

class ArticleController extends Controller {

    public function __construct() {
        
    }

    public function getArticle() {
        $data = Article::all();
        return $data->toJson();
    }

    public function getArticleById($id) {
        $data = Article::where('id', $id)->first();
        return $data->toJson();
    }

    public function getArticleByUserID($id) {
        $data2 = Article::where('user_record', $id)->get();
        foreach ($data2 as $article) {
            $data[$article['id']]['article'] = Article::where('id', $article['id'])->first();
            $data[$article['id']]['images'] = Picture::where('article_id', $article['id'])->get();
        }
        return json_encode($data);
    }

    public function getArticleByCategory($category) {
        $data = Category::where('name', $category)->first();
        return $data->articles->toJson();
    }

    public function getCategory() {
        $data = Category::all();
        return $data->toJson();
    }

    public function insertArticle(Request $request) {
        $data = $request->all();
        $article = new Article;
        $article->title = $data['title'];
        $article->content = $data['content'];
        $article->user_record = $data['user'];
        if ($request->has('remark')) {
            $article->remark = $data['remark'];
        }
        $article->status = "In Review";
        $article->category_id = $data['category_id'];
        $article->save();
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $picture = new Picture;
                $picture->link = $image->move('uploads/' . $data['user'] . '/' . $article->id, uniqid() . $image->getClientOriginalName());
                $picture->user_record = $data['user'];
                $picture->article_id = $article->id;
                $picture->save();
            }
        }
        $json = array('success' => 'true');
        return json_encode($json);
    }

    public function editArticle(Request $request) {
        $data = $request->all();
        $article = Article::where('id', $data['id'])->first();
        $article->title = $data['title'];
        $article->content = $data['content'];
        if ($request->has('remark')) {
            $article->remark = $data['remark'];
        }
        $article->category_id = $data['category_id'];
        $article->user_modified = $data['user'];
        $article->status = $data['status'];
        $article->save();
        $json = array('success' => 'true');
        return json_encode($json);
    }

    public function deleteArticle(Request $request) {
        $data = $request->all();
        $article = Article::where('id', $data['id'])->first();
        $article->status = "Deleted";
        $article->save();
        $json = array('success' => 'true');
        return json_encode($json);
    }

    public function insertPicture(Request $request) {
        if ($request->hasFile('image')) {
            $data = $request->all();
            $picture = new Picture;
            $picture->link = $data['image']->move('uploads/' . $data['user'] . '/' . $data['article_id'], uniqid() . $data['image']->getClientOriginalName());
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

    public function deletePicture(Request $request) {
        $data = $request->all();
        $picture = Picture::where('id', $data['id'])->first();
        $picture->status = "Deleted";
        $picture->save();
        $json = array('success' => 'true');
        return json_encode($json);
    }

}
