@extends('layouts.app')

@section('content')
    <div class="hero">
        <div class="hero-slide">
            <div class="img overlay" style="background-image: url({{ asset('assets/images/hero_bg_3.jpg')}}"></div>
            <div class="img overlay" style="background-image: url({{ asset('assets/images/hero_bg_2.jpg')}}"></div>
            <div class="img overlay" style="background-image: url({{ asset('assets/images/hero_bg_1.jpg')}}"></div>
        </div>

        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center">
                    <h1 class="heading" data-aos="fade-up">
                        Easiest way to find your dream home
                    </h1>
                    <!-- <form action="#" class="narrow-w form-search d-flex align-items-stretch mb-3" data-aos="fade-up"
                        data-aos-delay="200">
                        <input type="text" class="form-control px-4"
                            placeholder="Your ZIP code or City. e.g. New York" />
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form> -->
                </div>
            </div>
        </div>
    </div>

    <div class="section m-2">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-lg-12">
                    <h2 class="font-weight-bold text-primary heading">
                        Popular Properties
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="property-slider-wrap">
                        <div class="property-slider">

                            @if(isset($propertys))
                                @foreach($propertys as $property)
                                <div class="property-item">
                                    <a href="property-single.html" class="img">
                                        <img src="{{ asset('storage/' . $property->img) }}" alt="Image" class="img-fluid" />
                                    </a>
                                    <div class="property-content">
                                        <div class="price mb-2"><span>₹{{$property->rent}}</span></div>
                                        <div>
                                            <span class="d-block mb-2 text-black-50">{{$property->name}}</span>
                                            <span class="city d-block mb-3">{{$property->address}}</span>
                                        </div>

                                        <a href="{{ route('customer.buy-property', ['id' => $property->id]) }}" class="btn btn-primary">Book Now</a>
                                    </div>
                                </div>
                                @endforeach
                            @endif

                            <!-- <div class="property-item">
                                <a href="property-single.html" class="img">
                                    <img src="{{ asset('assets/images/img_2.jpg')}}" alt="Image" class="img-fluid" />
                                </a>

                                <div class="property-content">
                                    <div class="price mb-2"><span>₹43,20,0000</span></div>
                                    <div>
                                        <span class="d-block mb-2 text-black-50">Payyanur</span>
                                        <span class="city d-block mb-3">Kannur, Kerala</span>

                                        <div class="specs d-flex mb-4">
                                            <span class="d-block d-flex align-items-center me-3">
                                                <span class="icon-bed me-2"></span>
                                                <span class="caption">6 beds</span>
                                            </span>
                                            <span class="d-block d-flex align-items-center">
                                                <span class="icon-bath me-2"></span>
                                                <span class="caption">2 baths</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="property-item">
                                <a href="property-single.html" class="img">
                                    <img src="{{ asset('assets/images/img_3.jpg')}}" alt="Image" class="img-fluid" />
                                </a>

                                <div class="property-content">
                                    <div class="price mb-2"><span>₹76,50,000</span></div>
                                    <div>
                                        <span class="d-block mb-2 text-black-50">Thalasery, Kannur</span>
                                        <span class="city d-block mb-3">Kannur, Kerala</span>

                                        <div class="specs d-flex mb-4">
                                            <span class="d-block d-flex align-items-center me-3">
                                                <span class="icon-bed me-2"></span>
                                                <span class="caption">5 beds</span>
                                            </span>
                                            <span class="d-block d-flex align-items-center">
                                                <span class="icon-bath me-2"></span>
                                                <span class="caption">2 baths</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="property-item">
                                <a href="property-single.html" class="img">
                                    <img src="{{ asset('assets/images/img_4.jpg')}}" alt="Image" class="img-fluid" />
                                </a>

                                <div class="property-content">
                                    <div class="price mb-2"><span>₹28,50,0000</span></div>
                                    <div>
                                        <span class="d-block mb-2 text-black-50">Kannapuram, Kannur</span>
                                        <span class="city d-block mb-3">Kannur, Kerala</span>

                                        <div class="specs d-flex mb-4">
                                            <span class="d-block d-flex align-items-center me-3">
                                                <span class="icon-bed me-2"></span>
                                                <span class="caption">8 beds</span>
                                            </span>
                                            <span class="d-block d-flex align-items-center">
                                                <span class="icon-bath me-2"></span>
                                                <span class="caption">3 baths</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="property-item">
                                <a href="property-single.html" class="img">
                                    <img src="{{ asset('assets/images/img_5.jpg')}}" alt="Image" class="img-fluid" />
                                </a>

                                <div class="property-content">
                                    <div class="price mb-2"><span>₹66,50,0000</span></div>
                                    <div>
                                        <span class="d-block mb-2 text-black-50">Kochi</span>
                                        <span class="city d-block mb-3">Eranakulam, Kerala</span>

                                        <div class="specs d-flex mb-4">
                                            <span class="d-block d-flex align-items-center me-3">
                                                <span class="icon-bed me-2"></span>
                                                <span class="caption">4 beds</span>
                                            </span>
                                            <span class="d-block d-flex align-items-center">
                                                <span class="icon-bath me-2"></span>
                                                <span class="caption">2 baths</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="property-item">
                                <a href="property-single.html" class="img">
                                    <img src="{{ asset('assets/images/img_6.jpg')}}" alt="Image" class="img-fluid" />
                                </a>

                                <div class="property-content">
                                    <div class="price mb-2"><span>₹25,50,0000</span></div>
                                    <div>
                                        <span class="d-block mb-2 text-black-50">Calicut</span>
                                        <span class="city d-block mb-3">Claicut, Kerala</span>

                                        <div class="specs d-flex mb-4">
                                            <span class="d-block d-flex align-items-center me-3">
                                                <span class="icon-bed me-2"></span>
                                                <span class="caption">6 beds</span>
                                            </span>
                                            <span class="d-block d-flex align-items-center">
                                                <span class="icon-bath me-2"></span>
                                                <span class="caption">2 baths</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="property-item">
                                <a href="property-single.html" class="img">
                                    <img src="{{ asset('assets/images/img_7.jpg')}}" alt="Image" class="img-fluid" />
                                </a>

                                <div class="property-content">
                                    <div class="price mb-2"><span>₹8,50,0000</span></div>
                                    <div>
                                        <span class="d-block mb-2 text-black-50">Kasargod</span>
                                        <span class="city d-block mb-3">Kasargod, Kerala</span>

                                        <div class="specs d-flex mb-4">
                                            <span class="d-block d-flex align-items-center me-3">
                                                <span class="icon-bed me-2"></span>
                                                <span class="caption">5 beds</span>
                                            </span>
                                            <span class="d-block d-flex align-items-center">
                                                <span class="icon-bath me-2"></span>
                                                <span class="caption">3 baths</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                   
                            <div class="property-item">
                                <a href="property-single.html" class="img">
                                    <img src="{{ asset('assets/images/img_8.jpg')}}" alt="Image" class="img-fluid" />
                                </a>

                                <div class="property-content">
                                    <div class="price mb-2"><span>$₹1,291,000</span></div>
                                    <div>
                                        <span class="d-block mb-2 text-black-50">Kochi</span>
                                        <span class="city d-block mb-3">Kerala</span>

                                        <div class="specs d-flex mb-4">
                                            <span class="d-block d-flex align-items-center me-3">
                                                <span class="icon-bed me-2"></span>
                                                <span class="caption">3 beds</span>
                                            </span>
                                            <span class="d-block d-flex align-items-center">
                                                <span class="icon-bath me-2"></span>
                                                <span class="caption">1 baths</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="property-item">
                                <a href="property-single.html" class="img">
                                    <img src="{{ asset('assets/images/img_1.jpg')}}" alt="Image" class="img-fluid" />
                                </a>

                                <div class="property-content">
                                    <div class="price mb-2"><span>₹1,291,000</span></div>
                                    <div>
                                        <span class="d-block mb-2 text-black-50">Thrishur</span>
                                        <span class="city d-block mb-3">Kerala</span>

                                        <div class="specs d-flex mb-4">
                                            <span class="d-block d-flex align-items-center me-3">
                                                <span class="icon-bed me-2"></span>
                                                <span class="caption">5 beds</span>
                                            </span>
                                            <span class="d-block d-flex align-items-center">
                                                <span class="icon-bath me-2"></span>
                                                <span class="caption">3 baths</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         -->
                        </div>

                        <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                            <span class="prev" data-controls="prev" aria-controls="property" tabindex="-1">Prev</span>
                            <span class="next" data-controls="next" aria-controls="property" tabindex="-1">Next</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="features-1">
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="box-feature">
                        <span class="flaticon-house"></span>
                        <h3 class="mb-3">Our Properties</h3>
                        <p>
                            Explore a wide range of properties, from apartments to luxury villas, tailored to suit your needs.
                        </p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                    <div class="box-feature">
                        <span class="flaticon-building"></span>
                        <h3 class="mb-3">Property for Sale</h3>
                        <p>
                            Discover best properties available for sale at competitive prices. Find your dream home today!
                        </p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="box-feature">
                        <span class="flaticon-house-3"></span>
                        <h3 class="mb-3">Real Estate Agent</h3>
                        <p>
                            Connect with realestate agents who will guide you through buying or selling a property effortlessly.
                        </p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                    <div class="box-feature">
                        <span class="flaticon-house-1"></span>
                        <h3 class="mb-3">House for Sale</h3>
                        <p>
                            Browse a selection of houses for sale in prime locations, offering comfort, convenience, and value.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section section-4 bg-light p-3">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-5">
                    <h2 class="font-weight-bold heading text-primary mb-4">
                        Let's find home that's perfect for you
                    </h2>
                    <p class="text-black-50">
                        Never before has anyone enjoyed a tour of luxurious properties with such ease and convenience.
                    </p>
                </div>
            </div>
            <div class="row justify-content-between mb-5">
                <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
                    <div class="img-about dots">
                        <img src="{{ asset('assets/images/hero_bg_3.jpg')}}" alt="Image" class="img-fluid" />
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3">
                            <span class="icon-home2"></span>
                        </span>
                        <div class="feature-text">
                            <h3 class="heading">2M Properties</h3>
                            <p class="text-black-50">
                                Explore over 2 million properties, ranging from apartments to luxury homes, across various locations.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3">
                            <span class="icon-person"></span>
                        </span>
                        <div class="feature-text">
                            <h3 class="heading">Top Rated Agents</h3>
                            <p class="text-black-50">
                                Connect with the best real estate agents, known for their expertise and exceptional service.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3">
                            <span class="icon-security"></span>
                        </span>
                        <div class="feature-text">
                            <h3 class="heading">Verified Properties</h3>
                            <p class="text-black-50">
                                Buy and rent with confidence, knowing that all properties listed are verified and legally approved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row section-counter mt-5">
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">3298</span></span>
                        <span class="caption text-black-50"># of Buy Properties</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">2181</span></span>
                        <span class="caption text-black-50"># of Sell Properties</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">9316</span></span>
                        <span class="caption text-black-50"># of All Properties</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">7191</span></span>
                        <span class="caption text-black-50"># of Agents</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
    

