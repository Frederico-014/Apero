@extends('layout.master')
@section('content')
    <form action="{{url('login')}}" method="post">

        {{csrf_field()}}
        <p>
            <label for="email">Email: </label>
            <input type="email" name="email" value="{{old('email')}}">
            @if($errors->has('email'))
                <span class="admin_error">{{$errors->first('email')}}</span>
            @endif
        </p>
        <p>
            <label for="password">Mdp: </label>
            <input type="password" name="password">
            @if($errors->has('password'))
                <span class="admin_error">{{$errors->first('password')}}</span>
            @endif
        </p>

        <input type="submit"><input type="checkbox">Se souvenir de moi

    </form>
@endsection