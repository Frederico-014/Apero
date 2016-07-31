@extends('layout.master')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">{{$apero->title}}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="clo-sm-5 col-sm-6">
                    @if(!empty($apero->uri))
                        <img class="img-responsive" src="{{url('assets',['images',$apero->uri])}}"
                             alt="{{$apero->uri}}">
                    @else
                        <p>aucune image</p>
                    @endif
                </div>
                <div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-0">
                    <p>{{$apero->content}}</p>
                </div>
            </div>
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
@endsection