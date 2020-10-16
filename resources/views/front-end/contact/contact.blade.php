@extends('front-end.master2')
@section('title')
    Contact - Islamic E-Book BD
@endsection
@section('body2')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <main class="contact_area inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <iframe style="width: 100%; height: 500px; border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.8223974903!2d90.2792398547864!3d23.780887453399956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1594105462202!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                        </iframe>
                    </div>
                </div>
            </div>
            <div class="row mt--60 ">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="contact_adress">
                        <div class="ct_address">
                            <h3 class="ct_title">Location & Details</h3>
                            <p>Dhaka, formerly known as Dacca (By the British) is the capital and the largest city of Bangladesh.
                                . It is one of the major cities of South Asia, the largest city in Eastern South Asia and among the Bay of Bengal countries;
                                and one of the largest cities among OIC countries.</p>
                        </div>
                        <div class="address_wrapper">
                            <div class="address">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-info-text">
                                    <p><span>Address:</span> Dhaka <br> Bangladesh</p>
                                </div>
                            </div>
                            <div class="address">
                                <div class="icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="contact-info-text">
                                    <p><span>Email: </span> limoninfoo@gmail.com </p>
                                </div>
                            </div>
                            <div class="address">
                                <div class="icon">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <div class="contact-info-text">
                                    <p><span>Phone:</span> (800) 01918 845404 </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-12 mt--30 mt-md--0">
                    <div class="contact_form">
                        <h3 class="ct_title">Send Us a Message</h3>
                        <h5 class="text-success">{{Session::get('contactMessage')}}</h5>
                        {!! Form::open(['route'=>'contact-message', 'method'=>'POST']) !!}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Your Name <span class="required">*</span></label>
                                        <input type="text" id="con_name" name="con_name" class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Your Email <span class="required">*</span></label>
                                        <input type="email" id="con_email" name="con_email" class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Your Phone*</label>
                                        <input type="number" id="con_phone" name="con_phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Your Message</label>
                                        <textarea id="con_message" name="con_message"
                                                  class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-btn">
                                        <button type="submit" value="submit" id="submit" class="btn btn-black"
                                                name="submit">send</button>
                                    </div>
                                    <div class="form__output"></div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                        <div class="form-output">
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>

    </main>
@endsection
