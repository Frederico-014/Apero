@extends('layout.master')

@section('content')
    <form action="{{url('search')}}" method="get">
        <div class="input-group">
            <input class="form-control" placeholder="rechercher" type="text" name="q" value="{{$search}}"/>
            <span class="input-group-btn"><button class="btn btn-primary" type="submit">Go!</button></span>
        </div>
    </form>
    <br><br>
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