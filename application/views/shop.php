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
    <!-- <link rel="stylesheet" href="/assets/site-assets/css/jewellery-store.css" /> -->
</head>

<body data-mobile-nav-style="classic">
    <?php $this->load->view('/global/menu.php'); ?>
    <!-- start section -->
    <section class="position-relative p-0 overflow-hidden bg-base-color" data-background="#232323">
        <div class="container h-100" data-bottom-top="transform: translateY(50px)" data-top-bottom="transform: translateY(-50px)">
            <div class="row align-items-center justify-content-center small-screen sm-h-350px">
                <div class="col-12">
                    <span class="fancy-text-style-4">
                        <span class="fs-100 xl-fs-80 lg-fs-60 md-fs-60 xs-fs-40 fs-370 mb-0 text-dark-gray fw-300 ls-minus-2px d-block">
                            Shop <span class="fw-600" data-fancy-text='{ "art": "curve", "string": ["sketches", "3D prints", "dioramas", "logos"], "duration": 2500 }'></span> for you.</span>
                    </span>
                </div>
            </div>
        </div>
        <div class="position-absolute left-0px top-0px h-100 w-130px d-none d-xl-inline-block" data-anime='{ "translateX": [-30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
            <div class="vertical-title-center align-items-center justify-content-center">
                <div class="title fs-18 text-dark-gray fw-500">Shop Custom Art</div>
            </div>
        </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="ps-6 pe-6 lg-ps-3 lg-pe-3 sm-ps-0 sm-pe-0">
        <div class="container-fluid">
            <div class="row flex-row-reverse">
                <div class="col-xxl-10 col-lg-9 ps-5 md-ps-15px md-mb-60px">
                    <div class="toolbar-wrapper border-bottom border-color-extra-medium-gray d-flex flex-column flex-md-row align-items-center w-100 mb-40px md-mb-30px pb-15px" data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 600, "delay":50, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <div class="sm-mb-10px">
                            <a href="#" class="me-10px"><img src="images/shop-two-column.svg" class="opacity-5" alt="" /></a>
                            <a href="#" class="me-10px"><img src="images/shop-three-column.svg" class="opacity-5" alt="" /></a>
                            <a href="#" class="me-10px"><img src="images/shop-four-column.svg" class="opacity-5" alt="" /></a>
                            <a href="#"><img src="images/shop-list.svg" class="opacity-5" alt="" /></a>
                        </div>
                        <div class="ms-20px sm-ms-0" id="filter-count">Showing 1–12 of 48 results</div>
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
                <div class="col-xxl-2 col-lg-3 shop-sidebar">
                    <div class="mb-30px">
                        <span class="alt-font fw-500 fs-19 text-dark-gray d-block mb-10px">Categories</span>
                        <ul class="shop-filter category-filter fs-17">
                            <li><a href="#" data-filter=".earrings"><span class="product-cb product-category-cb"></span>Earrings</a><span class="item-qty">22</span></li>
                            <li><a href="#" data-filter=".bracelets"><span class="product-cb product-category-cb"></span>Bracelets</a><span class="item-qty">28</span></li>
                            <li><a href="#" data-filter=".rings"><span class="product-cb product-category-cb"></span>Rings</a><span class="item-qty">36</span></li>
                            <li><a href="#" data-filter=".pendant"><span class="product-cb product-category-cb"></span>Pendant</a><span class="item-qty">24</span></li>
                            <li><a href="#" data-filter=".necklace"><span class="product-cb product-category-cb"></span>Necklace</a><span class="item-qty">26</span></li>
                            <li><a href="#" data-filter=".wedding"><span class="product-cb product-category-cb"></span>Wedding</a><span class="item-qty">33</span></li>
                            <li><a href="#" data-filter=".chains"><span class="product-cb product-category-cb"></span>Chains</a><span class="item-qty">22</span></li>
                        </ul>
                    </div>
                    <div class="mb-30px">
                        <span class="alt-font fw-500 fs-19 text-dark-gray d-block mb-10px">Color</span>
                        <ul class="shop-filter color-filter fs-17">
                            <li><a href="#" data-filter=".black"><span class="product-cb product-color-cb" style="background-color:#232323"></span>Black</a><span class="item-qty">05</span></li>
                            <li><a href="#" data-filter=".chestnut"><span class="product-cb product-color-cb" style="background-color:#8E412E"></span>Chestnut</a><span class="item-qty">24</span></li>
                            <li><a href="#" data-filter=".brown"><span class="product-cb product-color-cb" style="background-color:#E0A699"></span>Brown</a><span class="item-qty">32</span></li>
                            <li><a href="#" data-filter=".pastelpink"><span class="product-cb product-color-cb" style="background-color:#E0A699"></span>Pastel pink</a><span class="item-qty">22</span></li>
                            <li><a href="#" data-filter=".lichen"><span class="product-cb product-color-cb" style="background-color:#9DA693"></span>Litchen green</a><span class="item-qty">09</span></li>
                            <li><a href="#" data-filter=".yellow"><span class="product-cb product-color-cb" style="background-color:#E7C06D"></span>Yellow</a><span class="item-qty">06</span></li>
                        </ul>
                    </div>
                    <div class="mb-30px">
                        <span class="alt-font fw-500 fs-19 text-dark-gray d-block mb-10px">Price</span>
                        <ul class="shop-filter price-filter fs-17">
                            <li><a href="#" data-filter=".under-25"><span class="product-cb product-category-cb"></span>Under $25</a><span class="item-qty">08</span></li>
                            <li><a href="#" data-filter=".25-50"><span class="product-cb product-category-cb"></span>$25 to $50</a><span class="item-qty">05</span></li>
                            <li><a href="#" data-filter=".50-100"><span class="product-cb product-category-cb"></span>$50 to $100</a><span class="item-qty">25</span></li>
                            <li><a href="#" data-filter=".100-200"><span class="product-cb product-category-cb"></span>$100 to $200</a><span class="item-qty">18</span></li>
                            <li><a href="#" data-filter=".200-up"><span class="product-cb product-category-cb"></span>$200 & Above</a><span class="item-qty">36</span></li>
                        </ul>
                    </div>
                    <div class="mb-30px">
                        <span class="alt-font fw-500 fs-19 text-dark-gray d-block mb-10px">Metal and stone</span>
                        <ul class="shop-filter fabric-filter fs-17">
                            <li><a href="#" data-filter=".rosegold"><span class="product-cb product-fabric-cb"><img src="images/demo-jewellery-store-product-listing-metal-02.jpg" alt="" /></span>Rose gold</a><span class="item-qty">08</span></li>
                            <li><a href="#" data-filter=".platinum"><span class="product-cb product-fabric-cb"><img src="images/demo-jewellery-store-product-listing-metal-03.jpg" alt="" /></span>Platinum</a><span class="item-qty">08</span></li>
                            <li><a href="#" data-filter=".yellowgold"><span class="product-cb product-fabric-cb"><img src="images/demo-jewellery-store-product-listing-metal-01.jpg" alt="" /></span>Yellow gold</a><span class="item-qty">20</span></li>
                            <li><a href="#" data-filter=".silver"><span class="product-cb product-fabric-cb"><img src="images/demo-jewellery-store-product-listing-metal-03.jpg" alt="" /></span>Silver</a><span class="item-qty">07</span></li>
                        </ul>
                    </div>
                    <div class="mb-30px">
                        <div class="d-flex align-items-center mb-20px">
                            <span class="alt-font fw-500 fs-19 text-dark-gray">New arrivals</span>
                            <div class="d-flex ms-auto">
                                <div class="slider-one-slide-prev-1 swiper-button-prev slider-navigation-style-08 me-5px"><i class="fa-solid fa-arrow-left text-dark-gray"></i></div>
                                <div class="slider-one-slide-next-1 swiper-button-next slider-navigation-style-08 ms-5px"><i class="fa-solid fa-arrow-right text-dark-gray"></i></div>
                            </div>
                        </div>
                        <div class="swiper slider-one-slide" data-slider-options='{ "slidesPerView": 1, "loop": true, "autoplay": { "delay": 5000, "disableOnInteraction": false }, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="shop-filter new-arribals">
                                        <div class="d-flex align-items-center mb-20px">
                                            <figure class="mb-0">
                                                <a href="demo-jewellery-store-single-product.html">
                                                    <img class="border-radius-4px w-80px" src="https://via.placeholder.com/600x765" alt="">
                                                </a>
                                            </figure>
                                            <div class="col ps-25px">
                                                <a href="demo-jewellery-store-single-product.html" class="text-dark-gray alt-font fw-500">Diamond ring</a>
                                                <div class="fs-15 lh-normal"><del class="me-5px">$30.00</del>$23.00</div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mb-20px">
                                            <figure class="mb-0">
                                                <a href="demo-jewellery-store-single-product.html">
                                                    <img class="border-radius-4px w-80px" src="https://via.placeholder.com/600x765" alt="">
                                                </a>
                                            </figure>
                                            <div class="col ps-25px">
                                                <a href="demo-jewellery-store-single-product.html" class="text-dark-gray alt-font fw-500">Geometric ring</a>
                                                <div class="fs-15 lh-normal"><del class="me-5px">$50.00</del>$43.00</div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <figure class="mb-0">
                                                <a href="demo-jewellery-store-single-product.html">
                                                    <img class="border-radius-4px w-80px" src="https://via.placeholder.com/600x765" alt="">
                                                </a>
                                            </figure>
                                            <div class="col ps-25px">
                                                <a href="demo-jewellery-store-single-product.html" class="text-dark-gray alt-font fw-500">Suserrer earring</a>
                                                <div class="fs-15 lh-normal"><del class="me-5px">$20.00</del>$15.00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="shop-filter new-arribals">
                                        <div class="d-flex align-items-center mb-20px">
                                            <figure class="mb-0">
                                                <a href="demo-jewellery-store-single-product.html">
                                                    <img class="border-radius-4px w-80px" src="https://via.placeholder.com/600x765" alt="">
                                                </a>
                                            </figure>
                                            <div class="col ps-25px">
                                                <a href="demo-jewellery-store-single-product.html" class="text-dark-gray alt-font fw-500">Twister bangle</a>
                                                <div class="fs-15 lh-normal"><del class="me-5px">$15.00</del>$10.00</div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mb-20px">
                                            <figure class="mb-0">
                                                <a href="demo-jewellery-store-single-product.html">
                                                    <img class="border-radius-4px w-80px" src="https://via.placeholder.com/600x765" alt="">
                                                </a>
                                            </figure>
                                            <div class="col ps-25px">
                                                <a href="demo-jewellery-store-single-product.html" class="text-dark-gray alt-font fw-500">Zebra earrings</a>
                                                <div class="fs-15 lh-normal"><del class="me-5px">$35.00</del>$30.00</div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <figure class="mb-0">
                                                <a href="demo-jewellery-store-single-product.html">
                                                    <img class="border-radius-4px w-80px" src="https://via.placeholder.com/600x765" alt="">
                                                </a>
                                            </figure>
                                            <div class="col ps-25px">
                                                <a href="demo-jewellery-store-single-product.html" class="text-dark-gray alt-font fw-500">Silver earrings</a>
                                                <div class="fs-15 lh-normal"><del class="me-5px">$20.00</del>$15.00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <?php $this->load->view('/global/footer.php'); ?>
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