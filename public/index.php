<?php

require_once '../includes/models.php';

if (isRequestType('POST'))
{
    print json_encode(save_donor());
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>BloodBank</title>
    <!-- Favicons -->
    <link href="assets/frontend/img/favicon.png" rel="icon" />
    <link href="assets/frontend/img/apple-touch-icon.png" rel="apple-touch-icon" />
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" />
    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="assets/frontend/vendor/animate.css/animate.min.css" />
    <link rel="stylesheet" href="assets/frontend/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="assets/frontend/vendor/boxicons/css/boxicons.min.css" />
    <link rel="stylesheet" href="assets/frontend/vendor/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="assets/frontend/vendor/glightbox/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/frontend/vendor/remixicon/remixicon.css" />
    <link rel="stylesheet" href="assets/frontend/vendor/swiper/swiper-bundle.min.css" />
    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="<?= asset('assets/frontend/css/red-style.css'); ?>" />
    <!-- <link rel="stylesheet" href="assets/frontend/css/blue-style.css" /> -->
    <style type="text/css" media="screen">
        .hide
        {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope"></i> <a href="mailto:contact@bloodbank.com">contact@bloodbank.com</a>
                <i class="bi bi-phone"></i> +234 701 (8796) 316
            </div>
            <div class="d-none d-lg-flex social-links align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </div>
    <!-- Header -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="/">BloodBank</a></h1>
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
                    <li><a class="nav-link scrollto" href="#faqs">FAQs</a></li>
                    <li><a class="nav-link scrollto" href="#donateBlood">Donate Blood</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <a href="login.php" class="appointment-btn">
                <span class="d-none d-md-inline">Login</span>
            </a>
        </div>
    </header>
    <!-- Hero Section -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h1>Welcome to BloodBank</h1>
            <h2>Your generosity drives progress at BloodBank, together we do more.</h2>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
    </section>
    <main id="main">
        <!-- Why Us Section -->
        <section id="why-us" class="why-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Why Choose BloodBank?</h3>
                            <p>We provide a blood and transplantation service to the NHS, looking after blood donation services in Nigeria and transplant services across Africa. This includes managing the donation, storage and transplantation of blood, organs, tissues, bone marrow and stem cells, and researching new treatments and processes.</p>
                            <div class="text-center">
                                <a href="#donateBlood" class="more-btn">
                                    Be a Blood Donor <i class="bx bx-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-receipt"></i>
                                        <h4>Dedicated to saving lives</h4>
                                        <p>Looking after blood donation services in Nigeria and transplant services across the country.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-cube-alt"></i>
                                        <h4>History of BloodBank</h4>
                                        <p>A background to the blood service and organ donation and transplantation.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-receipt"></i>
                                        <h4>Diversity &amp; inclusion</h4>
                                        <p>We are working hard to ensure that we better reflect the communities we serve.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Counts Section -->
        <section id="counts" class="counts">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="fas fa-user-md"></i>
                            <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Doctors</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="far fa-hospital"></i>
                            <span data-purecounter-start="0" data-purecounter-end="3560" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Donors</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="fas fa-flask"></i>
                            <span data-purecounter-start="0" data-purecounter-end="500" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Patients</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="fas fa-award"></i>
                            <span data-purecounter-start="0" data-purecounter-end="15850" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Donations</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services Section -->
        <section id="services" class="services">
            <div class="container">
                <div class="section-title">
                    <h2>Services</h2>
                    <p>Donors and patients are at the heart of our world-class blood service, We provide a safe, accessible and effective blood service for: donors, patients and the NHS.</p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-heartbeat"></i></div>
                            <h4><a href="">Blood donation</a></h4>
                            <p>Every year we collect two million voluntary blood donations, prepare them for use, and distribute them to hospitals throughout Nigeria</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-pills"></i></div>
                            <h4><a href="">Platelet donation</a></h4>
                            <p>Platelets are collected at our permanent donor centres across Nigeria and are used to help people who can't make enough of their own.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-hospital-user"></i></div>
                            <h4><a href="">Cord blood donation</a></h4>
                            <p>Cord blood is rich in stem cells, which can be used to treat many diseases, but it’s usually thrown away after the birth of a baby.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-dna"></i></div>
                            <h4><a href="">Blood research</a></h4>
                            <p>Our pioneering research is helping to improve outcomes for patients and donors, and includes a world-first blood donor study.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-wheelchair"></i></div>
                            <h4><a href="">Blood transfusion</a></h4>
                            <p>Our goal is to ensure that we supply enough safe blood to meet the needs of patients requiring vital blood transfusions.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-notes-medical"></i></div>
                            <h4><a href="">Therapeutic apheresis</a></h4>
                            <p>These patient services use special technology to exchange, remove or collect certain components within the blood.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Doctors Section -->
        <section id="doctors" class="doctors">
            <div class="container">
                <div class="section-title">
                    <h2>Doctors</h2>
                    <p>Saving lives together, Thank you for your interest in a rewarding career with BloodBank.</p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="assets/frontend/img/team/team1.jpeg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Otitoju Victor Temiloluwa</h4>
                                <span>Database Engineer</span>
                                <p>Used specialized software to store and organize data.</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="<?= asset('assets/frontend/img/team/team2.jpeg'); ?>" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Ajibade Emmanuel Ayooluwa</h4>
                                <span>Frontend Developer</span>
                                <p>Architects and developed the website using web technologies (i.e., HTML, CSS, DOM, and JavaScript).</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="assets/frontend/img/team/team3.jpeg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Jerome Adole Victor</h4>
                                <span>UI\UX Designer</span>
                                <p>Responsible for applying interactive and visual design principles for a positive and cohesive user experience.</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="assets/frontend/img/team/team4.jpeg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Taiwo Hassan Farawe</h4>
                                <span>Backend Developer</span>
                                <p>Responsible for server-side web application logic and integration of the work.</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Frequently Asked Questions Section -->
        <section id="faqs" class="faq section-bg">
            <div class="container">
                <div class="section-title">
                    <h2>Frequently Asked Questions</h2>
                    <p>General Blood & Platelet Donor Guidelines.</p>
                </div>
                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">What Conditions Would Make You Ineligible to Be a Donor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    <br/>You will not be eligible to donate blood or platelets if you:
                                    <ul>
                                        <li>Have tested positive for hepatitis B or hepatitis C, lived with or had sexual contact in the past 12 months with anyone who has hepatitis B or symptomatic hepatitis C.</li>
                                        <li>Had a tattoo in the past 3 months or received a blood transfusion (except with your own blood) in the past 3 months.</li>
                                        <li>Have ever had a positive test for the AIDS virus.</li>
                                        <li>Are a man who has had sex with another man in the past 3 months.</li>
                                        <li>Have used injectable drugs, including anabolic steroids, unless prescribed by a physician in the past 3 months.</li>
                                        <li>Have engaged in prostitution in the past 3 months.</li>
                                        <li>Have lived in or visited the United Kingdom for three months or more cumulatively between 1980 and 1996.</li>
                                        <li>Have spent five years or more in France or Ireland between 1980 and 2001.</li>
                                        <li>Have traveled in the past 3 months, or lived in the past three years, in an area where malaria is endemic.</li>
                                    </ul>
                                </p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">You and Your Donation Are Important to Us?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>Before donating, one of our medical professionals will discuss your health history with you in a private, confidential setting. After taking your pulse, blood pressure, and temperature and checking for anemia, we will determine whether you are eligible to be a donor.</p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">General Guidelines?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>To donate blood or platelets, you must be in good general health, weigh at least 110 pounds, and be at least 16 years old. Parental consent is required for blood donation by 16 year olds; 16 year olds are NOT eligible to donate platelets. No parental consent is required for those who are at least 17 years old. If you are 76 or older, you will need your doctor’s written approval for blood or platelet donation.</p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">What Is ‘Good’ Health? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                                <p>Good health means that you feel well and are able to carry out normal daily activities. If you have a chronic medical condition such as diabetes or high blood pressure, you may still be eligible as long as you are receiving treatment to control your condition.</p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Why Guidelines Are Important? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                                <p>Donor eligibility rules help to protect the health and safety of the donor as well as the person who will receive a blood transfusion. The general guidelines listed below will help you determine if you are eligible to donate blood or platelets.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials">
            <div class="container">
                <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="assets/frontend/img/testimonials/testimonials3.gif" class="testimonial-img" alt="">
                                    <h3>Blessing</h3>
                                    <h4>Ceo &amp; Founder</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Saving the life of someone who deserves to live. The good action of donating blood, makes her feel enthusiasm without fear. Alexandra says that each one of us, at some point in our lives, have something to offer to help someone else who is in need, but that sometimes we are selfish and don't express it. <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="assets/frontend/img/testimonials/testimonials3.gif" class="testimonial-img" alt="">
                                    <h3>Sara</h3>
                                    <h4>Designer</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Saving the life of someone who deserves to live. The good action of donating blood, makes her feel enthusiasm without fear. Alexandra says that each one of us, at some point in our lives, have something to offer to help someone else who is in need, but that sometimes we are selfish and don't express it. <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="assets/frontend/img/testimonials/testimonials3.gif" class="testimonial-img" alt="">
                                    <h3>Precious</h3>
                                    <h4>Store Owner</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Saving the life of someone who deserves to live. The good action of donating blood, makes her feel enthusiasm without fear. Alexandra says that each one of us, at some point in our lives, have something to offer to help someone else who is in need, but that sometimes we are selfish and don't express it. <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="assets/frontend/img/testimonials/testimonials3.gif" class="testimonial-img" alt="">
                                    <h3>Marvelous</h3>
                                    <h4>Freelancer</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Saving the life of someone who deserves to live. The good action of donating blood, makes her feel enthusiasm without fear. Alexandra says that each one of us, at some point in our lives, have something to offer to help someone else who is in need, but that sometimes we are selfish and don't express it. <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="assets/frontend/img/testimonials/testimonials3.gif" class="testimonial-img" alt="">
                                    <h3>Fortune</h3>
                                    <h4>Entrepreneur</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Saving the life of someone who deserves to live. The good action of donating blood, makes her feel enthusiasm without fear. Alexandra says that each one of us, at some point in our lives, have something to offer to help someone else who is in need, but that sometimes we are selfish and don't express it. <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- Donate Blood Section -->
        <section id="donateBlood" class="appointment section-bg">
            <div class="container">
                <div class="section-title">
                    <h2>Before you register as a blood donor</h2>
                    <p>
                        Most people can give blood but sometimes it is not possible to be a blood donor.<br/>

                        Please answer all of the following five questions so that we can advise if blood donation is appropriate for you.
                        Your responses are not recorded in any way.

                        These questions only apply if you want to register as a new blood donor.
                    </p>
                </div>
                <form id="blooddonatableform" action="" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col-md-6 form-group mt-3">
                            <select name="question1" id="question1" class="form-select" required>
                                <option value="">Are you 16 – 65 years old?</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group mt-3">
                            <select name="question2" id="question2" class="form-select" required>
                                <option value="">Do you currently weigh less than 50kg?</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group mt-3">
                            <select name="question3" id="question3" class="form-select" required>
                                <option value="">Have you received donated eggs since 1st January 1980?</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group mt-3">
                            <select name="question4" id="question4" class="form-select" required>
                                <option value="">Have you ever had a cancer other than basal cell carcinoma?</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group mt-3">
                            <select name="question5" id="question5" class="form-select" required>
                                <option value="">Have you had a blood or blood product transfusion since 1st January</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit">Continue</button>
                    </div>
                </form>
                <form action="/" method="post" role="form" class="php-email-form blooddonor-form">
                    <div class="blooddonorform hide">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    placeholder="Your Name:"
                                    class="form-control"
                                    required
                                />
                            </div>
                            <div class="col-md-4 form-group">
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    placeholder="Your Email:"
                                    class="form-control"
                                    required
                                />
                            </div>
                            <div class="col-md-4 form-group">
                                <input
                                    type="text"
                                    name="phone_number"
                                    id="phone_number"
                                    placeholder="Your Phone:"
                                    class="form-control"
                                    required
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group mt-3">
                                <textarea
                                    class="form-control"
                                    name="address"
                                    rows="5"
                                    placeholder="Address:"
                                    required
                                ></textarea>
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <textarea
                                    class="form-control"
                                    name="patient_wish"
                                    rows="5"
                                    placeholder="Patient Wish:"
                                    required
                                ></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message"></div>
                        </div>
                        <div class="text-center">
                            <button type="submit">Donate Blood</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Contact Section -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="section-title">
                    <h2>Contact</h2>
                    <p>For any other enquiries, please fill in the form below:</p>
                </div>
            </div>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>University Road Lagos Mainland Akoka, Yaba, Lagos</p>
                            </div>
                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@bloodbank.com</p>
                            </div>
                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+234 701 (8796) 316</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 mt-5 mt-lg-0">
                        <form action="/contact-us.php" method="post" role="form" class="php-email-form contactus-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        id="name"
                                        placeholder="Your Name:"
                                        required
                                    />
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        id="email"
                                        placeholder="Your Email:"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="subject"
                                    id="subject"
                                    placeholder="Subject:"
                                    required
                                />
                            </div>
                            <div class="form-group mt-3">
                                <textarea
                                    class="form-control"
                                    name="message"
                                    rows="5"
                                    placeholder="Message"
                                    required
                                ></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading...</div>
                                <div class="error-message"></div>
                                <div class="sent-message"></div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer id="footer">
        <div class="container d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    2021 &copy; Copyright <strong><span>BloodBank</span></strong>. All Rights Reserved
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer>
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
    <!-- Vendor JS Files -->
    <script src="assets/backend/js/jquery.js"></script>
    <script src="assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/frontend/vendor/glightbox/js/glightbox.min.js"></script>
    <!-- <script src="assets/frontend/vendor/php-email-form/validate.js"></script> -->
    <script src="assets/frontend/vendor/purecounter/purecounter.js"></script>
    <script src="assets/frontend/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/frontend/javascript/main.js"></script>
    <script src="<?= asset('assets/frontend/javascript/custom.js'); ?>"></script>
</body>
</html>
