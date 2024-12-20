<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Submission Paper</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-8 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px; ">
                    <small class="me-3 mb-2" style="color: white; font-size: 16px;">
                        <i class="fa fa-map-marker-alt me-2"></i>
                        Y-18-A, Sudarshana Nagar Bikaner (Rajasthan) 334003
                    </small>
                    <br>

                    <small class="me-3 mb-2 " style="color: white; font-size: 16px;">
                        <i class="fa fa-phone-alt me-2"></i>
                        <a href="tel:+0123456789" style="color:white;" >+012 345 6789</a>
                      </small>

                    <small class="mb-2" style="color: white; font-size: 16px;">
                        <i class="fa fa-envelope-open me-2"></i>
                        <a href="mailto:info@example.com" style="color:white;">info@example.com</a>
                      </small>

                </div>
            </div>



            <br>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->



    <div class="nav-container" >

    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0"style="background-color:#8C0001!important; height:60px;">
            <a href="/" class="navbar-brand p-0 d-flex align-items-center">
                <h1 class="m-0 text-white logo-text">SubmissionPaper</h1>
            </a>



        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <span class="fa fa-bars"></span>
    <span class="close-icon" style="display: none;"><i class="fa fa-times"></i></span>
</button>





            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="/" class="nav-item nav-link">Home</a>
                    {{-- <a href="about" class="nav-item nav-link">About</a>
                    <a href="/verify" class="nav-item nav-link">Services</a> --}}
                    <a href="/contact" class="nav-item nav-link">Contact</a>
                    <a href="formating" class="nav-item nav-link">Submission</a>
                    <a href="publishing" class="nav-item nav-link">Publication</a>
                     <a href="adminusertable" class="nav-item nav-link">AdminPanel</a>



{{-- <li class="nav-item">
    <a class="nav-link" href="{{ route('assign-role.form', ['userId' => $user->id]) }}">Assign Role</a>
</li> --}}



                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
                        <div class="dropdown-menu m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="detail.html" class="dropdown-item">Blog Detail</a>
                        </div> --}}
                    </div>
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="price.html" class="dropdown-item">Pricing Plan</a>
                            <a href="feature.html" class="dropdown-item">Our features</a>
                            <a href="team.html" class="dropdown-item">Team Members</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="quote.html" class="dropdown-item">Free Quote</a>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>





   <style>

/* Base styling for the logo */

/* Extra bold hover animation */
.navbar-brand:hover .logo-text {
    transform: translateY(-10px) scale(1.1); /* Bold lift and scale effect */
    color: #FF6347; /* Deep orange for eye-catching appeal */
}



    /* .navbar-brand {
        background-color: initial !important;
        text-decoration: none !important;
        display: inline-block !important;
    }

    /* Default text color */
    /* .navbar-brand h1 {
        color: white !important; /* Set the default text color to white */
    } */ */

     .navbar-toggler .fa-bars {
        color: white !important;
    }


    .navbar-brand {
        background-color: initial !important; /* Set the initial background color */
        text-decoration: none !important; /* Remove default underline style */
        display: inline-block !important; /* Ensure the link takes only the necessary space */
        color: white !important; /* Set the default text color to white */
    }

    .navbar-toggler .fa-bars {
        color: white !important;
    }


    .navbar-collapse.opened {
        background-color: black !important;
        color: black !important;
    }

   .navbar-collapse.opened a {
        color: white !important;
    }



</style>

<script>
    $(document).ready(function () {
        $('.navbar-toggler').on('click', function () {
            $('.navbar-collapse').toggleClass('opened');
            $('.fa.fa-bars').toggle(); // Toggle hamburger icon
            $('.close-icon').toggle(); // Toggle close icon
        });
        $('.close-icon').on('click', function () {
            $('.navbar-collapse').removeClass('opened');
            $('.fa.fa-bars').toggle(); // Toggle hamburger icon
            $('.close-icon').toggle(); // Toggle close icon
        });
    });
</script>



