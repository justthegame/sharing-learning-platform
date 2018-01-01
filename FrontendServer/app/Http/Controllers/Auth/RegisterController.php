<?php

namespace App\Http\Controllers\Auth;

use DB;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        $config = array(
            "digest_alg" => "sha512",
            "private_key_bits" => 1024,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        );
        $privKey = null;
        $res = openssl_pkey_new($config);
        openssl_pkey_export($res, $privKey);
        $pubKey1 = openssl_pkey_get_details($res);
        $pubKey = base64_encode($pubKey1["key"]);
        $privKey = base64_encode($privKey);
        $secret = sha1($nextId.$data['name'].bcrypt($data['password']));

        $nextId = DB::table('users')->max('id') + 1;

        $url = config('app.publickeyServer') . 'key/' . $nextId . '/' . $pubKey;
        
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);

        $result_json = curl_exec($cSession);
        $result = json_decode((string) $result_json, true);
        curl_close($cSession);

        if ($result['success']) {
            return User::create([
                        'id' => $nextId,
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'privateKey' => $privKey,
                        'publicKey' => $pubKey,
                        'password' => bcrypt($data['password']),
                        'secret' => $secret,
            ]);
        } else {
            print_r($result);
            exit;
        }
    }

}
