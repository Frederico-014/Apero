@extends('layout.master')
@section('content')
    <form class="form-inline" action="{{url('login')}}" method="post">

        {{csrf_field()}}
        <div class="form-group">
            <label  for="email">Email: </label>
            <input class="form-control" type="email" name="email" value="{{old('email')}}">
            @if($errors->has('email'))
                <span class="admin_error">{{$errors->first('email')}}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Mdp: </label>
            <input class="form-control" type="password" name="password">
            @if($errors->has('password'))
                <span class="admin_error">{{$errors->first('password')}}</span>
            @endif
        </div>
        <div class="checkbox">
            <label><input name="remember" type="checkbox">Se souvenir de moi</label>
        </div>
        <input class="btn btn-success" type="submit" value="Se Connecter">
    </form>
@endsection