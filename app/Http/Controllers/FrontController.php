<?php

namespace App\Http\Controllers;

use App\Apero;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $aperos=Apero::orderBy("date")->take(3)->get();

        
        return view('front.index',['aperos'=>$aperos]);
    }

    public function newEvent ()
    {
        $categories=Category::lists('name','id');
        $tags=Tag::lists('name','id');

        return view('front.new',compact('categories'),compact('tags'));
    }

    public function createEvent (Request $request)
    {

        $this->validate($request,[
            'title'  =>'required',
            'username'  =>'required',
            'email' =>'required|email',
            'description' =>'required'
        ]);

        $username=$request->username;
        $email=$request->email;
        $title=$request->title;
        $catogory_id=$request->category_id;
        $date=$request->date;
        $content=$request->description;
        $uri='';



        $user=[
            'username'  => $username,
            'email'     => $email
        ];
        User::create($user);

        $user_id=User::where('email',$email)->get();



        if (!is_null($request->picture))
        {
            $img=$request->picture;

            $ext= $img->getClientOriginalExtension();

            $fileName=md5(uniqid(rand(),true)).".$ext";


            $uri=$fileName;

            $img->move(env('UPLOADS'),$fileName);
        }

        

        $new_Event=[

            'category_id'=>$catogory_id,
            '$user_id'=>$user_id,
            'title'=>$title,
            'content'=>$content,
            'date'=>$date,
            'uri'=>$uri
        ];



        $apero=Apero::create($new_Event);

        if (!empty($request->tags))
        {
            $apero->tags()->attach($request->tags);
        }


        return redirect('/')->with(['message'=>'apero create succesfull']);
    }


    public function searchApero()
    {
        $aperos=Apero::paginate(5);



        return view('front.search',['aperos'=>$aperos]);
    }

    public function showApero($id)
    {
        $apero=Apero::find($id);

        return view('front.show',['apero'=>$apero]);
    }



}
