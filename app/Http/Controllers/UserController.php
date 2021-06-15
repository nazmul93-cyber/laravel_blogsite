<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function create(Request $request) {

        // return "it works";

        // dd($request);   // json file sent | inside requset parameters form sent data can be found

        // $myName = $request->name;    // shows the name sent
        // return $myName;



        // one way 

        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->designation = $request->designation;

        // $user->save();

        // dd($user);

        // alt way      // in this way, Model $fillablie or $guarded fields must be set

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'designation'=>$request->designation
        ]);


        return redirect('/read');

    }

    public function read(Request $req) {

        // $user = User::all();
        // $user = User::Paginate(5);      //  5 data per page
        // $user = User::get('name');

        // $id = $req->search;
        // $user = User::where('id',$id)->get();

        $name = $req->search;
        // $user = User::where('name','like','%'.$name.'%')->get();  
        $user = User::where('name','like','%'.$name.'%')->paginate(5);   // 5 data per page
        // $user = User::where('name','like','%'.$name.'%')->simplePaginate(5);   // 5 data per page
        // $user = User::where('name','like','%'.$name.'%')->cursorPaginate(5);   // 5 data per page    // did not work 


        //using query builder
        // $user = DB::table('users')->get();
        // $user = DB::table('users')->paginate(5);


       return view('readEdit',['kuser'=>$user]);
    }

    public function delete($id) {

        // User::find($id)->delete();
        
        // or
        User::where('id',$id)->delete();

       return redirect('/read');

    }

    public function upForm($id) {

        $user = User::find($id);

        return view('updateForm',['uprow'=>$user]);
    }

    public function update(Request $req) {

        $user = User::find($req->id)->update([
            'name' => $req->name,
            'email' => $req->email,
            'designation' => $req->designation

        ]);

        // or 
        // $user->name = $req->name;
        // $user->email = $req->email;
        // $user->designation = $req->designation;

        // $user->save();

        return redirect('/read');
    }
}
