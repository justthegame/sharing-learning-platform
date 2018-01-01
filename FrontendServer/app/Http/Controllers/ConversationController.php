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

        $ch = curl_init();
        $data = $request->all();
        $privKey = auth()->user()->privateKey;
        $pubKey = auth()->user()->publicKey;

        if($data['id']){
            $post = [
                'id' => $data['id'],
                'indonesian_text' => $data['indonesian_text'],
                'chinese_text' => $data['chinese_text'],
                'user' => $data['user'],
                'category_id' => $data['category_id'],
                'status' => $data['status'],
            ];
            $url = config('app.conversationServer') . 'keyword/edit';
        }else{
            $post = [
                'indonesian_text' => $data['indonesian_text'],
                'chinese_text' => $data['chinese_text'],
                'user' => $data['user'],
                'category_id' => $data['category_id'],
            ];
            $url = config('app.conversationServer') . 'keyword/insert';
        }
        
        $payload = json_encode($post);
        openssl_private_encrypt($payload, $encrypted, base64_decode($privKey));
        if (isset($data['voice'])) {
            $path = $data['voice']->move('uploads/tmp', uniqid() . $data['voice']->getClientOriginalName());
            $postVoice['voice'] = new \CURLFile(realpath($path));
        }
        $postVoice['payload'] = base64_encode($encrypted);
        $postVoice['user'] = $data['user'];

        $test = json_encode($post);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postVoice);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        // dd($server_output);
        curl_close($ch);

        return redirect('showConversation');
    }

    public function deleteConversation(Request $request) {
        $url = config('app.conversationServer') . 'keyword/delete';

        $data = $request->all();
        $privKey = auth()->user()->privateKey;
        $pubKey = auth()->user()->publicKey;

        $post = [
            'id' => $data['id'],
        ];

        $payload = json_encode($post);
        openssl_private_encrypt($payload, $encrypted, base64_decode($privKey));
        $postdata['payload'] = base64_encode($encrypted);
        $postdata['user'] = auth()->user()->id;
        // dd($postdata);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);
        curl_close($ch);
        return redirect('showConversation');
    }

}
