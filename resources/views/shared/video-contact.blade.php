<div id="video" class="our-videos section">
    <div class="videos-left-dec">
        <img src="{{asset('assets/images/videos-left-dec.png')}}" alt="">
    </div>
    <div class="videos-right-dec">
        <img src="{{asset('assets/images/videos-right-dec.png')}}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="naccs">
                    <div class="grid">
                        <div class="row">
                            <div class="col-lg-8">
                                <ul class="nacc">
                                    @foreach($videos as  $video)

                                        <li class="">
                                            <div>
                                                <div class="thumb">
                                                    <iframe width="100%" height="auto" src="{{$video['video']}}" title="YouTube video player" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen sandbox></iframe>
                                                    <div class="overlay-effect">
                                                        <a href="#"><h4>Project One</h4></a>
                                                        <span>SEO &amp; Marketing</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <div class="menu">
                                    <div class="active">
                                        <div class="thumb">
                                            <img src="{{asset('assets/images/video-thumb-01.png')}}" alt="">
                                            <div class="inner-content">
                                                <h4>Project One</h4>
                                                <span>SEO &amp; Marketing</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="thumb">
                                            <img src="{{asset('assets/images/video-thumb-02.png')}}" alt="">
                                            <div class="inner-content">
                                                <h4>Second Project</h4>
                                                <span>Advertising &amp; Marketing</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="thumb">
                                            <img src="{{asset('assets/images/video-thumb-03.png')}}" alt="Marketing">
                                            <div class="inner-content">
                                                <h4>Project Three</h4>
                                                <span>Digital &amp; Marketing</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="thumb">
                                            <img src="{{asset('assets/images/video-thumb-04.png')}}" alt="SEO Work">
                                            <div class="inner-content">
                                                <h4>Fourth Project</h4>
                                                <span>SEO &amp; Advertising</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="contact" class="contact-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="section-heading">
                    <h2>Feel free to <em>Contact</em> us via the <span>HTML form</span></h2>
                    <div id="map">
                        <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="360px" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                    </div>
                    <div class="info">
                        <span><i class="fa fa-phone"></i> <a href="#">010-020-0340<br>090-080-0760</a></span>
                        <span><i class="fa fa-envelope"></i> <a href="#">info@company.com<br>mail@company.com</a></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 align-self-center">
                <form id="contact" action="{{route('mail-post')}}" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset>
                                <input type="name" name="name" id="name" placeholder="İsim" autocomplete="on" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <input type="surname" name="surname" id="surname" placeholder="Soyisim" autocomplete="on" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-12 mb-3 ">
                            <fieldset>
                            <textarea class="form-control"  name="message" id="message" cols="10"
                                      rows="2"
                                      placeholder="Mesaj" required> </textarea>
                            </fieldset>
                        </div>
                        <div class="col-lg-12 mt-3 ">
                            <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Submit Request</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="contact-dec">
        <img src="{{asset('assets/images/contact-dec.png')}}" alt="">
    </div>
    <div class="contact-left-dec">
        <img src="{{asset('assets/images/contact-left-dec.png')}}" alt="">
    </div>
</div>
