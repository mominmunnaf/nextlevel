@extends('admin.sidebar')

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
                                                <strong></strong>
                                                <br>795 Freedom Ave, Suite 600
                                                <br>New York, CA 94107
                                                <br>Phone: 1 (804) 123-9876
                                                <br>Email: 
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <b>Invoice #007612</b>
                                            <br>
                                            <br>
                                            <b>Order ID:</b> {{ $order_id }}
                                            <br>
                                            <b>Order Date:</b> {{ date('d F Y') }}
                                            <br>
                                            <b>Order Time:</b> {{ date('h:i:s') }}
                                            <br>
                                            <b>Order Status:</b> <span class="label label-danger">Pending</span>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- Table row -->
                                    <form action="{{ route('order_success', $order_id) }}" class="text-right" method="POST">
                                        @csrf
                                        @method('PUT')


                                    <div class="row">
                                        <div class="  table">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Sl No</th>
                                                        <th class="text-center">Product Image</th>
                                                        <th class="text-center">Product Id</th>
                                                        <th class="text-center">Product Name</th>
                                                        <th class="text-center">Quantity</th>
                                                        <th class="text-right">Unit Price</th>
                                                        <th class="text-right">Total Price</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $sl = 1;
                                                @endphp
                                                <tbody>
                                                    @foreach ($orderdetails as $key => $item)
                                                    <tr>
                                                        <td class="text-center align-middle">{{ $sl++ }}</td>
                                                        <td class="text-center">
                                                            <img src="{{ '/storage/images/' . $item->product->product_image }}"
                                                            style="height: 50px; width: 50px; border-radius:50%" alt="">
                                                        </td>
                                                        <td class="text-center align-middle">{{ $item->product_id }}</td>
                                                        <td class="text-left align-middle">{{ $item->product->product_name }}</td>
                                                        <td class="text-center align-middle">{{ $item->qty }}</td>
                                                        <td class="text-right align-middle">
                                                            {{ number_format(intval($item->unit_price), 2, '.') }}
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            {{ number_format(intval($item->total_price), 2, '.') }}
                                                        </td>
                                                    </tr>
                                                        
                                                    @endforeach
                                                    
                                                    
                                                    
                                                    
                                                </tbody>
                                            </table>
                                            <h4 class="text-left">Total Products: {{ $products }}</h4>
                                            
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
                                                            <td class="text-right">{{ $sub_total }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tax:</th>
                                                            <td class="text-right">{{ $vat }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Shipping:</th>
                                                            <td class="text-right">$5.80</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total:</th>
                                                            <td class="text-right">{{ $total }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                            

                                            {{-- <form action="{{ route('order_confirm') }}" class="text-right" method="POST">
                                                @csrf --}}
                                                
                                                {{-- @foreach ($carts as $item) --}}
                                                 
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
