<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class users extends Controller
{
    public function home(){
        $db = DB::table('posts')
            ->join('users','posts.user_id',"=","users.id")
            ->join('type','posts.type',"=","type.id")
            ->select('posts.name as post_name',"users.name as user_name",'type.name as type_name')
            ->get();
        return view('home',['datas'=>$db]);
    }
    public function login_page(){
        return view('users.login');
    }
    public function registration_page(){
        return view('users.registration');
    }
    public function login(Request $request){
        $validated = $request->validate([
            'name' => ' required | max:50 ',
            'password' => 'required|min:3|max:20',
        ]);
        $name = $request->name;
        $password = $request->password;

        $db =  DB::table('users')->where('name',$name)->first();
        if($db==null){
            return redirect('/login_page')->with('message', 'login fiald');
        }
        if(Hash::check($password, $db->password) == true && $name == $db->name ){
            session()->put('id',$db->id);
            session()->put('name',$db->name);
            return redirect('/list')->with('message', 'login succesfull');
        }else{
            return redirect('/login_page')->with('message', 'login fiald');
        }


    }
    public function registration(Request $request){
        // validate
        $validated = $request->validate([
            'name' => 'required|unique:users,name|max:50',
            'password' => 'required|min:3|max:20',
            
        ]);

        $name = $request->name;
        $password = $request->password;
        // insert
        DB::table('users')->insert([
                    'name' => $name,
                    'password' => Hash::make($password),
                    'created_at' => now()                    
                ]);
        return redirect('/login_page')->with('message','registraton successfull , now login');

    }

    public function logout(){
        session()->flush();
        return redirect('/')->with('message','you are logout');
    }
}
