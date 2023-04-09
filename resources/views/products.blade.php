@extends('app')
@section('content')
    <!-- Page title -->
    <section id="page-title" data-bg-parallax="images/parallax/5.jpg">
        <div class="container">
            <div class="page-title">
                <h1>Our Menu</h1>
                <span>Best dish for our clients!</span>
            </div>
        </div>
    </section>
    <!-- end: Page title -->
    <!-- Shop products -->
    <section>
        <div class="container">
            <div class="row m-b-20">
                <div class="col-lg-6 p-t-10 m-b-20">
                    <h3 class="m-b-20">A Monochromatic Spring ’15</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, sit, exercitationem, consequuntur, assumenda iusto eos commodi alias.</p>
                </div>
                <div class="col-lg-6 p-t-10 m-b-20">
                    <form method="GET" action="#">
                        <div class="order-select">
                            <h6>Sort by</h6>
                            <p>Showing 1&ndash;12 of 25 results</p>
                            <select class="form-control">
                                <option value="new" selected="selected">Sort by newness</option>
                                <option value="price-asc">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div>
                        <div class="order-select">
                            <h6>Sort by Price</h6>
                            <p>From 0 - 190$</p>
                            <select class="form-control">
                                <option value="" selected="selected">0$ - 50$</option>
                                <option value="">51$ - 90$</option>
                                <option value="">91$ - 120$</option>
                                <option value="">121$ - 200$</option>
                            </select>
                        </div>
                        <button class="btn" type="submit" id="form-submit"><i class="fa fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>


            <!--Product list-->
            <div class="shop">
                <div class="grid-layout grid-3-columns" data-item="grid-item">
                    @foreach($products as $product)
                        <div class="grid-item">
                            <div class="product">
                                <div class="product-image">
                                    <a href="#"><img alt="{{$product->title}}" src="{{$product->image}}">
                                    </a>
                                    <div class="product-overlay">
                                        <a href="shop-product-ajax-page.html" data-lightbox="ajax">Quick View</a>
                                    </div>
                                </div>
                                <div class="product-description">
                                    <div class="product-category">{{$product->category->title}}</div>
                                    <div class="product-title">
                                        <h3><a href="#">{{$product->title}}</a></h3>
                                    </div>
                                    <div class="product-price"><ins>{{$product->price}}$</ins>
                                    </div>
                                    <div class="product-rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="product-reviews"><a href="#">6 customer reviews</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Load next portfolio items -->
                {{--                <div id="pagination" class="infinite-scroll">--}}
                {{--                    <a href="shop-load-more-2.html"></a>--}}
                {{--                </div>--}}
                <!-- end:Load next portfolio items -->
            </div>
            <!--End: Product list-->
        </div>
    </section>
    <!-- end: Shop products -->
@endsection
