@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-8">
      <div class="card">

        <div class="card-header bg-success text-center">
          Product List
        </div>
        <div class="card-body">
          @if(session('deletestatus'))
          <div class="alert alert-danger">
              {{session('deletestatus')}}
          </div>
          @endif
          <table class="table table-bordered">
              <thead>
                <tr>
                   <th scope="col">Sl No</th>
                   <th scope="col">Product Name</th>
                   <th scope="col">Product Description</th>
                   <th scope="col">Product Price</th>
                   <th scope="col">Product Quantity</th>
                   <th scope="col">Alert Quantity</th>
                   <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>
                  @forelse($products as $product)
                <tr>

                  <td >{{$loop->index+1}}</td>
                  <td >{{$product->product_name}}</td>
                  <td >{{$product->product_description}}</td>
                  <td >{{$product->product_price}}</td>
                  <td >{{$product->product_quantity}}</td>
                  <td >{{$product->alert_quantity}}</td>
                  <td>
                    <div class="btn-group" role="group">
                      <a href="{{url('delete/product')}}/{{$product->id}}" class="btn btn-sm btn-danger">Delete</a>
                      <a href="{{url('edit/product')}}/{{$product->id}}" class="btn btn-sm btn-primary">Update</a>
                    </div>

                  </td>
                  @empty
                  <td colspan="6" class="text-center text-info "> No Data Show</td>

               </tr>
                 @endforelse
             </tbody>
          </table>
          {{$products->links()}}
        </div>

      </div>
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-header bg-success">
        Add  Product Form
        </div>
        <div class="card-body">
            @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif


                @if($errors->all())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                  @endforeach
                </div>
                @endif

          <form action="{{ url('add/product/insert') }}" method="post">
            @csrf
             <div class="form-group">
               <label >Product Name</label>
               <input type="text" class="form-control"  placeholder="Enter your product name" name="product_name" value="{{old('product_name')}}">
             </div>
             <div class="form-group">
                <label >Product Description</label>
                <textarea class="form-control" rows="3" placeholder="Enter your product description" name="product_description">{{old('product_description')}}</textarea>
             </div>
             <div class="form-group">
               <label >Product Price</label>
               <input type="text" class="form-control"  placeholder="Enter your product price" name="product_price" value="{{old('product_price')}}">
             </div>
             <div class="form-group">
               <label >Product Quantity</label>
               <input type="text" class="form-control"  placeholder="Enter your product quantity" name="product_quantity" value="{{old('product_quantity')}}">
             </div>
             <div class="form-group">
               <label >Alert Quantity</label>
               <input type="text" class="form-control"  placeholder="Enter your product alert" name="alert_quantity" value="{{old('alert_quantity')}}">
             </div>
             <button type="submit" class="btn btn-primary">Submit</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
