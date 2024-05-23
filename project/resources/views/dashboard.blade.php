<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Danish Shop Trading') }}
        </h2>
    </x-slot>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-inner img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .carousel {
            width: 100%;
        }
        .carousel-item {
            height: 500px; /* Adjust height as needed */
        }
    </style>
</head>
<body>
    <!-- Full-width container for the carousel -->
    <div class="container-fluid p-0">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/slider 1.jpg') }}" class="d-block w-100" alt="First Slide">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slider 2.png') }}" class="d-block w-100" alt="Second Slide">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slider 4.jpg') }}" class="d-block w-100" alt="Third Slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>
</head>
<body>


<!-- About Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
  <h3 class="w3-center">ABOUT THE COMPANY</h3>
  <p class="w3-center w3-large">Key features of our company</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Responsive</p>
      <p> We pride ourselves on our quick and efficient service. Understanding the importance of staying connected, we ensure that repairs are done promptly without compromising on quality.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-heart w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Passion</p>
      <p>Our work is driven by a deep-seated passion for electronics. This enthusiasm translates into meticulous attention to detail and a commitment to restoring your device to its best possible condition.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-diamond w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Design</p>
      <p> Our repair solutions are designed to meet the highest standards. We use quality parts and proven techniques to ensure that your phone not only works well but also maintains its aesthetic appeal.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Support</p>
      <p>We believe in providing exceptional support to our customers. Whether you have a question about your repair or need advice on maintaining your device, we are here to help every step of the way.</p>
    </div>
  </div>
</div>

<!-- Promo Section - "" -->
<div class="w3-container w3-light-grey" style="padding:128px 16px">
  <div class="w3-row-padding">
    <div class="w3-col m6">
      <h3>About US.</h3>
      <p style ="text-align: justify;">Welcome to Danish Shop Trading, your trusted home-based phone repair service. Founded by Muhammad Danish Bin Tazurin, our business stems from a deep-seated passion for electronics that began in his childhood. Muhammad Danish has always been fascinated by the intricate workings of electronic devices, and this enthusiasm has only grown over the years.

        At Danish Shop Trading, we are dedicated to providing top-notch repair services for all types of phones. Muhammad Danish leverages his extensive knowledge and hands-on experience to ensure that every device is meticulously restored to optimal performance. Our goal is to offer reliable, efficient, and affordable repair solutions to our community.

        We believe in the power of technology to improve lives and are committed to sharing our expertise to benefit society. Whether you're dealing with a cracked screen, battery issues, or any other phone malfunction, you can count on Danish Shop Trading to deliver exceptional service with a personal touch.

        Thank you for choosing Danish Shop Trading. We look forward to serving you and helping you stay connected..</p>
    </div>
    <div class="w3-col m6">
    <img src="{{ asset('images/slider 3.jpg') }}" alt="Buildings" width="700" height="394" style="border-radius: 15px;">
    </div>
  </div>
</div>


<!-- Promo Section "Statistics" -->
<div class="w3-container w3-row w3-center w3-dark-grey w3-padding-64">
  <div class="w3-quarter">
    <span class="w3-xxlarge">14+</span>
    <br>Partners
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">55+</span>
    <br>Projects Done
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">89+</span>
    <br>Happy Clients
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">150+</span>
    <br>Meetings
  </div>
</div>

    <!-- Image of location/map -->
    <img src="{{ asset('images/map.jpg') }}" class="w3-image w3-greyscale" style="width:100%;margin-top:48px">
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i><br>
    <p><i class="fa fa-map-marker fa-fw w3-large w3-margin-right"></i> Labis, Johor</p>
    <p><i class="fa fa-envelope fa-fw w3-large w3-margin-right"> </i> Email: danishshoptrading@gmail.com</p>
  </div>
</footer>
</body>
</html>

</x-app-layout>


