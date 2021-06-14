<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class post extends Controller
{
    public function list(){
        $db = DB::table('posts')
        ->join('users','posts.user_id',"=","users.id")
        ->join('type','posts.type',"=","type.id")
        ->orderBy('posts.id', 'desc')                
        ->select('posts.id as post_id',
                'posts.name as post_name',
                "users.name as user_name",
                'type.name as type_name'
                )
        ->get();
        return view('posts.list',['datas'=>$db]);
    }
    public function all_user_posts(){
        $db = DB::table('posts')        
        ->join('type','posts.type',"=","type.id")
        ->orderBy('posts.id', 'desc')                
        ->select(
            "posts.*",
            "type.name as type_name"
            )
        ->where('posts.user_id',session()->get('id'))
        ->get();        
        return view('posts.users_posts',['datas'=>$db]);
    }
    public function view($id){
        $db = DB::table('posts')
                ->where('id',$id)->first();

        return view('posts.view',['datas'=>$db]);
    }
    public function post_page(){
        $db = DB::table('type')->get();
        return view('posts.add',['datas'=> $db ]);
    }
    public function post(Request $request){
        $validated = $request->validate([
            'name' => ' required | max:50 ',            
            'type' => 'required',
            'details'=>'required'
        ]);

         $user_id = $request->user_id;
         $type = $request->type;
         $name = $request->name;
         $details = $request->details;            

         DB::table('posts')->insert([
             'user_id' => $user_id,
             'type' => $type,
             'name' => $name,
             'details' => $details,
             'created_at' => now()
         ]);

         return redirect('/list')->with('message' , "post added successfully");

        }
        public function delete($id){
            DB::table('posts')->where('id',$id)->delete();
            return redirect('/list')->with('message',"your post is deleted successfully");
        }
}
