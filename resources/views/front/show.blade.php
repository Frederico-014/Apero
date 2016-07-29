@extends('layout.master')

@section('content')
    <div class="panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">{{$apero->title}}</h3>
        </div>
        <div class="panel-body">
            @if(!empty($apero->uri))
                <img src="{{url('assets',['images',$apero->uri])}}" alt="{{$apero->uri}}">
            @else
                <p>aucune image</p>
            @endif
            <p>{{$apero->content}}</p>

            <span>
                {{$apero->date}}
                Categorie: {{$apero->category->name}}
                Tags:
                @forelse($apero->tags as $tag)
                    {{$tag->name}}
                @empty
                    Aucun tags
                @endforelse
            </span>
        </div>
    </div>
@endsection