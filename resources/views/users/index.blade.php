
@extends('users.layouts.app')
@section('content')
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div class="dot_design">
        <!-- <img src="images/dots.png" alt=""> -->
      </div>
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <p>Rapid Assistance at Your Doorstep</p>

                    <h1>
                      Emergency<br>
                      <span>
                        Medical Service
                      </span>
                    </h1>

                    <a href="">
                      Contact Us
                    </a>
                  </div>
                </div>
                <div class="col-md-6 p-5">
                  <div class="img-box">
                    <img src="./user/rapid-rescue/img/539h.png" alt="" style="border-radius: 30px;">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <p>
                      Your health is our priority
                    </p>
                    <h1>
                      24/7 Ambulance Services <br>
                      <span>
                        for Immediate Care
                      </span>
                    </h1>
                    <p>

                    </p>
                    <a href="">
                      Contact Us
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="./user/rapid-rescue/img/group.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <p>Equipped for Every Emergency</p>
                    <h1>
                      Your Lifeline in <br>
                      <span>
                        Emergencies
                      </span>
                    </h1>

                    <a href="">
                      Contact Us
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="./user/rapid-rescue/img/3.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
            <img src="./user/rapid-rescue/images/prev.png" alt="">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
            <img src="./user/rapid-rescue/images/next.png" alt="">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>


  <!-- book section -->

  <section class="book_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <form id="appointmentForm" action="/add_appointment" method="POST">
            @csrf
            <h4>
              BOOK <span>APPOINTMENT</span>
            </h4>
            @if(!Auth::id())
            <p class="text-center mb-3 text-danger">Please Sign In To Book Ambulance</p>
            @endif
            <div class="form-row ">
              <div class="form-group col-lg-6">
                <label for="inputPatientName">Patient Name </label>
                <input type="text" name="p_name" class="form-control" id="inputPatientName" placeholder="Patient Name">
              </div>
              <div class="form-group col-lg-6">
                <label for="inputPatientName">Phone</label>
                <input type="text" name="phone" class="form-control" id="inputPatientName" placeholder="Phone">
              </div>
              <div class="form-group col-lg-6">
                <label for="inputPatientName">Address</label>
                <input type="text" name="address" class="form-control" id="inputPatientName" placeholder="Address">
              </div>
              <div class="form-group col-lg-6">
                <label for="inputDoctorName">Condition</label>
                <select name="condition" class="form-control wide" id="inputDoctorName">
                  <option > -- Condition -- </option>
                  <option value="Emergency">Emergency</option>
                  <option value="Normal">Normal</option>
                </select>
              </div>

              <div style="visibility : hidden" class="form-group col-lg-6">
                <label for="inputPatientName">Patient latitude</label>
                <input id="p_lat" type="text" name="p_lat" class="form-control" id="inputPatientName" placeholder="Patient latitude">
              </div>
              <div style="visibility : hidden" class="form-group col-lg-6">
                <label for="inputPatientName">Patient langitude</label>
                <input id="p_lang" type="text" name="p_lang" class="form-control" id="inputPatientName" placeholder="Patient langitude">
              </div>

            </div>
            <div class="form-row ">
        
            </div>
            <div class="btn-box">
              <button onclick="show()" class="btn ">Submit Now</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </section>

    @if(Auth::id())
    <section class="book_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
        <div class="table-responsive">
    <table class="table table-bordered table-striped my-4">
        <thead>
            <tr>
                <th>Id</th>
                <th>Patient Name</th>
                <th>User Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>IsAccepted</th>
                <th>Reached</th>
                <th>Condition</th>
            </tr>
        </thead>
        <tbody>
            @foreach($app as $a)

            <tr>
                <td>{{$a->id}}</td>
                <td>{{$a->p_name}}</td>
                <td>{{$a->email}}</td>
                <td>{{$a->phone}}</td>
                <td>{{$a->address}}</td>
                <td>{{$a->isAccepted == "0" ? "Not Accepted Weight For Driver" : "Accepted and on the way"}}</td>
                <td>{{$a->isReached == "0" ? "Not Reached" : "Reached To Destination"}}</td>
                <td>{{$a->condition}}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
        </div>
      </div>
    </div>
  </section>
    @endif

  <!-- end book section -->


  <!-- about section -->

  <section class="about_section">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="./user/rapid-rescue/img/about.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <p>About</p>
              <h2>
                A Leading Medical  <span>Service
                  Provider</span>
              </h2>
            </div>
            <p>
              has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here',
              making it look like readable English. Many desktop publishing packages and web page editors has a
              more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it
              look like readable English. Many desktop publishing packages and web page editors
            </p>
            <a href="">
            Discover More About
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->


  <!-- treatment section -->

  <section class="treatment_section layout_padding">
    <div class="side_img">
      <img src="./user/rapid-rescue/images/treatment-side-img.jpg" alt="">
    </div>
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Hospital <span>Services</span>
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="./user/rapid-rescue/images/t1.png" alt="">
            </div>
            <div class="detail-box">
              <h4>
                Nephrologist Care
              </h4>
              <p>
                alteration in some form, by injected humour, or randomised words which don't look even slightly e sure
                there isn't anything
              </p>
              <a href="">
                Read More
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="./user/rapid-rescue/images/t2.png" alt="">
            </div>
            <div class="detail-box">
              <h4>
                Eye Care
              </h4>
              <p>
                alteration in some form, by injected humour, or randomised words which don't look even slightly e sure
                there isn't anything
              </p>
              <a href="">
                Read More
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="./user/rapid-rescue/images/t3.png" alt="">
            </div>
            <div class="detail-box">
              <h4>
                Pediatrician Clinic
              </h4>
              <p>
                alteration in some form, by injected humour, or randomised words which don't look even slightly e sure
                there isn't anything
              </p>
              <a href="">
                Read More
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="./user/rapid-rescue/images/t4.png" alt="">
            </div>
            <div class="detail-box">
              <h4>
                Parental Care
              </h4>
              <p>
                alteration in some form, by injected humour, or randomised words which don't look even slightly e sure
                there isn't anything
              </p>
              <a href="">
                Read More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end treatment section -->

  <!-- team section -->

  <section class="team_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our <span>Doctors</span>
        </h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel team_carousel">
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="./user/rapid-rescue/images/team1.jpg" alt="" />
              </div>
              <div class="detail-box">
                <h5>
                  Hennry
                </h5>
                <h6>
                  MBBS
                </h6>
                <div class="social_box">
                  <a href="">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="./user/rapid-rescue/images/team2.jpg" alt="" />
              </div>
              <div class="detail-box">
                <h5>
                  Jenni
                </h5>
                <h6>
                  MBBS
                </h6>
                <div class="social_box">
                  <a href="">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="./user/rapid-rescue/images/team3.jpg" alt="" />
              </div>
              <div class="detail-box">
                <h5>
                  Morco
                </h5>
                <h6>
                  MBBS
                </h6>
                <div class="social_box">
                  <a href="">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end team section -->


  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          <span>Testimonial</span>
        </h2>
      </div>
    </div>
    <div class="container px-0">
      <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Morijorch
                  </h5>
                  <h6>
                    Default model text
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover
                many web sites still in their infancy. Variouseditors now use Lorem Ipsum as their default model text,
                and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Variouseditors now
                use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites
                still in their infancy. Various
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Rochak
                  </h5>
                  <h6>
                    Default model text
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will
                uncover many web sites still in their infancy. Variouseditors now use Lorem Ipsum as their default model
                text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. editors now use
                Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites
                still in their infancy.
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Brad Johns
                  </h5>
                  <h6>
                    Default model text
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will
                uncover many web sites still in their infancy, editors now use Lorem Ipsum as their default model text,
                and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Variouseditors now
                use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites
                still in their infancy. Various
              </p>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->

  <!-- contact section -->
  <section class="contact_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Get In Touch
        </h2>
      </div>
      <div class="row">
        <div class="col-md-7">
          <div class="form_container">
            <form action="">
              <div>
                <input type="text" placeholder="Full Name" />
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" placeholder="Phone Number" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" />
              </div>
              <div class="btn_box">
                <button>
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-5">
          <div class="img-box">
            <img src="./user/rapid-rescue/images/contact-img.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  @endsection
  
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

  
  <script>
    // Declare variables outside the functions to make them accessible globally
    var p_lat, p_lng;

    // Check if geolocation is supported by the browser
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            p_lat = position.coords.latitude;
            p_lng = position.coords.longitude;
            console.log(p_lat);
            console.log(p_lng);
        });
    } else {
        console.log("Geolocation is not supported by this browser.");
    }

    // Function to display the latitude and longitude in the input fields
    function show() {
        if (p_lat && p_lng) { // Ensure that the coordinates are available
            document.getElementById("p_lat").value = p_lat;
            document.getElementById("p_lang").value = p_lng; // Fixed input field ID
        } else {
            console.log("Coordinates not available yet.");
        }
    }
</script>
