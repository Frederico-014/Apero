@extends('layout.admin')

@section('content')
    <table>
        <tr>
            <th>Publication</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Date de l'evenement</th>
            <th><a href="{{url('admin/Apero/create')}}"><input type="button" value="Ajouter"></a></th>

        </tr>
        @foreach($aperos as $apero)
            <tr>
                <td>
                    <form class="status" action="{{url('admin',['Apero',$apero->id])}}" method="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input name="status" type="hidden" value="{{$apero->status=='published'?'unpublished':'published'}}">
                        <input type="submit" value="{{$apero->status}}">
                    </form>
                </td>
                <td><a href="{{url('admin',['Apero',$apero->id,'edit'])}}">{{$apero->title}}</a></td>
                <td>{{$apero->user->username}}</td>
                <td>
                    {{$apero->date}}
                </td>
                <td>
                    <form class="delete" action="{{url('admin',['Apero',$apero->id])}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input type="submit" value="DELETE">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!!$aperos->links()!!}
@endsection