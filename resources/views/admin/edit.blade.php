@extends('layout.admin')
@section('content')

    <form action="{{url('admin',['Apero',$apero->id])}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}
        {{method_field('PUT')}}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <p>
            <label for="title">Title </label>
            <input id="title" type="text" name="title" value="{{$apero->title}}">
        </p>
        <p>
            <label for="content">Abstract: </label><br/>
            <textarea id="content" name="content" rows="5" cols="50">{{$apero->abstract}}</textarea>
        </p>
        <p>
            <label for="content">Content: </label><br/>
            <textarea id="content" name="content" rows="10" cols="50">{{$apero->content}}</textarea>
        </p>
        <p>
            <label for="status">Status: </label>
            <input type="radio" name="status" value="published" {{$published}}>published
            <input type="radio" name="status" value="unpublished" {{$unpublished}}>unplublished

        </p>
        <p>
            <label for="Content">Category: </label>
            <select id="category" name="category_id">
                @foreach($categories as $id => $title)
                    <option value="{{$id}}" {{(!is_null($apero->category) && $apero->category->isCat($id))? 'selected' : ''}}>{{$title}}</option>

                @endforeach
            </select>
        </p>
        <p>
            <label for="Content">Tags: </label><br/>
            @foreach($tags as $id =>$name)
                {{$name}}<input id="{{$id}}" TYPE=CHECKBOX NAME="tags[]" value="{{$id}}" {{( !is_null($apero->tags) && $apero->isTag($id) )? 'checked' : ''}}><br/>
            @endforeach
        </p>
        @if(($apero->uri!=''))
            <p>
                <img src="{{url('assets',['images',$apero->uri])}}" alt="{{$apero->uri}}">
            <p>Supprimer<input type="checkbox" name="delete">Modifier<input name="pictureModify" type="file"></p>
            </p>
        @else
            <p>
                <input name="pictureModify" type="file">
            </p>
        @endif
        <input class="btn btn-success" type="submit">

    </form>
@endsection