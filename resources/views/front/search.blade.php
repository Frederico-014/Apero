@extends('layout.master')

@section('content')
    <form action="{{url('search')}}" method="get">
        <input  type="text"  name="q" value="{{$search}}"/>
        <input class="btn btn-primary" type="submit" value="rechercher">
    </form>
    @if(!empty($aperos))
        <div class="list-group">
            @foreach($aperos as $apero)
                <a class="list-group-item" href="{{ url('search',$apero->id)}}">{{$apero->title}}</a>
            @endforeach
        </div>
        {!!$aperos->render()!!}
    @else
    @endif
@endsection