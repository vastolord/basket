@extends('layouts.admin')



@section('content')


    <h1>Posts index</h1>
    @if(Session::has('deleted_user'))

        <p class="bg-danger">{{session('deleted_user')}}</p>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>ID </th>
            <th>imgpath</th>
            <th>title</th>
            <th>Desc</th>
            <th>Price</th>
            <th>Stocks</th>
            <th>Catagory</th>
            <th>Created</th>
            <th>Updated</th>

        </tr>
        </thead>
        <tbody>

        @if($posts)

            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    {{--<td>{{$post->imgpath}}</td>--}}
                   {{-- //<td><img height="50" src="{{$post->photo ? $post->photo->file:'https:/placehold.it/400x400'}}" alt=""></td>--}}
                    <td><img height="50" src="/images/{{$post->imgpath}}" alt=""></td>
                    <td>{{$post->title}}</td>


                    <td>{{$post->description}}</td>
                    <td>{{$post->price}}</td>
                    <td>{{$post->stock}}</td>
                    <td>{{$post->category_id}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>

            @endforeach
        @endif
        </tbody>
    </table>

@stop