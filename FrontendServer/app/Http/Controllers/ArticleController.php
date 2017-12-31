<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpseclib\Crypt\RSA;

class ArticleController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function showArticle() {
        $url = config('app.articlesServer') . 'category';
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);

        $result_json = curl_exec($cSession);
        $categories = json_decode((string) $result_json, true);
        curl_close($cSession);

        if (Auth::user()->is_admin) {
            $url = config('app.articlesServer') . 'articleWithPictures';
        } else {
            $url = config('app.articlesServer') . 'articleWithPictures/userid/' . Auth::id();
        }
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);

        $result_json = curl_exec($cSession);
        $articles = json_decode((string) $result_json, true);
        //dd($articles);
        curl_close($cSession);
        return view('article', ['categories' => $categories, 'articles' => $articles]);
    }

    public function insertArticle(Request $request){
        $url = config('app.articlesServer');

        $ch = curl_init();
        $data = $request->all();
        $privKey = auth()->user()->privateKey;
        $pubKey = auth()->user()->publicKey;

        $post = [
            'title' => $data['title'],
            'content' => $data['content'],
            'user'   => $data['user'],
            'category_id'   => $data['category_id'],
        ];
        
        // without serialization
        if (isset($data['images'])){
            if (count($data['images'])>0){
            foreach($data['images'] as $index=>$image){
                $path = $image->move('uploads/tmp', uniqid() . $image->getClientOriginalName());
                $post['images['.$index.']'] = new \CURLFile(realpath($path));
                }    
            }
        }
        

        // file with serialization
        // if (count($data['images']) > 0){
        //     foreach($data['images'] as $index=>$image){
        //         $path = $image->move('uploads/tmp', uniqid() . $image->getClientOriginalName());
        //         $post['images['.$index.']'] = realpath($path);
        //     }    
        // }

        $test = json_encode($post);

        curl_setopt($ch, CURLOPT_URL,$url.'article/insert');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post);

        // in real life you should use something like:
        // curl_setopt($ch, CURLOPT_POSTFIELDS, 
        //          http_build_query(array('postvar1' => 'value1')));

        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);

        curl_close ($ch);

        return redirect('showArticle');
    }

}
