<!doctype html>
<html class="no-js" lang="en">
<head>
    <title>Crafto - The Multipurpose HTML5 Template</title>
    <meta name="description" content="Elevate your online presence with Crafto - a modern, versatile, multipurpose Bootstrap 5 responsive HTML5, SCSS template using highly creative 52+ ready demos.">
    <?php $this->load->view('/global/meta.php'); ?>
    <?php $this->load->view('/global/canonical.php'); ?>
    <?php $this->load->view('/global/main-styles.php'); ?>
    <?php $this->load->view('/global/custom-styles.php'); ?>
</head>
<body data-mobile-nav-style="classic" class="background-position-center-top custom-cursor" style="background-image: url(/assets/images/vertical-line-bg-small-medium-gray.svg)">
    <!-- start cursor -->
    <div class="cursor-page-inner">
        <div class="circle-cursor circle-cursor-inner"></div>
        <div class="circle-cursor circle-cursor-outer"></div>
    </div>
    <!-- end cursor -->
    <?php $this->load->view('/global/menu.php'); ?>
    <div class="main-content background-position-center-top" style="background-image: url(/assets/images/vertical-line-bg-small-medium-gray.svg)">
        <!-- start page title -->
        <section class="top-space-margin pb-0 position-relative">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-11">
                        <h1 class="alt-font fs-170 lg-fs-140 md-fs-120 sm-fs-80 sm-ls-minus-2px fw-500 mb-0 ls-minus-7px" data-fancy-text='{ "opacity": [0, 1], "translateX": [50, 0], "filter": ["blur(20px)", "blur(0px)"], "string": ["Contact"], "duration": 400, "delay": 0, "speed": 20, "easing": "easeOutQuad" }'></h1>
                    </div>
                </div>
                <div class="row align-items-center lg-mb-50px sm-mb-0">
                    <div class="col-lg-7 text-star text-xl-end offset-lg-1">
                        <h2 class="alt-font fs-170 lg-fs-140 md-fs-120 sm-fs-80 sm-ls-minus-2px fw-300 mb-0 ls-minus-7px" data-fancy-text='{ "opacity": [0, 1], "translateX": [50, 0], "filter": ["blur(20px)", "blur(0px)"], "string": ["contact"], "duration": 400, "delay": 300, "speed": 20, "easing": "easeOutQuad" }'></h2>
                    </div>
                    <div class="col-lg-3 last-paragraph-no-margin" data-anime='{ "el": "childs", "translateX": [15, 0], "opacity": [0,1], "duration": 800, "delay": 800, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <p class="mt-40px md-w-75 sm-w-85 sm-mt-30px">Reach out to for custom art, creative collaborations, or just to talk, I would love to hear from you.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title -->
        <!-- start section -->
        <section>
            <div class="container" data-anime='{ "el": "childs", "translateY": [0, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <div class="row align-items-center mb-40px">
                    <div class="col-xl-6 col-md-7 offset-xl-2 col-3">
                        <div class="separator-line-3px bg-dark-gray"></div>
                    </div>
                    <div class="col-xl-3 col-md-5 col-9">
                        <h6 class="fw-600 mb-0"><a href="mailto:info@artbykapo.com">info@artbykapo.com</a></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-4 offset-xl-2 last-paragraph-no-margin sm-mb-20px">
                        <span class="d-block text-medium-gray">Have questions?</span>
                        <p class="mb-0 fw-600"><a href="mailto:info@artbykapo.com">info@artbykapo.com</a></p>
                    </div>
                    <div class="col-xl-3 col-md-4 last-paragraph-no-margin sm-mb-20px">
                        <p class="w-80 fw-600 md-w-100"><a href="https://www.google.com/maps/place/Art+by+Kapo/data=!4m2!3m1!1s0x0:0x9a29b81dbcd00cdd?sa=X&ved=1t:2428&hl=en&ictx=111" target="_blank">13386 US HWY 301<br> Gable, SC, 29051</a></p>
                    </div>
                    <div class="col-xl-3 col-md-4 last-paragraph-no-margin">
                        <span class="d-block text-medium-gray">Say hello!</span>
                        <p class="fw-600"><a href="tel:9102126714">(910) 212-674</a></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-md-12 offset-xl-2">
                        <!-- start contact form -->
                        <!-- Page Loader Element -->
                        <div class="page-loader" style="display: none;"></div>
                        <form action="/contact/submit" method="post" class="contact-form-style-07" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                            <div class="col-12 mt-20px mb-0 text-center text-md-start">
                                <div class="my-custom-results d-none"></div>
                            </div>
                            <div class="position-relative form-group mb-30px d-flex flex-md-row flex-column">
                                <label for="fullName" class="form-label fs-60 md-fs-50 ls-minus-1px text-dark-gray fw-500 mb-0 me-30px">My name is</label>
                                <div class="position-relative col">
                                    <span class="form-icon"><i class="bi bi-person icon-small"></i></span>
                                    <input class="ps-0 border-radius-0px border-color-dark-gray bg-transparent form-control required" id="fullName" type="text" name="full_name" placeholder="Enter your full name here*" />
                                </div>
                            </div>
                            <div class="position-relative form-group mb-30px d-flex flex-md-row flex-column">
                                <label for="emailAddress" class="form-label fs-60 md-fs-50 ls-minus-1px text-dark-gray fw-500 mb-0 me-30px">Here is my email</label>
                                <div class="position-relative col">
                                    <span class="form-icon"><i class="bi bi-envelope icon-small"></i></span>
                                    <input class="ps-0 border-radius-0px border-color-dark-gray bg-transparent form-control required" id="emailAddress" type="email" name="email" placeholder="Enter your email here*" />
                                </div>
                            </div>
                            <div class="position-relative form-group form-textarea d-flex flex-md-row flex-column">
                                <label for="messageText" class="form-label fs-60 md-fs-50 ls-minus-1px text-dark-gray fw-500 mb-0 me-30px">I'd like</label>
                                <div class="position-relative col">
                                    <textarea class="ps-0 border-radius-0px border-color-dark-gray bg-transparent form-control" name="message" id="messageText" placeholder="Enter your message here" rows="3"></textarea>
                                    <span class="form-icon"><i class="bi bi-chat-square-dots icon-small"></i></span>
                                </div>
                            </div>
                            <div class="row mt-40px align-items-center">
                                <div class="col-md-7 col-sm-7 lg-mb-30px md-mb-0">
                                    <p class="mb-0 fs-14 lh-22 text-center text-sm-start">
                                        We are committed to protecting your privacy. We will never collect information about you without your explicit consent.
                                    </p>
                                </div>
                                <div class="col-md-5 col-sm-5 text-center text-sm-end xs-mt-25px">
                                    <input id="redirect" type="hidden" name="redirect" value="">
                                    <button class="btn btn-dark-gray btn-small btn-box-shadow" type="submit">Send message</button>
                                </div>
                            </div>
                        </form>
                        <!-- end contact form -->
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
    </div>
    <?php $this->load->view('/global/scroller.php'); ?>
    <!-- javascript libraries -->
    <?php $this->load->view('/global/main-scripts.php'); ?>
    <?php $this->load->view('/global/contact-script.php'); ?>
</body>
</html>