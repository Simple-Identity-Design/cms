<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Crafto - The Multipurpose HTML5 Template</title>
    <meta name="description" content="Elevate your online presence with Crafto - a modern, versatile, multipurpose Bootstrap 5 responsive HTML5, SCSS template using highly creative 52+ ready demos.">
    <?php $this->load->view('/global/meta.php'); ?>
    <?php $this->load->view('/global/canonical.php'); ?>
    <?php if (isset($current_page) && $current_page > 1): ?>
        <!-- For pages 2, 3, etc. -->
        <meta name="robots" content="noindex,follow">
    <?php else: ?>
        <!-- For page 1 -->
    <?php endif; ?>
    <?php $this->load->view('/global/main-styles.php'); ?>
</head>

<body data-mobile-nav-style="classic">
    <?php $this->load->view('/global/menu.php'); ?>
    <!-- start page title -->
    <section class="half-section top-space-margin cover-background" style="background-image: url(https://via.placeholder.com/1920x470)">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center position-relative page-title-extra-large">
                    <div class="d-flex flex-column extra-very-small-screen" data-anime='{ "el": "childs", "translateY": [0, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                        <div class="mt-auto">
                            <h1 class="fw-500 text-dark-gray alt-font mb-0 ls-minus-2px">Shop <?php echo ucfirst($category_slug); ?></h1>
                        </div>
                        <div class="fs-16 fw-500 alt-font text-dark-gray justify-content-center breadcrumb breadcrumb-style-01 mt-auto">
                            <?php echo getBreadcrumbs(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    <!-- start section -->
    <section class="ps-6 pe-6 lg-ps-3 lg-pe-3 sm-ps-0 sm-pe-0">
        <div class="container-fluid">
            <div class="row flex-row-reverse">
                <div class="col-xxl-12 ps-5 md-ps-15px md-mb-60px">
                    <div class="toolbar-wrapper border-bottom border-color-extra-medium-gray d-flex flex-column flex-md-row align-items-center w-100 mb-40px md-mb-30px pb-15px" data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 600, "delay":50, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <div class="sm-mb-10px">
                            <a href="#" class="me-10px"><img src="images/shop-two-column.svg" class="opacity-5" alt="" /></a>
                            <a href="#" class="me-10px"><img src="images/shop-three-column.svg" class="opacity-5" alt="" /></a>
                            <a href="#" class="me-10px"><img src="images/shop-four-column.svg" class="opacity-5" alt="" /></a>
                            <a href="#"><img src="images/shop-list.svg" class="opacity-5" alt="" /></a>
                        </div>
                        <div class="ms-20px sm-ms-0" id="filter-count">Showing 0 of 0 results</div>
                        <div class="mx-auto me-md-0">
                            <select id="sort-by" class="fs-18 form-select border-0 background-position-right" aria-label="Default sorting">
                                <option value="original-order" selected>Default sorting</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="latest">Sort by latest</option>
                                <option value="price-asc">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div>
                    </div>
                    <ul class="shop-modern shop-wrapper grid-loading grid grid-4col xxl-grid-4col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-2col gutter-extra-large text-center" data-anime='{ "el": "childs", "translateY": [15, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                        <li class="grid-sizer"></li>
                        <?php foreach ($products as $product): ?>
                            <?php
                            // Skip the product if it's out of stock
                            if ((int)$product['stock'] !== 1) {
                                continue;
                            }
                            // Determine price range class
                            $price = (float)$product['cmsSID_price'];
                            if ($price < 25) {
                                $priceClass = 'under-25';
                            } elseif ($price >= 25 && $price <= 50) {
                                $priceClass = '25-50';
                            } elseif ($price > 50 && $price <= 100) {
                                $priceClass = '50-100';
                            } elseif ($price > 100 && $price <= 200) {
                                $priceClass = '100-200';
                            } else {
                                $priceClass = '200-up';
                            }
                            // Build the URL using the category (lowercased) and product slug.
                            $productUrl = base_url('shop/' . strtolower($product['cmsSID_category']) . '/' . $product['cmsSID_slug']);
                            $productUrlID = base_url($product['id']);
                            ?>
                            <li class="grid-item <?php echo strtolower($product['cmsSID_category']); ?> <?php echo strtolower($product['cmsSID_color']); ?> <?php echo $priceClass; ?>" data-price="<?php echo $product['cmsSID_price']; ?>">
                                <div class="shop-box mb-10px">
                                    <div class="shop-image mb-25px">
                                        <a href="<?php echo $productUrl; ?>">
                                            <img src="<?php echo base_url('assets/images/products/' . $product['cmsSID_slug'] . '.webp'); ?>" alt="<?php echo $product['cmsSID_name']; ?>">
                                            <?php if (!empty($product['cmsSID_badge'])): ?>
                                                <span class="lable <?php echo strtolower($product['cmsSID_badge']); ?>"><?php echo $product['cmsSID_badge']; ?></span>
                                            <?php endif; ?>
                                        </a>
                                        <div class="shop-buttons-wrap d-flex justify-content-between">
                                            <a href="<?php echo $productUrlID; ?>" class="alt-font btn btn-small btn-box-shadow btn-dark-gray btn-round-edge left-icon add-to-cart me-2 p-2">
                                                <i class="feather icon-feather-shopping-bag"></i>
                                                <span class="quick-view-text button-text">Add to cart</span>
                                            </a>
                                            <a href="<?php echo $productUrl; ?>" class="alt-font btn btn-small btn-box-shadow btn-dark-gray btn-round-edge left-icon add-to-wishlist p-2">
                                                <i class="feather icon-feather-heart"></i>
                                                <span class="quick-view-text button-text">View Details</span>
                                            </a>
                                        </div>
                                        <div class="shop-hover d-flex justify-content-center">
                                            <ul>
                                                <li>
                                                    <a href="<?php echo $productUrlID; ?>" class="bg-white w-40px h-40px text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px box-shadow-large"
                                                        data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist">
                                                        <i class="feather icon-feather-heart fs-16"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="bg-white w-40px h-40px text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px box-shadow-large share-btn"
                                                        data-bs-toggle="tooltip" data-bs-placement="left" title="Share"
                                                        data-slug="<?php echo base_url('shop/' . strtolower($product['cmsSID_category']) . '/' . $product['cmsSID_slug']); ?>">
                                                        <i class="feather icon-feather-share fs-16"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="shop-footer text-center">
                                        <a href="<?php echo $productUrl; ?>" class="text-dark-gray fs-19 fw-500">
                                            <?php echo $product['cmsSID_name']; ?>
                                        </a>
                                        <div class="price">
                                            <?php
                                            $price = $product['cmsSID_price'];
                                            $discount = isset($product['cmsSID_discount']) ? (float)$product['cmsSID_discount'] : 0;
                                            if ($discount > 0) {
                                                $discountedPrice = $price - ($price * ($discount / 100));
                                                echo '<del>$' . number_format($price, 2) . '</del> $' . number_format($discountedPrice, 2);
                                            } else {
                                                echo '$' . number_format($price, 2);
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="w-100 d-flex mt-4 justify-content-center"
                        data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 600, "delay":100, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <?php echo $pagination_links; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start footer -->
    <footer class="footer-dark bg-seashell-white pb-0 cover-background" style="background-image: url('images/demo-jewellery-store-footer-bg.jpg');">
        <div class="container">
            <div class="row justify-content-center mb-4 sm-mb-35px">
                <!-- start footer column -->
                <div class="col-6 col-lg-3 last-paragraph-no-margin order-sm-1 md-mb-50px xs-mb-30px">
                    <a href="demo-jewellery-store.html" class="footer-logo d-inline-block mb-20px"><img src="images/demo-jewellery-store-logo-black.png" data-at2x="images/demo-jewellery-store-logo-black@2x.png" alt=""></a>
                    <span class="lh-22 alt-font fw-500 text-dark-gray d-block w-80 lg-w-100 mb-15px">Please reach out to when you need support.</span>
                    <div class="fs-16 text-brown"><i class="feather icon-feather-phone-call icon-small me-10px xs-me-5px text-dark-gray"></i><a href="tel:11234567890">+1 1234567890</a></div>
                    <div class="fs-16"><i class="feather icon-feather-mail icon-small me-10px xs-me-5px text-dark-gray"></i><a href="mailto:info@domain.com">info@domain.com</a></div>
                </div>
                <!-- end footer column -->
                <!-- start footer column -->
                <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-3 order-lg-2">
                    <span class="alt-font fw-500 text-dark-gray d-block mb-5px">Categories</span>
                    <ul class="fs-16">
                        <li><a href="demo-jewellery-store-shop.html">Women collection</a></li>
                        <li><a href="demo-jewellery-store-shop.html">Men collection</a></li>
                        <li><a href="demo-jewellery-store-shop.html">Accessories</a></li>
                        <li><a href="demo-jewellery-store-shop.html">Diamond</a></li>
                        <li><a href="demo-jewellery-store-shop.html">Gold jewellery</a></li>
                    </ul>
                </div>
                <!-- end footer column -->
                <!-- start footer column -->
                <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-3 order-lg-2">
                    <span class="alt-font fw-500 text-dark-gray d-block mb-5px">Account</span>
                    <ul class="fs-16">
                        <li><a href="#">My profile</a></li>
                        <li><a href="demo-jewellery-store-cart.html">My order history</a></li>
                        <li><a href="#">My wish list</a></li>
                        <li><a href="#">Order tracking</a></li>
                        <li><a href="demo-jewellery-store-cart.html">Shopping cart</a></li>
                    </ul>
                </div>
                <!-- end footer column -->
                <!-- start footer column -->
                <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-3 order-lg-2">
                    <span class="alt-font fw-500 text-dark-gray d-block mb-5px">Information</span>
                    <ul class="fs-16">
                        <li><a href="demo-jewellery-store-about.html">About us</a></li>
                        <li><a href="demo-jewellery-store-contact.html">Careers</a></li>
                        <li><a href="#">Events</a></li>
                        <li><a href="#">Articles</a></li>
                        <li><a href="demo-jewellery-store-contact.html">Contact us</a></li>
                    </ul>
                </div>
                <!-- end footer column -->
                <!-- start footer column -->
                <div class="col-lg-3 col-sm-6 ps-30px sm-ps-15px md-mb-50px xs-mb-0 order-sm-2 order-lg-5 text-center text-sm-start">
                    <span class="alt-font fw-500 text-dark-gray d-block mb-10px">Connect with us</span>
                    <div class="elements-social social-icon-style-09">
                        <ul class="small-icon dark mb-20px">
                            <li><a class="facebook" href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i><span></span></a></li>
                            <li><a class="instagram" href="http://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i><span></span></a></li>
                            <li><a class="twitter" href="http://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i><span></span></a></li>
                            <li><a class="dribbble" href="http://www.dribbble.com" target="_blank"><i class="fa-brands fa-dribbble"></i><span></span></a></li>
                        </ul>
                    </div>
                    <span class="alt-font fw-500 text-dark-gray d-block mb-10px">Secure payment</span>
                    <div class="footer-card d-block d-sm-flex align-items-center">
                        <a href="#" class="d-inline-block me-5px align-middle"><img src="images/visa.svg" class="h-25px" alt=""></a>
                        <a href="#" class="d-inline-block me-5px align-middle"><img src="images/mastercard.svg" class="h-25px" alt=""></a>
                        <a href="#" class="d-inline-block me-5px align-middle"><img src="images/american-express.svg" class="h-25px" alt=""></a>
                        <a href="#" class="d-inline-block me-5px align-middle"><img src="images/discover.svg" class="h-25px" alt=""></a>
                        <a href="#" class="d-inline-block me-5px align-middle"><img src="images/diners-club.svg" class="h-25px" alt=""></a>
                    </div>
                </div>
                <!-- end footer column -->
            </div>
            <div class="row justify-content-center align-items-center">
                <!-- start divider -->
                <div class="col-12">
                    <div class="divider-style-03 divider-style-03-01 border-color-transparent-dark-very-light"></div>
                </div>
                <!-- end divider -->
                <!-- start copyright -->
                <div class="col-md-6 pt-20px pb-20px sm-pt-0 fs-16 order-2 order-md-1 text-center text-md-start last-paragraph-no-margin">
                    <p>&copy; 2024 Crafto is Proudly Powered by <a href="https://www.themezaa.com/" target="_blank" class="text-decoration-line-bottom text-dark-gray">ThemeZaa</a></p>
                </div>
                <!-- end copyright -->
                <!-- start footer menu -->
                <div class="col-md-6 pt-20px pb-20px sm-pb-10px fs-16 order-1 order-md-2 text-center text-md-end">
                    <ul class="footer-navbar xs-lh-normal">
                        <li><a href="#" class="nav-link">Terms and conditions</a></li>
                        <li><a href="#" class="nav-link">Privacy policy</a></li>
                    </ul>
                </div>
                <!-- end footer menu -->
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <div id="alert-container"></div> <!-- start cookie message -->
    <div id="cookies-model" class="cookie-message bg-dark-gray border-radius-8px">
        <div class="cookie-description fs-14 text-white mb-20px lh-22">We use cookies to enhance your browsing experience, serve personalized ads or content, and analyze our traffic. By clicking "Allow cookies" you consent to our use of cookies. </div>
        <div class="cookie-btn">
            <a href="#" class="btn btn-transparent-white border-1 border-color-transparent-white-light btn-very-small btn-switch-text btn-rounded w-100 mb-15px" aria-label="btn">
                <span>
                    <span class="btn-double-text" data-text="Cookie policy">Cookie policy</span>
                </span>
            </a>
            <a href="#" class="btn btn-white btn-very-small btn-switch-text btn-box-shadow accept_cookies_btn btn-rounded w-100" data-accept-btn aria-label="text">
                <span>
                    <span class="btn-double-text" data-text="Allow cookies">Allow cookies</span>
                </span>
            </a>
        </div>
    </div>
    <!-- end cookie message -->
    <!-- start scroll progress -->
    <div class="scroll-progress d-none d-xxl-block">
        <a href="#" class="scroll-top" aria-label="scroll">
            <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
        </a>
    </div>
    <!-- end scroll progress -->
    <!-- javascript libraries -->
    <?php $this->load->view('/global/main-scripts.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script>
        $(document).ready(function() {
            var $grid = $('.shop-wrapper').isotope({
                itemSelector: '.grid-item',
                layoutMode: 'fitRows',
                getSortData: {
                    price: function(itemElem) {
                        return parseFloat($(itemElem).attr('data-price'));
                    }
                }
            });
            // A helper function to update the "X of Y" text
            function updateCount() {
                var visibleCount = $grid.isotope('getFilteredItemElements').length; // how many are visible
                var totalCount = $grid.find('.grid-item').length; // total items
                $('#filter-count').text('Showing ' + visibleCount + ' of ' + totalCount + ' results');
            }
            // Call updateCount on initial load
            updateCount();
            // Every time Isotope finishes arranging (after filter/sort), update the count
            $grid.on('arrangeComplete', function() {
                updateCount();
            });
            // Sorting: When the sort dropdown value changes
            $('.toolbar-wrapper select').on('change', function() {
                var sortValue = $(this).val();
                var sortOptions = {};
                if (sortValue === '4' || sortValue === 'price-asc') {
                    sortOptions = {
                        sortBy: 'price',
                        sortAscending: true
                    };
                } else if (sortValue === '5' || sortValue === 'price-desc') {
                    sortOptions = {
                        sortBy: 'price',
                        sortAscending: false
                    };
                } else {
                    sortOptions = {
                        sortBy: 'original-order'
                    };
                }
                $grid.isotope(sortOptions);
            });
            // Filtering: When a sidebar filter link is clicked
            $('.shop-sidebar .shop-filter li a').on('click', function(e) {
                e.preventDefault();
                var filterValue = $(this).data('filter') || '*';
                $grid.isotope({
                    filter: filterValue
                });
                $(this).closest('ul').find('li').removeClass('active');
                $(this).parent().addClass('active');
            });
        });
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.share-btn').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    var slug = btn.getAttribute('data-slug');
                    if (navigator.clipboard) {
                        navigator.clipboard.writeText(slug).then(function() {
                            var alertHtml = '<div class="alert alert-danger alert-dismissable">' +
                                '<a href="#" class="close" data-bs-dismiss="alert" aria-label="close"><i class="feather icon-feather-x"></i></a>' +
                                'Copied to clipboard!'
                            '</div>';
                            var alertContainer = document.getElementById('alert-container');
                            if (alertContainer) {
                                alertContainer.innerHTML = alertHtml;
                            } else {
                                document.body.insertAdjacentHTML('afterbegin', alertHtml);
                            }
                        }).catch(function(err) {
                            console.error("Error copying text: ", err);
                        });
                    } else {
                        // Fallback for older browsers
                        var textarea = document.createElement("textarea");
                        textarea.value = slug;
                        document.body.appendChild(textarea);
                        textarea.select();
                        try {
                            document.execCommand('copy');
                            var alertHtml = '<div class="alert alert-danger alert-dismissable">' +
                                '<a href="#" class="close" data-bs-dismiss="alert" aria-label="close"><i class="feather icon-feather-x"></i></a>' +
                                'Copied to clipboard!'
                            '</div>';
                            var alertContainer = document.getElementById('alert-container');
                            if (alertContainer) {
                                alertContainer.innerHTML = alertHtml;
                            } else {
                                document.body.insertAdjacentHTML('afterbegin', alertHtml);
                            }
                        } catch (err) {
                            console.error("Fallback: unable to copy", err);
                        }
                        document.body.removeChild(textarea);
                    }
                });
            });
        });
    </script>
</body>

</html>