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
        <p>
            <label for="title">Titre </label>
            <input id="title" type="text" name="title" value="{{old('title')}}">
        </p>
        <p>
            <label for="date">Date </label>
            <input id="date "type="date" name="date">
        </p>
        <p>
            <label for="abstract">abstract: </label><br/><br/>
            <textarea id="abstract" name="abstract"  rows="5" cols="50">{{old('abstract')}}</textarea>
        </p>
        <p>
            <label for="description">description: </label><br/><br/>
            <textarea id="content" name="content"  rows="10" cols="50">{{old('content')}}</textarea>
        </p>
        <p>
            <label for="Content">Category: </label>
            <select id="category_id" name="category_id">
                <option value="{{null}}"></option>
                @foreach($categories as $id => $title)
                    <option value="{{$id}}" >{{$title}}</option>
                @endforeach
            </select>
        </p>
        <p>
            <label for="status">Status: </label>
            <input type="radio" name="status" value="published">published
            <input type="radio" name="status" value="unpublished" checked>unplublished
        </p>
        <p>
            <label for="Content">Tags: </label><br/>

            @foreach($tags as $id =>$name)
                {{$name}}<input  id="{{$id}}" TYPE=CHECKBOX NAME="tags[]" value="{{$id}}" {{!empty(old('tags'))&& in_array($id,old('tags'))? 'checked':''}}><br/>
            @endforeach
        </p>
        <p>
            <input name="picture" type="file">
            @if($errors->has('picture'))
                <span class="admin error">{{$errors->first('picture')}}</span>
            @endif
        </p>

        <input class="btn btn-success" type="submit" value="Ajouter">

    </form>
@endsection