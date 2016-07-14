@extends("index")

@section('content')

    <h2>{{$user->first_name}},{{$user->last_name}} profile</h2>
    <hr>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->email}}</td>
        </tr>
        </tbody>
    </table>

   <h2>{{$user->first_name}},{{$user->last_name}} books</h2>
    <hr>
    <div>
        @if ($books)
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Author:</th>
                    <th>Genre:</th>
                    <th>Year:</th>
                    <th>Title:</th>
                    <th>Action:</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{$book["author"]}}</td>
                    <td>{{$book["genre"]}}</td>
                    <td>{{$book["year"]}}</td>
                    <td>{{$book["title"]}}</td>
                    <td>
                        <a class="btn btn-default" href="{{action('BookUsersController@edit',$user->id)}}" role="button">Back to library</a>
                    </td>
                </tr>
                @endforeach
               </tbody>
            </table>
        @endif
    </div>
@stop

