@extends("index")

@section('content')
    <h1>All books</h1><hr>
    @if (session('dialog'))
        <div class="alert alert-success">
            {{ session('dialog') }}
        </div>
    @endif

    @foreach(array_chunk($books->getCollection()->all(),4) as $block)
        <div class="row">
            @foreach($block as $book)
                <div class="col-md-3">
                    <h3>{{$book->title}}</h3>
                    <a class="btn btn-default" href="#" role="button">Users</a>
                    {{Form::open(['url' =>action('BooksController@destroy',$book->id), 'method' => 'delete'])}}
                    {{Form::hidden("id",$book->id)}}
                    {{Form::submit("delete book",['class' => 'btn btn-primary'])}}
                    {{Form::close()}}
                    <a class="btn btn-default" href="{{action('BooksController@edit',$book->id)}}" role="button">Edit</a>
                </div>
            @endforeach
        </div>
    @endforeach
    {{$books->links()}}
@stop

