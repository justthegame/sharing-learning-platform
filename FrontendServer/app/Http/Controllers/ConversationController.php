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

}
