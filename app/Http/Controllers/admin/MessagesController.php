<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Messages;
use App\User;
use App\BrowserKey;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Traits\helpFunctions;

class MessagesController extends Controller
{
	use helpFunctions;
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.messages_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $taisykles = array('title' => array('required', 'min:3'), 'text' => array('required', 'min:3'));
		$validator = Validator::make(Input::all(), $taisykles);

		if ($validator->fails())
		{
			Input::flash();
			return redirect('/admin/messages/create')->with('klaida', 'Neužpildyti reikalingi laukeliai')->withErrors($validator);
		} else {

			$message = new Messages;
			$message->title = Input::get("title");
			$message->text = Input::get("text");
			$message->status = Input::get("status");
			$message->save();
			$keys = array();
			if(Input::get("status")=='0'){
				$keys=BrowserKey::pluck('key')->toArray();
			}
			
			$json_data=[
				"registration_ids" => $keys,
				"notification" => [
					"body" => Input::get("text"),
					"title" => Input::get("title")
				]
			];
			$data = json_encode($json_data);
			$url = 'https://fcm.googleapis.com/fcm/send';
			$server_key = 'AAAAbQqke5I:APA91bGuP0VTRUj7SaYEZA3k1gd4hY0nTy4ZswoZAp2liuy79jbHbFnYHjGU7agS4TLCPpFskg2IIbaZHRyY3kFgoqaPS91Ts0B3fnJRY1r21dISCH6UfifYbAnYkDyte3O1Ru82PiEu';
			$headers = array(
				'Content-Type:application/json',
				'Authorization:key='.$server_key
			);
			//CURL request to route notification to FCM connection server (provided by Google)
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$result = curl_exec($ch);
			if ($result === FALSE) {
				die('Oops! FCM Send Error: ' . curl_error($ch));
			}
			curl_close($ch);
//exit($result);
            return redirect('/admin/messages')->with('gerai', 'Pranešimas sukurtas ir išsiųstas');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BrowserKey  $browserKey
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.messages', ['lapo_pavadinimas' => 'Pranešimai', 'messages' => Messages::orderBy('id', 'desc')->get(), 'users' => User::orderBy('name')->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BrowserKey  $browserKey
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BrowserKey  $browserKey
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BrowserKey  $browserKey
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
