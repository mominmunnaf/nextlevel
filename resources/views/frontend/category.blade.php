@extends('frontend.layout')

@section('content')
    <div class="container">
        <h2>{{ $category->category_name }} </h2>
        @foreach ($subcategory as $sub_cat)
        <a href="{{ route('subcategory', [$sub_cat->id, $sub_cat->slug]) }}" class="btn btn-sm btn-outline-danger">{{ $sub_cat->subcategory_name }}</a>
            
        @endforeach


        <div class="carousel-item active">
            <div class="container">
                <h1 class="fashion_taital">Electronic</h1>
                <div class="fashion_section_2">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-sm-4">
                                <div class="box_main">
                                    <h4 class="shirt_text">{{ $product->product_subcategory_name }}</h4>
                                    <p class="price_text">Start Price <span
                                            style="color: #262626;">{{ $product->price }}</span>
                                    </p>
                                    <div class="electronic_img"><img
                                            src="{{ '/storage/images/' . $product->product_image }}"></div>
                                    <div class="btn_main">
                                        <div class="buy_bt"><a href="#">Buy Now</a></div>
                                        <div class="seemore_bt"><a href="{{ route('single_product', [$product->id, $product->slug]) }}">See More</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
