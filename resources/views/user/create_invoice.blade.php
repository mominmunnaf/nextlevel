@extends('user.sidebar')

@section('content')
    <div class="container">
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Invoice  </h3>
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Invoice Design <small> </small></h2>
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

                                <section class="content invoice">
                                    <!-- title row -->
                                    <div class="row">
                                        <div class="">
                                            <div class="row">
                                                <div class="col col-lg-6"><h1>Invoice </h1></div>
                                               
                                            </div>
                                            
                                            
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">
                                            From
                                            <address>
                                                <strong><span class="text-danger">Next</span> <span class="text-success">Level</span></strong>
                                                <br>795 Freedom Ave, Suite 600
                                                <br>New York, CA 94107
                                                <br>Phone: 1 (804) 123-9876
                                                <br>Email: ironadmin.com
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            To
                                            <address>
                                                <strong>{{ auth()->guard('seller')->user()->name }}</strong>
                                                <br>795 Freedom Ave, Suite 600
                                                <br>New York, CA 94107
                                                <br>Phone: 1 (804) 123-9876
                                                <br>Email: {{ auth()->guard('seller')->user()->email }}
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <b>Invoice #007612</b>
                                            <br>
                                            <br>
                                            <b>Order ID:</b> 1
                                            <br>
                                            <b>Order Date:</b> {{ date('d F Y h:i:s') }}
                                            <br>
                                            <b>Order Time:</b> {{ date('h:i:s') }}
                                            <br>
                                            <b>Order Status:</b> <span class="label label-danger">Pending</span>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- Table row -->
                                    <form action="{{ route('order_confirm') }}" class="text-right" method="POST">
                                        @csrf


                                    <div class="row">
                                        <div class="  table">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Sl No</th>
                                                        <th class="text-center">Product Id No</th>
                                                        <th>Product Name</th>
                                                        <th class="text-center">Quantity</th>
                                                        <th class="text-right">Unit Price</th>
                                                        <th class="text-right">Total Price</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $sl = 1;
                                                @endphp
                                                <tbody>
                                                    @foreach ($carts as $key => $item)
                                                    <tr>
                                                        <td class="text-center">{{ $sl++ }}</td>
                                                        <td class="text-center">{{ $item->id }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td class="text-center">{{ $item->qty }}</td>
                                                        <td class="text-right">{{ $item->price() }}</td>
                                                        <td class="text-right">{{ $item->subtotal() }}</td>
                                                    </tr>
                                                        
                                                    @endforeach
                                                    
                                                    
                                                    
                                                    
                                                </tbody>
                                            </table>
                                            <h4>Total Products: {{ cart::count() }}</h4>
                                            
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <div class="row">
                                        <!-- accepted payments column -->
                                        <div class="col-md-6 text-left">
                                            <p class="lead">Tarms & Conditions:</p>
                                            
                                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                                1. Purchase only "Cash on delivery" <br>
                                                2. You may place any objection within 01 day <br>
                                                3. Any tempering by you will not be acceptable. <br>
                                                4. Shipping charge not refundable <br><br>
                                                <strong><span class="text-danger">Next</span><span class="text-success">Level</span></strong>
                                            </p>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <p class="lead">Amount Due 2/22/2014</p>
                                            <div class="table-responsive table-bordered">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th style="width:50%">Subtotal:</th>
                                                            <td class="text-right">{{ cart::subtotal() }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tax:</th>
                                                            <td class="text-right">{{ cart::tax() }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Shipping:</th>
                                                            <td class="text-right">$5.80</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total:</th>
                                                            <td class="text-right">{{ cart::total() }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                            

                                            {{-- <form action="{{ route('order_confirm') }}" class="text-right" method="POST">
                                                @csrf --}}
                                                <input type="hidden" name="customer_id" value="{{ auth()->guard('seller')->user()->id }}">                                                
                                                <input type="hidden" name="total_product" value="{{ cart::count() }}">                                                
                                                <input type="hidden" name="sub_total" value="{{ cart::subtotal() }}">                                                
                                                <input type="hidden" name="vat" value="{{ cart::tax() }}">                                                
                                                <input type="hidden" name="total" value="{{ cart::total() }}"> 
                                                <input type="hidden" name="cart_content" value="{{ cart::instance('cart')->content() }}"> 

                                                {{-- @foreach ($carts as $item) --}}
                                                <input type="hidden" name="id" value="{{ $item->id }}">                                                
                                                <input type="hidden" name="name" value="{{ $item->name }}">                                                
                                                <input type="hidden" name="qty" value="{{ $item->qty }}">                                                
                                                <input type="hidden" name="price" value="{{ $item->price() }}">                                                
                                                <input type="hidden" name="subtotal" value="{{ $item->subtotal() }}">                                                
                                                
                                                    
                                                {{-- @endforeach                                                 --}}
                                                <button type="submit" class="btn btn-sm btn-success mt-3"><i
                                                    class="fa fa-check-square-o"></i> Order Confirm
                                                </button>
                                            </form>
                                            
                                        </div>
                                        <button class="btn btn-sm btn-warning mt-3" onclick="window.print();"><i
                                            class="fa fa-print"></i> Print
                                        </button>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- this row will not appear when printing -->
                                    <div class="row no-print">
                                        <div class=" ">
                                            
                                            
                                                    
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

    </div>
@endsection
