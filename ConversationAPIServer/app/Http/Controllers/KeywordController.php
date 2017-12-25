<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Keyword;

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

	public function insertKeyword(Request $request)
	{
		if ($request->hasFile('voice')) {
			$data = $request->all();
			$keyword = new Keyword;
			$keyword->indonesian_text = $data['indonesian_text'];
			$keyword->chinese_text = $data['chinese_text'];
			$keyword->voice_link = $data['voice']->move('uploads', $data['voice']->getClientOriginalName().uniqid());
			$keyword->daily_usage_limit = $data['daily_usage_limit'];
			$keyword->user_record = $data['user'];
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
		$keyword = Keyword::where('id', $data['id'])->first();
		$keyword->indonesian_text = $data['indonesian_text'];
		$keyword->chinese_text = $data['chinese_text'];
		if ($request->hasFile('voice')) {
			$keyword->voice_link = $data['voice']->move('uploads', $data['voice']->getClientOriginalName().uniqid());
		}
		$keyword->daily_usage_limit = $data['daily_usage_limit'];
		$keyword->user_modified = $data['user'];
		$keyword->save();
		$json = array('success' => 'true');
    	return json_encode($json);
	}	

	public function deleteKeyword(Request $request)
	{
		$data = $request->all();
		$keyword = Keyword::where('id', $data['id'])->first();
		$keyword->delete();
		$json = array('success' => 'true');
		return json_encode($json);
	}

}
