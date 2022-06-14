<div id="about" class="about-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="left-image">
                    <img src="{{asset('assets/images/about-left-image.png')}}" alt="Two Girls working together">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Grow your website with our <em>SEO Tools</em> &amp; <span>Project</span> Management</h2>
                    <p>You can browse free HTML templates on Too CSS website. Visit the website and explore latest website templates for your projects.</p>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="fact-item">
                                <div class="count-area-content">
                                    <div class="icon">
                                        <img src="{{asset('assets/images/service-icon-01.png')}}" alt="">
                                    </div>
                                    <div class="count-digit">320</div>
                                    <div class="count-title">SEO Projects</div>
                                    <p>Lorem ipsum dolor sitti amet, consectetur.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="fact-item">
                                <div class="count-area-content">
                                    <div class="icon">
                                        <img src="{{asset('assets/images/service-icon-02.png')}}" alt="">
                                    </div>
                                    <div class="count-digit">640</div>
                                    <div class="count-title">Websites</div>
                                    <p>Lorem ipsum dolor sitti amet, consectetur.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="fact-item">
                                <div class="count-area-content">
                                    <div class="icon">
                                        <img src="{{asset('assets/images/service-icon-03.png')}}" alt="">
                                    </div>
                                    <div class="count-digit">120</div>
                                    <div class="count-title">Satisfied Clients</div>
                                    <p>Lorem ipsum dolor sitti amet, consectetur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="portfolio" class="our-portfolio section">
    <div class="portfolio-left-dec">
        <img src="{{asset('assets/images/portfolio-left-dec.png')}}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Our Recent <em>Projects</em> &amp; Case Studies <span>for Clients</span></h2>
                    <span>Our Portfolio</span>
                </div>
            </div>
        </div>
    </div>
    {{--    @foreach($images as $image)--}}
    {{--    {{$image['image']}}--}}
    {{--        <img src=" {{$image['image']}}" alt="">--}}
    {{--    @endforeach--}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel owl-portfolio">
                    @foreach($projects as $project)
                        <div class="item " id="deneme2">
                            <div class="thumb">
                                <img src=" {{$project['image']}}" style="object-fit: cover!important;width: 363px;height: 525px;" alt="">
                                <div class="hover-effect">
                                    <div class="inner-content">
                                        <a rel="sponsored" href="https://templatemo.com/tm-564-plot-listing" target="_parent"><h4>First Project</h4></a>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Show Detail
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Understood</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                    <div class="item">
                        <div class="thumb">
                            <img src="{{asset('assets/images/portfolio-01.jpg')}}" alt="">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <a rel="sponsored" href="https://templatemo.com/tm-564-plot-listing" target="_parent"><h4>First Project</h4></a>
                                    <span>Plot Listing</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="thumb">
                            <img src="{{asset('assets/images/portfolio-02.jpg')}}" alt="">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <a href="#"><h4>Project Two</h4></a>
                                    <span>SEO &amp; Marketing</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
