@extends('user.sidebar')

@section('content')
    <div class="container">
        <!-- page content -->
        <div class="right_col" role="main">

            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>{{ $product->product_name }}</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
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
                                <h2> <strong>Category:</strong> {{ $product->product_category_name }}, <strong>Sub
                                        Category:</strong> {{ $product->product_subcategory_name }}</h2>
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

                                <div class="col-md-7 col-sm-7 ">
                                    <div class="product-image">
                                        <img src="{{ asset('/storage/images/' . $product->product_image) }}" alt="..." />
                                    </div>
                                    <div class="product_gallery">
                                        <a>
                                            <img src="{{ asset('/storage/images/' . $product->product_image) }}"
                                                alt="..." />
                                        </a>
                                        <a>
                                            <img src="images/prod-3.jpg" alt="..." />
                                        </a>
                                        <a>
                                            <img src="images/prod-4.jpg" alt="..." />
                                        </a>
                                        <a>
                                            <img src="images/prod-5.jpg" alt="..." />
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">

                                    <h3 class="prod_title">{{ $product->product_name }}</h3>

                                    <p>{{ $product->long_details }}</p>
                                    <br />


                                    <br />

                                    <div class="">
                                        <h2>Size <small>Please select one</small></h2>
                                        <ul class="list-inline prod_size display-layout">
                                            <li>
                                                <button type="button" class="btn btn-default btn-xs">Small</button>
                                            </li>
                                            <li>
                                                <button type="button" class="btn btn-default btn-xs">Medium</button>
                                            </li>
                                            <li>
                                                <button type="button" class="btn btn-default btn-xs">Large</button>
                                            </li>
                                            <li>
                                                <button type="button" class="btn btn-default btn-xs">Xtra-Large</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <br />

                                    <div class="">
                                        <div class="product_price">
                                            <h1 class="price text-center align-middle">BDT. {{ $product->price }}</h1>
                                            {{-- <span class="price-tax">Vat: 15</span> --}}
                                            <br>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="float-left">
                                            <form action="{{ route('add_to_cart') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="price" value="{{ $product->price }}">
                                                Quantity: <span class="text-danger">*</span> <input type="number"
                                                    name="quantity" class="form-control mb-2" min="1" placeholder="1"
                                                    style="width: 40%">
                                                <input type="submit" class="btn btn-sm btn-success" value="Add To Cart">

                                            </form>
                                        </div>
                                        {{-- <div class="float-right">
                            <br>
                            <form action="">
                              <a href="" class="btn btn-sm btn-warning">Add to Wishlisl</a>
  
                            </form>
                          </div> --}}



                                    </div>

                                    <div class="product_social">
                                        <ul class="list-inline display-layout">
                                            <li><a href="#"><i class="fa fa-facebook-square"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-twitter-square"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-envelope-square"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-rss-square"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>


                                <div class="col-md-12">

                                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                role="tab" aria-controls="home" aria-selected="true">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                                role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu
                                            stumptown aliqua, retro synth master cleanse. Mustache cliche tempor,
                                            williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh
                                            dreamcatcher
                                            synth. Cosby sweater eu banh mi, qui irure terr.
                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin
                                            coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next
                                            level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                            booth letterpress, commodo enim craft beer mlkshk aliquip
                                        </div>
                                        <div class="tab-pane fade" id="contact" role="tabpanel"
                                            aria-labelledby="contact-tab">
                                            xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin
                                            coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next
                                            level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                            booth letterpress, commodo enim craft beer mlkshk
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

    </div>
@endsection
