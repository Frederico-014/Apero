@extends('layout.master')


@section('content')
    @forelse($aperos as $apero)
        <div>
            <h3><a href="{{url('search',$apero->id)}}">{{$apero->title}}</a></h3>
            <div>
                @if(!empty($apero->uri))
                    <img src="{{url('assets',['images',$apero->uri])}}" alt="{{$apero->uri}}">
                @else
                    <p>aucune image</p>
                @endif
                <p>{{$apero->abstract}}<a href="{{url('search',$apero->id)}}">lire la suite</a></p>
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
    @empty
        <h3>Aucun apéros à venir</h3>
    @endforelse
@endsection