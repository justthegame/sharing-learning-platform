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

    public function insertArticle(Request $request) {
        $url = config('app.articlesServer');

        $data = $request->all();
        $privKey = auth()->user()->privateKey;
        $pubKey = auth()->user()->publicKey;

        //UPDATE
        if($data['id']){
            // without serialization
            if (isset($data['images'])) {
                if (count($data['images']) > 0) {
                    foreach ($data['images'] as $index => $image) {
                        $ch = curl_init();
                        $path = $image->move('uploads/tmp', uniqid() . $image->getClientOriginalName());
                        $postImage['images[' . $index . ']'] = new \CURLFile(realpath($path));
                        $postImage['id'] = $data['id'];
                        $postImage['user'] = $data['user'];
                        curl_setopt($ch, CURLOPT_URL, $url . 'picture/insert');
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $postImage);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $server_output = curl_exec($ch);
                        curl_close($ch);
                    }
                }
            }
            $post = [
                'id' => $data['id'],
                'title' => $data['title'],
                'content' => $data['content'],
                'user' => $data['user'],
                'category_id' => $data['category_id'],
                'status' => 'In Review',
            ];

            $payload = json_encode($post);
            openssl_private_encrypt($payload, $encrypted, base64_decode($privKey));
            $postdata['payload'] = base64_encode($encrypted);
            $postdata['user'] = $data['user'];
            // dd($postdata);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url . 'article/edit');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec($ch);

            curl_close($ch);
        }else{
            $ch = curl_init();

           // $post = [
           //     'title' => $data['title'],
           //     'content' => $data['content'],
           //     'user' => $data['user'],
           //     'category_id' => $data['category_id'],
           // ];
            $post = [
                'title' => $data['title'],
                'content' => $data['content'],
                'user' => $data['user'],
                'category_id' => $data['category_id'],
            ];

            $payload = json_encode($post);
            openssl_private_encrypt($payload, $encrypted, base64_decode($privKey));

            //encryt using publickey ArticleAPIServer
            // $url = 'http://localhost/sharing-learning-platform/PublickeyAPIServer/public/index.php/api/getKey/ArticleAPIServer';
            // $cSession = curl_init();
            // curl_setopt($cSession, CURLOPT_URL, $url);
            // curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($cSession, CURLOPT_HEADER, false);
            // $result_json = curl_exec($cSession);
            // $json_key = json_decode((string) $result_json, true);
            // curl_close($cSession);
            // $pubkey = base64_decode($json_key['publicKey']);
            // $status = openssl_public_encrypt(base64_encode($encrypted_user), $encrypted, $pubkey);
            // while($msg = openssl_error_string()){
            //     echo $msg . '<br>';
            // }

            // without serialization
            if (isset($data['images'])) {
                if (count($data['images']) > 0) {
                    foreach ($data['images'] as $index => $image) {
                        $path = $image->move('uploads/tmp', uniqid() . $image->getClientOriginalName());
                        $postImage['images[' . $index . ']'] = new \CURLFile(realpath($path));
                    }
                }
            }
            $postImage['payload'] = base64_encode($encrypted);
            $postImage['user'] = $data['user'];
            // dd($postImage);

            // file with serialization
            // if (count($data['images']) > 0){
            //     foreach($data['images'] as $index=>$image){
            //         $path = $image->move('uploads/tmp', uniqid() . $image->getClientOriginalName());
            //         $post['images['.$index.']'] = realpath($path);
            //     }    
            // }

            $test = json_encode($post);
    //        
    //        $secret = auth()->user()->secret;
    //        
    //        $post['signature'] = sha1($payload.$secret);

            curl_setopt($ch, CURLOPT_URL, $url . 'article/insert');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postImage);

            // in real life you should use something like:
            // curl_setopt($ch, CURLOPT_POSTFIELDS, 
            //          http_build_query(array('postvar1' => 'value1')));
            // receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec($ch);

            // dd($server_output);
            curl_close($ch);
        }

        return redirect('showArticle');
    }

}
