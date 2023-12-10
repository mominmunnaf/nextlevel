@extends('admin.sidebar')

@section('title')
    Pending Orders - NextLevel
@endsection

@section('content')
    <!-- page content -->




    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3 class="text-danger"><span class="text-danger">Next</span><span class="text-success">Level</span> <small
                            class="text-secondary">Any Time Everywhere!!</small></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
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






                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>NextLevel<small>Pending Order List</small></h2>
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
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">

                                        <table id="datatable-responsive"
                                            class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                            width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Sl No</th>
                                                    <th class="text-center">Order Id</th>
                                                    <th class="text-center">Date</th>
                                                    <th>Customer Name</th>
                                                    <th>Email Address</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-right">Amount</th>
                                                    <th class="text-center">Action</th>

                                                </tr>
                                            </thead>
                                            @php
                                                $sl = 1;
                                            @endphp
                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        
                                                        <td class="text-center align-middle">{{ $sl++ }}</td>
                                                        <td class="text-center align-middle">{{ $order->id }}</td>
                                                        <td class="text-center align-middle">{{ $order->date }}</td>
                                                        <td class="align-middle">{{ $order->user->name }}</td>
                                                        <td class="align-middle">{{ $order->user->email }}</td>
                                                        <td class="text-center align-middle text-light">
                                                            <span style="font-size: 14px" class="badge bg-primary">{{ $order->status }}</span>
                                                        </td>
                                                        <td class="text-right align-middle">{{ $order->total }}</td>
                                                        <td class="text-center align-middle m-auto">
                                                            <div class="row text-center m-auto">
                                                                <form action="{{ route('view_order', $order->id) }}" method="GET">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-sm btn-warning">
                                                                        <i class="fa fa-eye"></i>
                                                                    </button>
                                                                </form>
                                                                <form action="{{ route('view_order', $order->id) }}" method="GET">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-sm btn-info">
                                                                        <i class="fa fa-spinner"></i>
                                                                    </button>
                                                                </form>
                                                                <form action="{{ route('view_order', $order->id) }}" method="GET">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>

                                                            </div>


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
            </div>
        </div>
    </div>
    <!-- /page content -->











    <!-- /page content -->
@endsection
