@extends('layout.master')
@section('content')
    @if(Auth::guest())

        <h3><a href="{{url('login')}}">Vous devez etre connecté</a></h3>
    @else
        <form action="{{url('new')}}" method="post" enctype="multipart/form-data">

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
                <label for="email">Email </label>
                <input id="email "type="email" name="email" value="{{old('email')}}">
            </p>
            <p>
                <label for="date">Date </label>
                <input id="date "type="date" name="date">
            </p>
            <p>
                <label for="description">description: </label><br/><br/>
                <textarea id="description" name="description"  rows="10" cols="50">{{old('content')}}</textarea>
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

            <input type="submit" value="Ajouter">

        </form>
    @endif
@endsection