@extends('layout.admin')

@section('content')
    <form action="{{url('admin/Apero')}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}
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
            <label for="title">Titre </label>
            <input class="form-control w33" id="title" type="text" name="title" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="date">Date </label>
            <input class="form-control w33" id="date " type="date" name="date">
        </div>
        <div class="form-group">
            <label for="abstract">abstract: </label><br/><br/>
            <textarea class="form-control" id="abstract" name="abstract" rows="5"
                      cols="50">{{old('abstract')}}</textarea>
        </div>
        <div class="form-group">
            <label for="description">description: </label><br/><br/>
            <textarea class="form-control" id="content" name="content" rows="10" cols="50">{{old('content')}}</textarea>
        </div>
        <div class="form-group">
            <label for="Content">Category: </label>
            <select class="form-control w33" id="category_id" name="category_id">
                <option value="{{null}}"></option>
                @foreach($categories as $id => $title)
                    <option value="{{$id}}">{{$title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label" for="status">Status: </label>
            <label class="radio-inline"><input type="radio" name="status" value="published">published</label>
            <label class="radio-inline"><input type="radio" name="status" value="unpublished" checked>unplublished</label>
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
        <p>
            <input name="picture" type="file">
            @if($errors->has('picture'))
                <span class="admin error">{{$errors->first('picture')}}</span>
            @endif
        </p>

        <input class="btn btn-success" type="submit" value="Ajouter">

    </form>
@endsection