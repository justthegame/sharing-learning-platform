<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Keyword;
use App\Category;

class KeywordController extends Controller
{
    public function __construct ()
	{
		
	}

	public function getKeyword()
	{
		$data = Keyword::all();
		return $data->toJson();
	}

	public function getKeywordById($id)
	{
		$data = Keyword::where('id',$id)->first();
		return $data->toJson();
	}

	public function getKeywordByUserId($id)
	{
		$data = Keyword::where('user_record',$id)->get();
		return $data->toJson();
	}

	public function getKeywordByCategory($category)
	{
		$data = Category::where('name',$category)->first();
		return $data->articles->toJson();
	}

	public function getCategory()
	{
		$data = Category::all();
		return $data->toJson();
	}	

	public function insertKeyword(Request $request)
	{
		if ($request->hasFile('voice')) {
			$data = $request->all();
	        $payload = $this->decryptData($data);
	        foreach ($payload as $key => $value) {
	            $data[$key] = $payload[$key];
	        }
			$keyword = new Keyword;
			$keyword->indonesian_text = $data['indonesian_text'];
			$keyword->chinese_text = $data['chinese_text'];
			$keyword->voice_link = $data['voice']->move('uploads', uniqid().$data['voice']->getClientOriginalName());
			$keyword->user_record = $data['user'];
			$keyword->category_id = $data['category_id'];
			$keyword->status = "In Review";
			$keyword->save();
			$json = array('success' => 'true');
	    	return json_encode($json);
	    }
	    $json = array('success' => 'false');
	    return json_encode($json);
	}

	public function editKeyword(Request $request)
	{
		$data = $request->all();
        $payload = $this->decryptData($data);
        foreach ($payload as $key => $value) {
            $data[$key] = $payload[$key];
        }
		$keyword = Keyword::where('id', $data['id'])->first();
		$keyword->indonesian_text = $data['indonesian_text'];
		$keyword->chinese_text = $data['chinese_text'];
		if ($request->hasFile('voice')) {
			$keyword->voice_link = $data['voice']->move('uploads', uniqid().$data['voice']->getClientOriginalName());
		}
		$keyword->user_modified = $data['user'];
		$keyword->category_id = $data['category_id'];
		$keyword->status = $data['status'];
		$keyword->save();
		$json = array('success' => 'true');
    	return json_encode($json);
	}	

	public function deleteKeyword(Request $request)
	{
		$data = $request->all();
        $payload = $this->decryptData($data);
        foreach ($payload as $key => $value) {
            $data[$key] = $payload[$key];
        }
		$keyword = Keyword::where('id', $data['id'])->first();
		$keyword->status = "Deleted";
		$keyword->save();
		$json = array('success' => 'true');
		return json_encode($json);
	}

    protected function decryptData($data){
        $url = config('app.publickeyServer');
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, $url.'getKey/'.$data['user']);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        $result_json = curl_exec($cSession);
        $json_key = json_decode((string) $result_json, true);
        curl_close($cSession);
        $pubkey = base64_decode($json_key['publicKey']);

        $encrypted = base64_decode($data['payload']);
        openssl_public_decrypt($encrypted, $decrypted, $pubkey);
        $payload = json_decode((string) $decrypted, true);
        
        return $payload;
    }

}
