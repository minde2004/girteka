<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BrowserKey;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
	
	public function ajax_setkey(Request $request){

		if (!\Auth::guest()){
			
			BrowserKey::updateOrCreate(array('user_id' => \Auth::user()->id), array('key' => $request->keys, 'browser' => $_SERVER['HTTP_USER_AGENT']));
			/*$browser_key->key = $request->keys;
			$browser_key->save();*/
		}
		/*$user = User::find($request->id);
		if($user->status){
			$user->status=0;
		} else {
			$user->status=1;
		}
		$user->save();*/
		return json_encode(["message" => "Ok"]);
	}
}
