@extends('layout.master')


@section('content')
    @forelse($aperos as $apero)
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><a href="{{url('search',$apero->id)}}">{{$apero->title}}</a></h3>
            </div>
            <div class="panel-body">
                <div class="pres">
                    @if(!empty($apero->uri))
                        <img src="{{url('assets',['images',$apero->uri])}}" alt="{{$apero->uri}}">
                    @else
                        <p>aucune image</p>
                    @endif
                    <p>{{$apero->abstract}}<a href="{{url('search',$apero->id)}}">lire la suite</a></p>
                </div>
                <span>
                Date: {{$apero->date}}
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
    @empty
        <div class= panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Aucun apéros à venir</h3>
            </div>
        </div>
    @endforelse
@endsection