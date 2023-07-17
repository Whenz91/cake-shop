@extends('layouts.shop')
 
@section('title', 'Home')

@section('content')
    <header class="row align-items-center">
        <div class="col-12 col-md-6">
            <h1>
                Confectionery <br>
                & bakery shop
            </h1>
            <p class="mb-5">Same day cake delivery in Budapest</p>
            <a href="{{ route('shop.cakes.index') }}" class="btn btn-primary rounded-pill">Shop now</a>
            <div class="mt-5">
                <a href="#" class="btn btn-outline-dark rounded-circle me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
                </a>
                <a href="#" class="btn btn-outline-dark rounded-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                </a>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide"><img src="{{ asset('images/cakes/cake-01.jpg') }}" alt="Cake 01" class="img-fluid"></li>
                        <li class="splide__slide"><img src="{{ asset('images/cakes/cake-02.jpg') }}" alt="Cake 02" class="img-fluid"></li>
                        <li class="splide__slide"><img src="{{ asset('images/cakes/cake-03.jpg') }}" alt="Cake 03" class="img-fluid"></li>
                    </ul>
                </div>
                
                <div class="my-slider-progress">
                    <div class="my-slider-progress-bar"></div>
                </div>
            </div>
        </div>
    </header>

    <section class="mt-5">
        <h2 class="text-center">Catalog</h2>

       <x-categories-tab :categories=$categories />
    </section>

    <section class="my-5">

        <h2 class="text-center mb-5">Our advantages</h2>
        
        <div class="row">
            <div class="col-12 col-md-4 text-center pt-5">
                <img src="{{ asset('images/cakes/advantage-03.jpg') }}" alt="Our Advantage" class="circle-img">
                <h4 class="mt-4">High quality</h4>
                <p>Hanmade cake & natural ingredients</p>
            </div>
        
            <div class="col-12 col-md-4 text-center">
                <img src="{{ asset('images/cakes/advantage-01.jpg') }}" alt="Our Advantage" class="circle-img scale-1">
                <h4 class="mt-4">Sweet gift</h4>
                <p>Delicious macaron gift box for each client</p>
            </div>
        
            <div class="col-12 col-md-4 text-center pt-5">
                <img src="{{ asset('images/cakes/advantage-02.jpg') }}" alt="Our Advantage" class="circle-img">
                <h4 class="mt-4">Fast delivery</h4>
                <p>Same-day cake delivery in Budapest</p>
            </div>
        </div>

    </section>

    <section class="my-5">

        <h2 class="text-center mb-5">How we create our cakes</h2>
        
        <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/315108135?h=3721c3f16e&autoplay=1&loop=1&color=ff0179" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div>

    </section>

    <section class="my-5">

        <h2 class="text-center mb-5">Our chefs</h2>
        
        <div class="row">
            @foreach ($chefs as $chef)
            <div class="col-12 col-md-4 text-center @if($loop->iteration != 2) pt-5 @endif">
                <img src="{{ asset('images/chefs/' . $chef->image) }}" alt="{{ $chef->name }}" class="circle-img @if($loop->iteration == 2) scale-1 @endif">
                <h4 class="mt-4">{{ $chef->name }}</h4>
                <p>{{ $chef->bio }}</p>
            </div>
            @endforeach
        </div>

    </section>

    <section class="my-5 splide review">
        <div class="d-flex justify-content-between mb-5">
            <h2>Reviews</h2>
            
            <div class="splide__arrows d-flex gap-2">
                <button
                    class="splide__arrow splide__arrow--prev p-relative left-0"
                    type="button"
                    aria-label="Previous slide"
                    aria-controls="splide01-track"
                >
                    &larr;
                </button>
                <button
                    class="splide__arrow splide__arrow--next p-relative right-0"
                    type="button"
                    aria-label="Next slide"
                    aria-controls="splide01-track"
                >
                    &rarr;
                </button>
            </div>
           
        </div>

        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($reviews as $review)
                <li class="splide__slide">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <img src="{{ asset('images/reviews/' . $review->image) }}" alt="{{ $review->name }}" class="img-fluid">
                        </div>
                        <div class="col-12 col-md-8">
                            <h4>{{ $review->name }}</h4>
                            <p class="lead">{{ $review->review_title }}</p>
                            <p>{{ $review->review_text }}</p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
            
    </section>
@endsection