<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function showConversation() {
        $url = config('app.conversationServer') . 'category';
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);

        $result_json = curl_exec($cSession);
        $categories = json_decode((string) $result_json, true);
        curl_close($cSession);

        if (Auth::user()->is_admin) {
            $url = config('app.conversationServer') . 'keyword';
        } else {
            $url = config('app.conversationServer') . 'keyword/userid/' . Auth::id();
        }
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);

        $result_json = curl_exec($cSession);
        $conversations = json_decode((string) $result_json, true);
        //dd($articles);
        curl_close($cSession);
        return view('conversation', ['categories' => $categories, 'conversations' => $conversations]);
    }
    
    public function insertConversation(Request $request) {
        $url = config('app.conversationServer');

        $ch = curl_init();
        $data = $request->all();
        $privKey = auth()->user()->privateKey;
        $pubKey = auth()->user()->publicKey;

//        $post = [
//            'title' => $data['title'],
//            'content' => $data['content'],
//            'user' => $data['user'],
//            'category_id' => $data['category_id'],
//        ];
        $post = [
            'indonesian_text' => $data['indonesian_text'],
            'chinese_text' => $data['chinese_text'],
            'content' => $data['content'],
            'user' => $data['user'],
            'category_id' => $data['category_id'],
        ];

        $payload = json_encode($post);
        openssl_private_encrypt($payload, $encrypted, $privKey);
        // without serialization
        if (isset($data['voice'])) {
            if (count($data['voice']) > 0) {
                foreach ($data['voice'] as $index => $voice) {
                    $path = $voice->move('uploads/tmp', uniqid() . $voice->getClientOriginalName());
                    $postVoice['voice[' . $index . ']'] = new \CURLFile(realpath($path));
                }
            }
        }
        $postVoice['payload'] = $encrypted;


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

        curl_setopt($ch, CURLOPT_URL, $url . 'keyword/insert');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postVoice);

        // in real life you should use something like:
        // curl_setopt($ch, CURLOPT_POSTFIELDS, 
        //          http_build_query(array('postvar1' => 'value1')));
        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        dd($server_output);
        curl_close($ch);

        return redirect('showConversation');
    }

}
