@extends('layout.master')

@section('content')
    <div>
        <h3>{{$apero->title}}</h3>
        <div>
            @if(!empty($apero->uri))
                <img src="{{url('assets',['images',$apero->uri])}}" alt="{{$apero->uri}}">
            @else
                <p>aucune image</p>
            @endif
            <p>{{$apero->content}}</p>
        </div>
        <span>{{$apero->date}}</span>
        <h4> Categorie: {{$apero->category->name}}</h4>
        <h4>Tags:
            @forelse($apero->tags as $tag)
                {{$tag->name}}
            @empty
                <h4>Aucun tags</h4>
            @endforelse
        </h4>
    </div>
@endsection