@extends('admin.layouts.master')
@section('page')
view product
@endsection
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="content">
               <div class="col-md-12">
                @if(session()->has('message'))
                <div class="alert alert-success" >
                  <strong>{{ session()->get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
                </div>
            @endif
                <div class="card">
                    <div class="header">
                        <h4 class="title">All Products</h4>
                        <p class="category">List of all stock</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Desc</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $product )


                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->description}}</td>
                                <td>

                                    <img src="{{asset('uploads_image/'.$product->image)}}" width="50px" height="50px">

                                </td>
                                <td>
                                   <a href="{{route('edit',$product->id)}}"> <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button></a>
                                   <a href="{{route('delete',$product->id)}}" ><button class="btn btn-sm btn-danger ti-trash" title="Delete"></button></a>
                                  <a href="{{route('products.details',$product->id)}}">  <button class="btn btn-sm btn-primary ti-view-list-alt" title="Details"></button></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
