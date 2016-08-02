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
        <div class="form-group">
            <label for="title">Title </label>
            <input class="form-control w33" id="title" type="text" name="title" value="{{$apero->title}}">
        </div>
        <div class="form-group">
            <label for="content">Abstract: </label><br/>
            <textarea class="form-control" id="content" name="content" rows="5"
                      cols="50">{{$apero->abstract}}</textarea>
        </div>
        <div class="form-group">
            <label for="content">Content: </label><br/>
            <textarea class="form-control" id="content" name="content" rows="10"
                      cols="50">{{$apero->content}}</textarea>
        </div>
        <div class="form-group ">
            <label class="control-label" for="status">Status: </label>
            <label class="radio-inline"><input type="radio" name="status" value="published" {{$published}}>published</label>
            <label class="radio-inline"></label><input type="radio" name="status" value="unpublished" {{$unpublished}}>unplublished</label>
        </div>
        <div class="form-group">
            <label for="Content">Category: </label>
            <select class="form-control w33" id="category" name="category_id">
                @foreach($categories as $id => $title)
                    <option value="{{$id}}" {{(!is_null($apero->category) && $apero->category->isCat($id))? 'selected' : ''}}>{{$title}}</option>

                @endforeach
            </select>
        </div>
        <div id="div_checkbox" class="form-group">
            <label class="control-label" for="tags">Tags: </label>
            @foreach($tags as $id =>$name)
                <label class="checkbox-inline">
                    <input id="{{$id}}" TYPE=CHECKBOX NAME="tags[]"
                           value="{{$id}}" {{!empty(old('tags'))&& in_array($id,old('tags'))? 'checked':''}}>{{$name}}
                </label>
            @endforeach
        </div>
        @if(($apero->uri!=''))
            <img src="{{url('assets',['images',$apero->uri])}}" alt="{{$apero->uri}}">
            <div class="form-inline">
                <div class="form-group">
                    <input class="form-control" type="checkbox" name="delete">Supprimer
                    <input class="form-control" name=" pictureModify" type="file">Modifier
                </div>
            </div>
        @else
            <div class="form-group">
                <input class="form-control" name="pictureModify" type="file">
            </div>
        @endif
        <input class="btn btn-success" type="submit">

    </form>
@endsection