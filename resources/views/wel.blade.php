@extends('layouts.index')


@section('content')


    @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <div id="charge-massage" class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            </div>
        </div>
@endif



        @foreach ($product->chunk(3) as $chunk)
        <div class="row">
            @foreach ($chunk as $products)
                          <div class="col-xs-12 col-sm-4">                      
                        <div class="panel panel-primary">
                                <div class="panel-heading">
                                    {{$products->title}}<div class="price pull-right">Stock<span class="badge">{{$products->stock}}</span></div>
                                </div>
                                <div class="panel-body align-center">
                                <img class="center-cropped img-responsive center-block" src="/images/{{$products->imgpath}}">
                                </div>
                        
                        <div class="panel-footer text-muted">
                            <p class="description">{{$products->description}}</p>
                            <p class="description">Category:{{$products->category_name}}</p>
                            <div class="price pull-left">{{$products->price}}</div>

                            <div class="clearfix"><a href="{{route('cart',['id'=>$products->id])}}" class="btn btn-success pull-right" role="button">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        {{-- item ends --}}
            @endforeach
        </div>
    @endforeach
















@stop