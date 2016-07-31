@extends('layout.admin')

@section('content')
    {!!$users->links()!!}
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Username</th>
            <th>Role</th>
            <th>Status</th>
            <th><a href="{{url('admin/user/create')}}"><input class="btn btn-lg btn-primary" type="button"
                                                               value="Ajouter"></a></th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><a href="{{url('admin',['user',$user->id,'edit'])}}">{{$user->username}}</a></td>
                <td>
                    <form class="role" action="{{url('admin',['user',$user->id])}}" method="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input name="role" type="hidden"
                               value="{{$user->status=='visitor'?'admin':'visitor'}}">
                        <input class="btn btn-lg btn-info" type="submit" value="{{$user->role}}">
                    </form>
                </td>
                <td>{{$user->status}}</td>
                <td>
                    <form class="delete" action="{{url('admin',['user',$user->id])}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input class="btn btn-danger" type="submit" value="DELETE">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!!$users->links()!!}

@endsection