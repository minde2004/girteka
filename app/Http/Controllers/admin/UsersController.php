<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Traits\helpFunctions;

class UsersController extends Controller
{
	use helpFunctions;
	public function ajax_on_off(Request $request){
		$user = User::find($request->id);
		if($user->status){
			$user->status=0;
		} else {
			$user->status=1;
		}
		$user->save();
		return json_encode(["status" => $user->status, "id" => $request->id]);
	}
    public function show()
    {
        return view('admin.users', ['lapo_pavadinimas' => 'Vartotojai', 'users' => User::orderBy('level', 'desc')->orderBy('name')->get()]);
    }
	
	public function search()
    {
		if(null!==Input::get("table_search")){
			$users = User::where('name', 'like', '%'.Input::get("table_search").'%')->orWhere('email', 'like', '%'.Input::get("table_search").'%')->orderBy('level', 'desc')->orderBy('name')->get();
		} else {
			$users = User::orderBy('level', 'desc')->orderBy('name')->get();
		}
        return view('admin.users', ['lapo_pavadinimas' => 'Vartotojai', 'users' => $users]);
    }
	
	public function create()
    {
        return view('admin.users_create', ['users' => User::orderBy('level', 'desc')->orderBy('name')->get()]);
    }
	
	public function store()
    {
		$taisykles = array('name' => array('required', 'min:3'), 'email' => array('Unique:users,email'), 'password' => array('required', 'min:5'));
		$validator = Validator::make(Input::all(), $taisykles);

		if ($validator->fails())
		{
			Input::flash();
			return redirect('/admin/users/create')->with('klaida', 'Neužpildyti reikalingi laukeliai')->withErrors($validator);
		} else {

			$user = new User;
			$user->name = Input::get("name");
			$user->email = Input::get("email");
			$user->password = bcrypt(Input::get("password"));
			$user->level = Input::get("level");
			$user->status = 1;
			$user->save();
            return redirect('/admin/users')->with('gerai', 'Vartotojas sukurtas sėkmingai');
		}
    }
	
	public function edit($id)
    {
		return view('admin.users_edit', ['user' => User::find($id), 'id' => $id]);
	}
	
	public function update($id)
    {
		$taisykles = array('name' => array('required', 'min:3'), 'email' => array('Required','Between:3,64','Email','Unique:users,email,'.$id));
		if(Input::get("password")!=""){
				$taisykles["password"]=array('required', 'min:5');
			}
		$validator = Validator::make(Input::all(), $taisykles);

		if ($validator->fails())
		{
			Input::flash();
			return redirect('/admin/users/'.$id.'/edit')->with('klaida', 'Neužpildyti reikalingi laukeliai')->withErrors($validator);
		} else {

			$user = User::find($id);
			$user->name = Input::get("name");
			$user->email = Input::get("email");
			if(Input::get("password")!=""){
				$user->password = bcrypt(Input::get("password"));
			}
			$user->level = Input::get("level");
			$user->status = $this->checkbox(Input::get("status"));
			$user->save();
            return redirect('/admin/users')->with('gerai', 'Vartotojas paredaguotas sėkmingai');
		}
	}
}
