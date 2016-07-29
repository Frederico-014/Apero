<?php

namespace App\Http\Controllers;

use App\Apero;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;

class AperoController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aperos = Apero::orderBy("date")->paginate(5);

        return view('admin.index', ['aperos' => $aperos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'id');
        $tags = Tag::lists('name', 'id');

        return view('admin.create', compact('categories'), compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);


        $id = [
            'user_id'=>$request->user()->id,
        ];
        $uri = [];


        if (!is_null($request->picture)) {
            $img = $request->picture;

            $uri = $this->uploadImg($img);
        }


        $new_Event = array_merge($request->all(), $uri,$id);


        $apero = Apero::create($new_Event);

        if (!empty($request->tags)) {
            $apero->tags()->attach($request->tags);
        }


        return redirect('admin/Apero')->with(['message' => 'Apero create succesfull']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::lists('name', 'id');
        $tags = Tag::lists('name', 'id');
        $published = '';
        $unpublished = '';

        $apero = Apero::find($id);




        ($apero->status == 'published') ? $published = 'checked' :
            $unpublished = 'checked';


        return view('admin.edit', compact('apero', 'categories', 'tags', 'published', 'unpublished'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $apero = Apero::find($id);
        $uri = [];



        if ($request->delete=='on')
        {
            $img=$apero->uri;

            $uri = $this->destroyImg($img);
        }

        if (!is_null($request->pictureModify)) {
            $img = $request->pictureModify;

            $this->destroyImg($apero->uri);
            $uri = $this->uploadImg($img);

        }


        $update = array_merge($request->all(), $uri);


        $apero->update($update);


        $tags = (is_null($request->tags)) ? [] : $request->tags;

        $apero->tags()->sync($tags);


        return redirect('admin/Apero')->with(['message' => 'Apéro updated with success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apero=Apero::find($id);

        $img=$apero->uri;
        $uri = $this->destroyImg($img);

        $apero->delete();

        return back()->with(['message' => 'Apéro delete with success']);

    }

    private function destroyImg($img)
    {

        $fileName=public_path(env('UPLOADS').DIRECTORY_SEPARATOR.$img);
        if (File::exists($fileName))
        {
            File::delete($fileName);
        }
        return [
            'uri'=>''
        ];
    }
    private function uploadImg($img)
    {
        $ext = $img->getClientOriginalExtension();

        $fileName = md5(uniqid(rand(), true)) . ".$ext";



        $img->move(env('UPLOADS'), $fileName);

        return   [
            'uri' => $fileName
        ];
    }
}
