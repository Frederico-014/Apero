@extends('layout.master')

@section('content')
    <form action="{{url('search')}}" method="post">
        {{csrf_field()}}
        <input type="text" autocomplete="off" name="search" autofocus="" />
        <input type="submit" value="rechercher">
    </form>
    @if(!empty($aperos))
            <ul>
                @foreach($aperos as $apero)
                <li><a href="{{ url('search',$apero->id)}}">{{$apero->title}}</a></li>
                @endforeach
            </ul>
            {{$aperos->links()}}
    @else
    @endif
@endsection