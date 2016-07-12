@extends("index")

@section('content')
    <h1>All users</h1><hr>
    @foreach(array_chunk($users->getCollection()->all(),4) as $block)
        <div class="row">
            @foreach($block as $user)
                <div class="col-md-3">
                    <h3>{{$user->first_name}},{{$user->last_name}}</h3>
                    <a class="btn btn-default" href="#" role="button">Books</a>
                    {{Form::open(['url' =>action('BookUsersController@destroy',$user->id), 'method' => 'delete'])}}
                    {{Form::hidden("id",$user->id)}}
                    {{Form::submit("delete user",['class' => 'btn btn-primary'])}}
                    {{Form::close()}}
                    <a class="btn btn-default" href="{{action('BookUsersController@edit',$user->id)}}" role="button">Edit</a>
                </div>
            @endforeach
        </div>
    @endforeach
    {{$users->links()}}
@stop

