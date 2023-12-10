@extends('frontend.layout')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col col-lg-4">
                <div class="box_main">
                    <img src="{{ asset('/storage/images/' . $product->product_image) }}" alt="">
                </div>
            </div>
            

            <div class="col col-lg-8">
                <div class="box_main">

                    <h2 class="btn btn-outline-danger">{{ $product->product_name }}</h2>
                    <br><br>
                    Price: {{ $product->price }}
                    <br>
                    Product Details:
                    <p>{{ $product->long_details }}</p>
                    <ul>
                        <li>Category Name: {{ $product->product_category_name }}</li>
                        <li>Sub Category Name: {{ $product->product_subcategory_name }}</li>
                        <li>Available Product: {{ $product->quantity }}</li>
                    </ul>
                    <div class="mt-4">
                        <a href="" class="btn btn-sm btn-primary">Add To Cart</a>
                    </div>
                </div>

            </div>

        </div>
        <div class="fashion_section_2">
            <h1 class="fashion_taital">Related Products</h1>
            <div class="row">
                @foreach ($related_products as $product)
                    <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                            <h4 class="shirt_text">{{ $product->product_subcategory_name }}</h4>
                            <p class="price_text">Start Price <span style="color: #262626;">{{ $product->price }}</span>
                            </p>
                            <div class="electronic_img"><img src="{{ '/storage/images/' . $product->product_image }}"></div>
                            <div class="btn_main">
                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                <div class="seemore_bt"><a
                                        href="{{ route('single_product', [$product->id, $product->slug]) }}">See More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
@endsection
