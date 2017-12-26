<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $url = config('app.articlesServer') . 'article';
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);

        $result_json = curl_exec($cSession);
        $articles = json_decode((string) $result_json, true);
        curl_close($cSession);

        $url = config('app.conversationServer') . 'keyword';
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);

        $result_json = curl_exec($cSession);
        $conversations = json_decode((string) $result_json, true);
        curl_close($cSession);
        return view('home', ['articles' => $articles, 'conversations' => $conversations]);
    }
    
    public function showArticle(){
        $url = config('app.articlesServer') . 'category';
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);

        $result_json = curl_exec($cSession);
        $categories = json_decode((string) $result_json, true);
        curl_close($cSession);
        
        $url = config('app.articlesServer') . 'article/userid/'.Auth::id();
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);

        $result_json = curl_exec($cSession);
        $articles = json_decode((string) $result_json, true);
        curl_close($cSession); 
        return view('article',['categories' => $categories, 'articles' => $articles]);
    }

    public function index2(Request $request) {
        //if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($request->isMethod('post')) {
            $arrSesuatu['multipart'] = array();
            foreach ($request->file('images') as $image) {
                $file = $image;
                $name = time() . '_' . $file->getClientOriginalName();
                $path = base_path() . '/uploads/';

                $file->move($path, $name);
//                array_push($arrSesuatu['multipart'], [
//                    'name' => 'images[]',
//                    'contents' => file_get_contents($path . $name),
//                    'filename' => $name
//                ]);
                $url = config('app.articlesServer') . 'article/insert';
                $client = new Client();
                $res = $client->request('POST', $url, [
                    'multipart' => [
                        [
                            'name' => 'images',
                            'contents' => file_get_contents($path . $name),
                            'filename' => $name
                        ]
                    ]
                ]);
                if ($res->getStatusCode() != 200)
                    exit("Something happened, could not retrieve data");

                $response = json_decode($res->getBody());

                var_dump($response);
                exit();
            }


            //dd($request->file('image'));
            $url = config('app.articlesServer') . 'article/insert';
            $arrData['title'] = $request->input('title');
            $arrData['user'] = Auth::id();
            $arrData['content'] = $request->input('content');
            $arrData['images'] = $request->file('images');
            $arrData['category_id'] = $request->input('category');
            dd($arrData);
            $cSession = curl_init();
            curl_setopt($cSession, CURLOPT_URL, $url);
            curl_setopt($cSession, CURLOPT_POST, true);
            curl_setopt($cSession, CURLOPT_POSTFIELDS, $arrData);
            curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($cSession, CURLOPT_HEADER, false);

            $result_json = curl_exec($cSession);
            $result = json_decode((string) $result_json, true);
            curl_close($cSession);
            dd($result_json);
        }
        $url = config('app.articlesServer') . 'article';
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);

        $result_json = curl_exec($cSession);
        $articles = json_decode((string) $result_json, true);
        curl_close($cSession);

        $url = config('app.conversationServer') . 'keyword';
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);

        $result_json = curl_exec($cSession);
        $conversations = json_decode((string) $result_json, true);
        curl_close($cSession);
        return view('home2', ['articles' => $articles, 'conversations' => $conversations]);
    }

}
