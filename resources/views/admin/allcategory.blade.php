@extends('admin.sidebar')

@section('title')
    All Category - NextLevel
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
                            <h2>NextLevel<small>All Categories</small></h2>
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

                                        @if (session()->has('message'))
                                            <div class="alert alert-success">{{ session()->get('message') }}</div>
                                        @endif



                                        <table id="datatable-responsive"
                                            class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                            width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">ID</th>
                                                    <th class="text-center">Category Name</th>
                                                    <th class="text-center">Slug</th>
                                                    <th class="text-center">Product</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $category)
                                                    <tr>
                                                        <td class="text-center align-middle">{{ $category->id }}</td>
                                                        <td class="align-middle">{{ $category->category_name }}</td>
                                                        <td class="align-middle">{{ $category->slug }}</td>
                                                        <td class="align-middle">{{ $category->product_count }}</td>
                                                        <td class="text-center align-middle">
                                                            <a href="{{ route('category.edit', $category->id) }}"
                                                                class="btn btn-sm btn-info p-2"><i
                                                                    class="fa fa-pencil-square-o"></i></a>
                                                            <div class="d-inline-block align-middle">
                                                                <form
                                                                    action="{{ route('category.destroy', $category->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="submit" class="btn btn-sm btn-danger p-2"
                                                                        value="X">
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
