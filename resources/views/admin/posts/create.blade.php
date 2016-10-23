@extends('layouts.admin')



@section('content')


    <h1>Create Cart</h1>

    {!! Form::open(['method'=>'post','action'=>'AdminPostsController@store','files'=>'true']) !!}
   {{-- <div class="form-group">

        {!! Form::label('imgpath','imgpath:') !!}
        {!! Form::text('imgpath',null,['class'=>'form-control']) !!}
    </div>
--}}



    <div class="form-group">

        {!! Form::label('title','Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>



    <div class="form-group">

        {!! Form::label('price','Price:') !!}
        {!! Form::text('price',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">

        {!! Form::label('stock','stock:') !!}
        {!! Form::text('stock',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">

        {!! Form::label('imgpath','Photo:') !!}
        {!! Form::file('imgpath',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">

        {!! Form::label('category_id','Category:') !!}
        {!! Form::select('category_id',[''=>'Chose Options']+$category->all(),null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">

        {!! Form::label('description','Discription:') !!}
        {!! Form::textarea('description',null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}

    </div>
    {{csrf_field()}}

    {!! Form::close() !!}




@stop