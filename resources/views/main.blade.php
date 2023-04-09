@extends('app')
@section('content')
    <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-fade="true">
        <!-- Slide 1 -->
        @foreach($promotions as $promotion)
            <div class="slide kenburns" data-bg-image="images/slider/notgeneric_bg3.jpg">
                <div class="bg-overlay"></div>
                <div class="container">
                    <div class="slide-captions text-center text-light">
                        <!-- Captions -->
                        <h1>{{$promotion->title}}</h1>
                        <p>{{$promotion->description}}</p>
                        <div><a href="#welcome" class="btn scroll-to">Explore more</a></div>
                        </span>
                        <!-- end: Captions -->
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <section>
        <div class="container">
            <!-- Testimonials -->
            <h4 class="mb-4">Testimononials</h4>
            <div class="carousel testimonial testimonial-border" data-items="2" data-equalize-item=".testimonial-item">
                <!-- Testimonials item -->
                @foreach($reviews as $review)
                    <div class="testimonial-item">
{{--                        <img src="" alt="">--}}
                        <p>{{$review->text}}</p>
                        <span>{{$review->user->name}}</span>
                    </div>
                @endforeach
            </div>
            <!-- end: Testimonials -->

        </div>
    </section>
@endsection
