@extends('layout.admin')
@section('content')
    <form action="{{url('admin/user')}}" method="post">

        {{csrf_field()}}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <p>
            <label for="username">Nom: </label>
            <input type="text" name="username" value="{{old('username')}}">
        </p>
        <p>
            <label for="email">Email: </label>
            <input type="email" name="email" value="{{old('email')}}">
        </p>
        <p>
            <label for="password">Mot de passe: </label>
            <input type="password" name="password">
        </p>
        <p>
            <label for="role">Role: </label>
            <input type="radio" name="role" value="admin">admin
            <input type="radio" name="role" value="visitor" checked>visitor
        </p>
        <input class="btn btn-success" type="submit">
    </form>
@endsection