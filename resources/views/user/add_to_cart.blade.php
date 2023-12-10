@extends('user.sidebar')

@section('content')
    <div class="container">
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>General Elements</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="">
                    <div class="col-md-6 col-sm-6">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>POS (Point of Sale) <small>Date: {{ date('d F Y') }}</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Settings 1</a>
                                            <a class="dropdown-item" href="#">Settings 2</a>
                                        </div>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content bs-example-popovers">

                                <div class="alert alert-success alert-dismissible " role="alert">
                                    <h2> <strong>Add To Cart</strong>  <small>by</small>  <span class="text-warning">{{ auth()->guard('seller')->user()->name }}</span>
                                        </h2>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle" scope="col">Name</th>
                                                    <th class="text-center align-middle" scope="col">Quantity</th>
                                                    <th class="text-center align-middle" scope="col">Unit Price</th>
                                                    <th class="text-center align-middle" scope="col">Total</th>
                                                    <th class="text-center align-middle" scope="col">Act</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (Cart::content() as $row)
                                                <tr>

                                                        
                                                    
                                                    <td class="align-middle" scope="row">{{ $row->name }}</td>
                                                    <td class="align-middle text-center" style="min-width:83px; padding:3px">
                                                        <form action="{{ route('update_cart', $row->rowId) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="rowId" value="{{ $row->rowId }}">
                                                            {{-- <input type="hidden" name="quantity" value="{{ $row->qty }}"> --}}
                                                            <input type="number" name="quantity" min="1" style="width:35px" value="{{ $row->qty }}">
                                                            <button type="submit" name="" id="" class="btn btn-sm btn-primary"><i class="fa fa-check"></i>
                                                        </form>
                                                    </td>
                                                    <td class="text-right align-middle">{{ $row->price() }}</td>
                                                    <td class="text-right align-middle">{{ $row->total() }}</td>
                                                    <form action="{{ route('delete_cart', $row->rowId) }}" method="POST">
                                                        @csrf
                                                        <td class="text-center align-middle p-1">
                                                            <button type="submit" name="" id="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                                            
                                                        </td>
                                                    </form>
                                                   
                                                    
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    Number of Item: {{ cart::count() }}

                                    <hr>
                                    <div class="text-right">
                                        Total: {{ cart::subtotal() }} <br>
                                        Vat: {{ cart::tax() }} <br>
                                        Grand Total: {{ cart::total() }} <br>

                                    </div>

                                </div>


                                <form action="{{ route('create_invoice') }}" method="POST">
                                    @csrf
                                    <input type="submit" value="Create Invoice" class="btn btn-sm btn-danger">
                                </form>



                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-sm-6  ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-bars"></i> All Products <small>Float right</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Settings 1</a>
                                            <a class="dropdown-item" href="#">Settings 2</a>
                                        </div>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <caption>List of all products</caption>
                                        <thead>
                                            <tr>
                                                <th class="text-center" scope="col">Sl No</th>
                                                <th class="text-center" scope="col">Product Name</th>
                                                <th class="text-center" scope="col">Price</th>
                                                <th class="text-center" scope="col">Image</th>
                                                <th class="text-center" scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $key => $product)
                                                <tr>
                                                    <form action="{{ route('add_cart') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$product->id}}">
                                                        <input type="hidden" name="name" value="{{$product->product_name}}">
                                                        <input type="hidden" name="qty" value="1">
                                                        <input type="hidden" name="price" value="{{$product->price}}">
                                                        <td class="align-middle text-center" scope="row">{{ $key + 1 }}
                                                        </td>
                                                        <td class="align-middle">{{ $product->product_name }}</td>
                                                        <td class="align-middle">{{ $product->price }}</td>
                                                        <td class="align-middle text-center"><img
                                                                src="{{ asset('/storage/images/' . $product->product_image) }}"
                                                                alt=""
                                                                style="height:50px; width:50px; border-radius:50%"></td>
                                                        <td class="align-middle text-center">
                                                            <button type="submit" href="" class="btn btn-sm btn-success"><i
                                                                    class="fa fa-plus"></i></button>
    
                                                        </td>

                                                    </form>
                                                    
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
            <div class="clearfix"></div>
        </div>
        <!-- /page content -->

    </div>
@endsection
