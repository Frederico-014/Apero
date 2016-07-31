<?php

namespace App\Http\Controllers;

use App\Apero;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    public function index()
    {
        $aperos = Apero::online()->where('status', '=', 'published')->orderBy("date")->take(3)->get();

        return view('front.index', ['aperos' => $aperos]);
    }

    public function newEvent()
    {
        $categories = Category::lists('name', 'id');
        $tags = Tag::lists('name', 'id');

        return view('front.new', compact('categories'), compact('tags'));
    }

    public function createEvent(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'email' => 'required|email',
            'description' => 'required'
        ]);


        $title = $request->title;
        $catogory_id = $request->category_id;
        $date = $request->date;
        $content = $request->description;
        $id = $request->user()->id;
        $uri = '';


        if (!is_null($request->picture)) {
            $img = $request->picture;

            $ext = $img->getClientOriginalExtension();

            $fileName = md5(uniqid(rand(), true)) . ".$ext";


            $uri = $fileName;

            $img->move(env('UPLOADS'), $fileName);
        }


        $new_Event = [

            'category_id' => $catogory_id,
            'user_id' => $id,
            'title' => $title,
            'content' => $content,
            'date' => $date,
            'uri' => $uri
        ];


        $apero = Apero::create($new_Event);

        if (!empty($request->tags)) {
            $apero->tags()->attach($request->tags);
        }


        return redirect('/')->with(['message' => 'Apéro create succesfull']);
    }


    public function search(Request $request)
    {
        $aperos = [];
        $search = '';
        if (!empty($request->all())) {
            $search = $request->q;
            $aperos = Apero::online()->search($search)->orderBy("date")->paginate(5)->setPath('search?q=' . $search);
        }


        return view('front.search', ['aperos' => $aperos, 'search' => $search]);
    }


    public function showApero($id)
    {
        $apero = Apero::find($id);

        return view('front.show', ['apero' => $apero]);
    }

    public function newUser()
    {
        return view('front.inscription');
    }

    public function createUser(Request $request)
    {
        $this->validate($request,[
            'username'  =>'required',
            'email' =>'required|email',
            'password' =>'required|min:8'
        ]);

        $username=$request->username;
        $email=$request->email;
        $password=Hash::make($request->password);

        $new_user=[
            'username'=>$username,
            'email'=>$email,
            'password'=>$password,
        ];

        User::create($new_user);

        return redirect('login')->with(['message'=>'Succes creation']);

    }


}
