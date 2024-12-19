@extends('user.layouts.app')
@section('meta_title', '')
@include('user.includes.navbar')


<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-uppercase about-heading">Contact Us</h5>
            <h1 class="mb-0">If You Have Any Query, Feel Free To Contact Us</h1>
        </div>
        <div class="row g-5 mb-5">
            <div class="col-lg-4">
                <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2">Call to ask any question</h5>
                        <h4 class="text-primary mb-0">+012 345 6789</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeIn;">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="fa fa-envelope-open text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2">Email to get free quote</h5>
                        <h4 class="text-primary mb-0">@example.com</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeIn;">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="fa fa-map-marker-alt text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2">Visit our office</h5>
                        <h4 class="text-primary mb-0">Y-18-A, Sudarshana Nagar Bikaner (Rajasthan) 334003</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: slideInUp;">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control border-0 bg-light px-4" name="name" placeholder="Your Name" style="height: 55px; border-radius:12px;" required> <!-- Name field required -->
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div> <!-- Display error message if name field is blank -->
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control border-0 bg-light px-4" name="email" placeholder="Your Email" style="height: 55px; border-radius:12px;" required> <!-- Email field required -->
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div> <!-- Display error message if email field is blank or email format is incorrect -->
                            @enderror
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control border-0 bg-light px-4" name="subject" placeholder="Subject" style="height: 55px; border-radius:12px;" required> <!-- Subject field required -->
                            @error('subject')
                                <div class="alert alert-danger">{{ $message }}</div> <!-- Display error message if subject field is blank -->
                            @enderror
                        </div>
                        <div class="col-12">
                            <textarea class="form-control border-0 bg-light px-4 py-3" style="border-radius:15px;" name="message" rows="4" placeholder="Message" required></textarea> <!-- Message field required -->
                            @error('message')
                                <div class="alert alert-danger">{{ $message }}</div> <!-- Display error message if message field is blank -->
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" style="border-radius:15px;" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: slideInUp;">

                <iframe class="position-relative rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d220.18644260501418!2d73.34259678603189!3d27.994414007983714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1687893595114!5m2!1sen!2sin" frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</div>

<style>
    .about-heading {
        font-size: 1.5rem; /* बड़ा और प्रमुख टेक्स्ट */
        letter-spacing: 2px; /* थोड़ा स्पेसिंग जो टेक्स्ट को ब्रांडेड लुक देता है */
        color: #fdfdfd; /* टेक्स्ट का हल्का रंग */
        background: linear-gradient(90deg, #8C0001, #D10024); /* ग्रेडिएंट प्रभाव */
        padding: 10px 20px; /* पैडिंग इसे बॉक्स जैसा बनाता है */
        border-radius: 8px; /* बॉर्डर को हल्का गोल करता है */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* टेक्स्ट के पीछे शैडो */
        display: inline-block; /* इसे अलग और केंद्रित लुक देता है */
        text-align: center; /* टेक्स्ट को बीच में रखता है */
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5); /* टेक्स्ट को हल्का गहराई देता है */
    }

    .about-heading:hover {
        background: linear-gradient(90deg, #D10024, #8C0001); /* होवर पर रंग उल्टा हो जाता है */
        transform: scale(1.05); /* हल्का बड़ा होने का प्रभाव */
        transition: all 0.3s ease-in-out; /* एनिमेशन स्मूथनेस */
    }



</style>

@include('user.includes.footer')

@section('style')

@endsection
@section('script')

@endsection
