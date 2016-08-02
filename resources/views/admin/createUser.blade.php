@extends('layout.admin')
@section('content')
    <form  action="{{url('admin/user')}}" method="post">

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
        <div class="form-group">
            <label for="username">Nom: </label>
            <input class="form-control w33" type="text" name="username" value="{{old('username')}}">
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input class="form-control w33" type="email" name="email" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe: </label>
            <input class="form-control w33" type="password" name="password">
        </div>
        <div class="form-group">
            <label class="control-label" for="role">Role: </label>
            <label class="radio-inline"><input type="radio" name="role" value="admin">admin</label>
            <label class="radio-inline"><input type="radio" name="role" value="visitor" checked>visitor</label>
        </div>
        <input class="btn btn-success" type="submit">
    </form>
@endsection