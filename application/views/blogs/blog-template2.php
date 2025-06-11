<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Crafto - The Multipurpose HTML5 Template</title>
    <meta name="description" content="Elevate your online presence with Crafto - a modern, versatile, multipurpose Bootstrap 5 responsive HTML5, SCSS template using highly creative 52+ ready demos.">
    <?php $this->load->view('/global/meta.php'); ?>
    <?php $this->load->view('/global/main-styles.php'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.dataTables.css">
    <link rel="stylesheet" href="/assets/site-assets/css/pizza-parlor.css" />
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BlogPosting",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "https://example.com.com/blog/<?php echo $blog['intended']['slug']; ?>/"
            },
            "headline": "<?php echo $blog['intended']['blog_h1']; ?>",
            "description": "<?php echo $blog['intended']['blog_desc']; ?>",
            "image": "https://example.com.com/assets/site-assets/images/blog/<?php echo $blog['intended']['slug']; ?>.webp",
            "author": {
                "@type": "Person",
                "name": "<?php echo $blog['intended']['author']; ?>"
            },
            "publisher": {
                "@type": "Organization",
                "name": "Home Grown Finest Farming",
                "logo": {
                    "@type": "ImageObject",
                    "url": "https://example.com.com/assets/site-assets/images/Logo-Horizontal-white.webp"
                }
            },
            "datePublished": "<?php echo (new DateTime($blog['intended']['created_at']))->format("Y-m-d"); ?>"
        }
    </script>
    <style>
        .sidebar {
            position: sticky;
            top: 80px;
            /* Adjust this value as needed to avoid overlap with the sticky menu */
            align-self: start;
        }
    </style>
</head>

<body data-mobile-nav-style="classic">
    <?php $this->load->view('/global/menu.php'); ?>
    <!-- start section -->
    <section class="top-space-margin right-side-bar">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 blog-standard md-mb-50px sm-mb-40px">
                    <!-- start blog details  -->
                    <div class="col-12 blog-details mb-12">
                        <div class="entry-meta mb-20px fs-15">
                            <span>
                                <i class="text-dark-gray feather icon-feather-calendar"></i>
                                <a href="blog-grid.html">
                                    <?php echo (new DateTime($blog['intended']['created_at']))->format("jS F Y"); ?>
                                </a>
                            </span>
                            <span>
                                <i class="text-dark-gray feather icon-feather-user"></i>
                                <a href="blog-grid.html">
                                    <?php echo $blog['intended']['author']; ?>
                                </a>
                            </span>
                        </div>
                        <h1 class="text-dark-gray fw-600 w-80 sm-w-100 mb-6 h5">
                            <?php echo $blog['intended']['blog_h1']; ?>
                        </h1>
                        <img src="/assets/site-assets/images/blog/<?php echo $blog['intended']['slug']; ?>.webp" alt="" class="w-100 border-radius-6px mb-7">
                        <div class="p-9 border-radius-5px bg-dark-gray blockquote-style-01 mb-6">
                            <!-- start blockquote -->
                            <i class="bi bi-chat-quote float-start me-30px xs-me-20px text-gradient-pink-orange icon-extra-double-large xs-icon-double-large"></i>
                            <blockquote class="mb-0 d-table last-paragraph-no-margin">
                                <p class="fs-28 lh-36 text-white mb-15px">The food you eat can be either the safest and most powerful medicine or the <span class="fw-500 text-decoration-line-bottom">slowest form of poison.</span></p>
                                <div class="fw-500 text-uppercase fs-13 text-white mt-15px">- Alexander harvard</div>
                            </blockquote>
                            <!-- end blockquote -->
                        </div>
                        <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. lorem ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic.</p>
                        <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. lorem ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic.</p>
                        <blockquote class="alt-font border-4 border-start border-color-base-color text-dark-gray fw-500 ps-40px mt-7 mb-7 ms-60px lg-ms-30px sm-ms-0 lg-ps-30px">
                            <p>Tomorrow is the most important thing in life. Comes into us at midnight very clean. It's perfect when it arrives and it puts itself in our hands. It hopes we've learned something from yesterday.</p>
                            <footer class="fs-14 fw-600 text-base-color d-inline-block text-uppercase">John Wayne</footer>
                        </blockquote>
                        <img src="/assets/site-assets/images/home-grown-finest-slider.webp" alt="" class="w-100 border-radius-6px mb-7">
                        <p><span class="alt-font first-letter text-dark-gray">M</span>lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non , sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 text-center text-lg-end sm-mb-30px"><img src="/assets/site-assets/images/quotes.webp" class="mt-10px" alt=""></div>
                                    <div class="offset-lg-1 col-md-8 last-paragraph-no-margin text-center text-md-start">
                                        <div class="pb-35px text-center text-md-start">
                                            <h5 class="text-dark-gray fw-500 w-90 md-w-100 alt-font">The artist's world is limitless. It can be found any where far from where he lives or a few feet away.</h5>
                                            <span class="fw-600 text-dark-gray d-block lh-20 text-uppercase">Nicholas Robinson</span>
                                            <span class="d-block text-uppercase fs-13">Founder of photos</span>
                                        </div>
                                        <div class="h-3px w-100 bg-dark-gray mb-35px"></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-center">
                            <div class="col-xl-5 col-lg-6 md-mb-50px sm-mb-20px" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                                <span class="bg-white box-shadow-bottom text-uppercase fs-13 ps-25px pe-25px alt-font fw-700 text-base-color lh-40 sm-lh-55 border-radius-100px d-inline-block mb-25px">About business</span>
                                <h3 class="text-dark-gray fw-600 ls-minus-1px mb-20px sm-w-85 xs-w-100">Smart and effective business solutions.</h3>
                                <p>We are excited for our work and how it positively impacts clients. With over 12 years of experience we have been constantly providing excellent solutions.</p>
                                <ul class="list-style-04 text-dark-gray fw-500">
                                    <li>Beautiful and easy to understand animations</li>
                                    <li>Theme advantages are pixel perfect design</li>
                                    <li>Find more creative ideas for your projects</li>
                                    <li>Unlimited power and customization possibilities</li>
                                </ul>
                            </div>
                            <div class="col-xl-6 col-lg-6 offset-xl-1 position-relative md-mb-50px">
                                <div class="text-end w-80 md-w-75 ms-auto" data-animation-delay="500" data-shadow-animation="true" data-bottom-top="transform: translateY(50px)" data-top-bottom="transform: translateY(-50px)">
                                    <img src="/assets/site-assets/images/home-grown-finest-slider.webp" alt="" class="border-radius-5px">
                                </div>
                                <div class="w-60 md-w-50 xs-w-55 overflow-hidden position-absolute left-15px bottom-minus-50px" data-shadow-animation="true" data-animation-delay="500" data-bottom-top="transform: translateY(-50px)" data-top-bottom="transform: translateY(50px)">
                                    <img src="/assets/site-assets/images/produce-menu-2.webp" alt="" class="border-radius-5px box-shadow-quadruple-large" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 mb-7">
                                <div class="d-block d-md-flex w-100 box-shadow-extra-large align-items-center border-radius-4px p-8">
                                    <div class="w-140px text-center me-60px sm-mx-auto">
                                        <img src="/assets/site-assets/images/home-grown-finest-farming-logo.png" class="rounded-circle w-110px" alt="">
                                        <a href="blog-grid.html" class="text-dark-gray fw-500 mt-25px d-inline-block lh-20">Home Grown</a>
                                        <span class="fs-15 lh-20 d-block sm-mb-15px">Finest Farming</span>
                                    </div>
                                    <div class="w-75 sm-w-100 text-center text-md-start">
                                        <p class="mb-5px">Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type.</p>
                                        <a href="blog-grid.html" class="btn btn-link btn-large text-dark-gray mt-20px fw-600">All posts</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12 text-center elements-social social-icon-style-04">
                                <ul class="medium-icon dark">
                                    <li><a class="facebook" href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i><span></span></a></li>
                                    <li><a class="twitter" href="http://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i><span></span></a></li>
                                    <li><a class="instagram" href="http://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"><span></span></i></a></li>
                                    <li><a class="linkedin" href="http://www.linkedin.com" target="_blank"><i class="fa-brands fa-linkedin-in"><span></span></i></a></li>
                                    <li><a class="behance" href="http://www.behance.com/" target="_blank"><i class="fa-brands fa-behance"></i><span></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end blog details -->
                </div>
                <?php $this->load->view('/global/blog-sidebar.php'); ?>
            </div>
        </div>
    </section>
    <!-- end section -->
    <?php $this->load->view('/global/why.php'); ?>
    <?php $this->load->view('/global/footer.php'); ?>
    <!-- javascript libraries -->
    <script type="text/javascript" src="/assets/site-assets/js/jquery.js"></script>
    <script type="text/javascript" src="/assets/site-assets/js/vendors.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.dataTables.js"></script>
    <!-- Slider's main "init" script -->
    <script type="text/javascript">
        new DataTable('#fruitTable', {
            responsive: true
        });
        new DataTable('#fruitTable', {
            destroy: true,
            responsive: true
        });
        //get year
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
    <script type="text/javascript" src="/assets/site-assets/js/main.js"></script>
</body>

</html>