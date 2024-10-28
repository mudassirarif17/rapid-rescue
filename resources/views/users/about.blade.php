@extends('users.layouts.app')
@section('content')
<section class="about_section layout_padding">
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="img-box">
                    <img src="./user/rapid-rescue/images/about-img.png" alt="About Us" class="img-fluid rounded shadow-lg">
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container mb-4">
                        <h1 class="text-muted">About Us</h1>
                        <h2 class="text-primary">
                            A Leading Medical <span class="text-success">Service Provider</span>
                        </h2>
                    </div>
                    <p >
E-Ambulance Service is more than just a medical transportation service; we are your trusted partner in emergencies. Founded on the principles of compassion and efficiency, our goal is to provide swift and reliable ambulance services to those in need.
<br><br>
Our innovative platform enables patients to book an ambulance with just a few taps on their mobile device. We understand that in critical situations, every second counts. That's why our dedicated team works around the clock to ensure that help arrives as quickly as possible. With real-time tracking, patients and their families can monitor the ambulance's journey, bringing peace of mind during stressful times.
<br><br>
At E-Ambulance Service, we pride ourselves on our state-of-the-art vehicles and highly trained medical personnel. Our ambulances are equipped with advanced medical equipment, ensuring that patients receive the best possible care during transport.
<br><br>
We believe in making healthcare accessible to everyone. Our mission is not only to provide transportation but also to foster a community where health and well-being are prioritized. Together, we aim to create a safer, healthier world for all.

Join us in our journey to redefine emergency medical services. Your safety is our commitment.

---

Yeh content thoda engaging aur informative hai. Aap isse apne "About Us" page mein use kar sakte hain! Agar aur koi madad chahiye ya specific points chahiye ho, toh bata sakte hain.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mission_section py-5 bg-light">
    <div class="container">
        <h2 class="text-center text-primary mb-4">Our Mission</h2>
        <p class="text-center">
            We aim to provide timely medical assistance to every individual in need. By leveraging cutting-edge technology, we enhance emergency services and make healthcare accessible to all.
        </p>
    </div>
</section>

<section class="services_section py-5">
    <div class="container">
        <h2 class="text-center text-primary mb-4">Our Services</h2>
        <ul class="list-unstyled text-center">
            <li class="mb-2"><i class="fas fa-check-circle text-success"></i> 24/7 Ambulance Availability</li>
            <li class="mb-2"><i class="fas fa-check-circle text-success"></i> Real-Time Location Tracking</li>
            <li class="mb-2"><i class="fas fa-check-circle text-success"></i> Equipped with Advanced Medical Equipment</li>
            <li class="mb-2"><i class="fas fa-check-circle text-success"></i> Highly Trained Medical Personnel</li>
            <li class="mb-2"><i class="fas fa-check-circle text-success"></i> User-Friendly Mobile App</li>
        </ul>
    </div>
</section>
@endsection
