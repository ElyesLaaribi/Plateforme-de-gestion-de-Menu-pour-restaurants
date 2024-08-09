@extends('admin.adminBase')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <div class="container">
                <h2 class="display-6 float-start">Manage Products ({{count($products)}})</h2>
                <a href="{{route('admin.product.insert')}}" class="btn btn-success float-end">Insert Product</a>
            </div>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->price}}</td>
                            <td><img src="{{asset("storage/" . $item->image)}}" width="100px" alt=""></td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->category->cat_title}}</td>
                            <td>
                                <!-- <div class="btn-group">
                                                <a href="" class="btn btn-danger">X</a>
                                            </div> -->
                                <form action="{{route('admin.product.remove', $item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{$item->id}}">

                                    <input type="submit" class="btn btn-danger" value="X">
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection