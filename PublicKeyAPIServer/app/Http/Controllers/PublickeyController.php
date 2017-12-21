<?php

namespace App\Http\Controllers;

use App\Publickey;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublickeyController extends Controller {

    public function insert($user, $key) {
        $checkUser = Publickey::where('user', $user)->count();
        $json = array('success' => 'false', 'error_message' => 'user already existing');
        if ($checkUser > 0) {
            $publickey = PublicKey::where('user', $user)
                    ->update(['publicKey' => $key]);
            $json = array('success' => 'true');
        } else {
            $publickey = new Publickey();
            $publickey->user = $user;
            $publickey->publicKey = $key;
            $publickey->save();
            $json = array('success' => 'true');
        }
        return json_encode($json);
    }

}
