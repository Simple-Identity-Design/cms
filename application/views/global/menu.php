<?php
$logged_in  = $this->session->userdata('logged_in');
$first_name = $this->session->userdata('first_name') ?? 'Guest';
$user_level = (int) $this->session->userdata('level');
?>
<!-- start header -->
<header>
    <!-- start navigation -->
    <nav class="navbar navbar-expand-lg header-transparent header-light bg-transparent header-reverse-back-scroll glass-effect">
        <div class="container-fluid">
            <div class="col-auto col-lg-2 me-lg-0 me-auto">
                <a class="navbar-brand" href="/">
                    <img src="/assets/site-assets/images/Logo-Horizontal-white.png" alt="" class="default-logo">
                    <img src="/assets/site-assets/images/Logo-Horizontal.png" alt="" class="alt-logo">
                    <img src="/assets/site-assets/images/Logo-Horizontal.png" alt="" class="mobile-logo">
                </a>
            </div>
            <div class="col-auto menu-order position-static">
                <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav alt-font">
                        <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="/who-we-are" class="nav-link">Who we are</a></li>
                        <li class="nav-item dropdown dropdown-with-icon">
                            <a href="/services" class="nav-link">Services</a>
                            <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a href="#"><img src="/assets/site-assets/images/web-development.svg" alt="">Web Development</a></li>
                                <li><a href="#"><img src="/assets/site-assets/images/marketing.svg" alt="">Marketing</a></li>
                                <li><a href="#"><img src="/assets/site-assets/images/other.svg" alt="">Other Services</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="/clients" class="nav-link">Clients</a></li>
                        <li class="nav-item"><a href="/blog" class="nav-link">Blog</a></li>
                        <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
                        <?php if ($logged_in): ?>
                            <?php if ($user_level === 1): ?>
                                <li class="nav-item"><a href="/admin" class="nav-link">Admin</a></li>
                            <?php endif; ?>
                            <li class="nav-item"><a href="/logout" class="nav-link">Logout</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                            <li class="nav-item"><a href="/register" class="nav-link">Register</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-auto col-lg-2 text-end md-pe-0">
                <div class="header-icon">
                    <div class="header-search-icon icon">
                        <a href="#" class="search-form-icon header-search-form" aria-label="search"><i class="feather icon-feather-search"></i></a>
                        <!-- start search input -->
                        <div class="search-form-wrapper">
                            <button title="Close" type="button" class="search-close alt-font">×</button>
                            <form id="search-form" role="search" method="get" class="search-form text-left" action="search-result.html">
                                <div class="search-form-box">
                                    <h2 class="text-dark-gray fw-700 ls-minus-1px text-center mb-4 alt-font">What are you looking for?</h2>
                                    <input class="search-input alt-font" id="search-form-input5e219ef164995" placeholder="Enter your keywords..." name="s" value="" type="text" autocomplete="off">
                                    <button type="submit" class="search-button">
                                        <i class="feather icon-feather-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- end search input -->
                    </div>
                    <div class="header-push-button icon">
                        <div class="push-button">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navigation -->
    <!-- start push popup -->
    <div class="push-menu push-menu-style-2 ps-50px pe-50px pt-4 pb-4 bg-white">
        <div class="left-circle bg-gradient-emerald-blue-emerald-green"></div>
        <span class="close-menu text-white bg-dark-gray"><i class="fa-solid fa-xmark"></i></span>
        <div class="push-menu-wrapper" data-scroll-options='{ "theme": "dark" }'>
            <div class="push-menu-header pt-10 pb-30 mb-30 d-block">
                <h4 class="alt-font fw-500 text-white lh-42">Scalable business for <span class="text-decoration-line-bottom-medium fw-700">startups</span></h4>
            </div>
            <div class="push-menu-address pt-30 lg-pt-10">
                <div class="icon-with-text-style-01 mb-15px">
                    <div class="feature-box feature-box-left-icon last-paragraph-no-margin">
                        <div class="feature-box-icon me-15px">
                            <i class="feather icon-feather-map-pin text-dark-gray lh-inherit"></i>
                        </div>
                        <div class="feature-box-content">
                            <p class="w-90 lh-26">401 Broadway, 24th Floor New York, NY 10013.</p>
                        </div>
                    </div>
                </div>
                <div class="icon-with-text-style-01 mb-15px">
                    <div class="feature-box feature-box-left-icon last-paragraph-no-margin">
                        <div class="feature-box-icon me-15px">
                            <i class="feather icon-feather-mail text-dark-gray lh-inherit"></i>
                        </div>
                        <div class="feature-box-content">
                            <a href="mailto:info@yourdomain.com">info@yourdomain.com</a>
                        </div>
                    </div>
                </div>
                <div class="icon-with-text-style-01">
                    <div class="feature-box feature-box-left-icon last-paragraph-no-margin">
                        <div class="feature-box-icon me-15px">
                            <i class="feather icon-feather-phone-call text-dark-gray lh-inherit"></i>
                        </div>
                        <div class="feature-box-content">
                            <a href="tel:1800222000">1-800-222-000</a>
                        </div>
                    </div>
                </div>
                <div class="separator-line-1px w-100 bg-extra-medium-gray d-block mt-30px mb-30px"></div>
            </div>
            <div class="push-menu-social last-paragraph-no-margin">
                <div class="elements-social social-text-style-01">
                    <ul class="medium-icon dark fw-500">
                        <li><a class="facebook" href="https://www.facebook.com/" target="_blank">Fb.</a></li>
                        <li><a class="linkedin" href="http://www.linkedin.com" target="_blank">In.</a></li>
                        <li><a class="twitter" href="http://www.twitter.com" target="_blank">Tw.</a></li>
                        <li><a class="dribbble" href="http://www.dribbble.com" target="_blank">Dr.</a></li>
                    </ul>
                </div>
                <p class="fs-14">&COPY; Copyright 2024 <a href="index.html" target="_blank">Crafto</a></p>
            </div>
        </div>
    </div>
    <!-- end push popup -->
</header>
<!-- end header -->