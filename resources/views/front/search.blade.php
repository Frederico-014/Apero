@extends('layout.master')

@section('content')

    @forelse($aperos as $apero)
        <h3><a href="{{url('search',$apero->id)}}">{{$apero->title}}</a></h3>
    @empty
        <h3>Aucun Apero</h3>
    @endforelse
        <h4>{{$aperos->links()}}</h4>
@endsection