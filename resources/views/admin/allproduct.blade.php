@extends('admin.sidebar')

@section('title')
    All Product - NextLevel
@endsection

@section('content')
    <!-- page content -->




    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3 class="text-danger"><span class="text-danger">Next</span><span class="text-success">Level</span> <small class="text-secondary">Any Time Everywhere!!</small></h3>
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
                            <h2>NextLevel<small>All Product</small></h2>
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
                                        <p class="text-muted font-13 m-b-30">
                                            Responsive is an extension for DataTables that resolves that problem by
                                            optimising the table's layout for different screen sizes through the dynamic
                                            insertion and removal of columns from the table.
                                        </p>

                                        <table id="datatable-responsive"
                                            class="table table-striped table-bordered dt-responsive nowrap"
                                            cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Id</th>
                                                    <th class="text-center">Product Name</th>
                                                    <th class="text-center">Short Details</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-center">Category Name</th>
                                                    <th class="text-center">Subcategory Name</th>
                                                    <th class="text-center">Image</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                    
                                                
                                                <tr>
                                                    <td class="text-center align-middle">{{ $product->id }}</td>
                                                    <td class="align-middle">{{ $product->product_name }}</td>
                                                    <td class="align-middle">{{ $product->short_details }}</td>
                                                    <td class="align-middle">{{ $product->price }}</td>
                                                    <td class="text-center align-middle">{{ $product->quantity }}</td>
                                                    <td class="align-middle">{{ $product->product_category_name }}</td>
                                                    <td class="align-middle">{{ $product->product_subcategory_name }}</td>
                                                    <td class="text-center align-middle"><img src="{{ '/storage/images/'.$product->product_image }}" alt="" style="height:50px; width:50px; border-radius:50%"></td>
                                                    <td class="text-center align-middle">
                                                        <a href="">edit</a>
                                                        <a href="">delete</a>
                                                    </td>
                                                    {{-- {{ $product->product_image }} --}}
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
