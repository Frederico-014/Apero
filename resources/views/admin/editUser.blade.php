<form action="{{url('admin',['user',$user->id])}}" method="post">

    {{csrf_field()}}
    method_field('PUT')}}
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
        <input type="text" name="username" value="{{$user->username}}">
    </p>
    <p>
        <label for="email">Email: </label>
        <input type="email" name="email" value="{{$user->email}}">
    </p>
    <p>
        <label for="password">Mot de passe: </label>
        <input type="text" name="password" value="{{$user->password}}">
    </p>
    <p>
        <label for="role">Role: </label>
        <input type="radio" name="role" value="admin" {{$admin}}>admin
        <input type="radio" name="role" value="visitor" {{$visitor}}>visitor
    </p>
    <input class="btn btn-success" type="submit">
</form>