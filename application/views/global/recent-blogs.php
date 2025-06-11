<!-- start section -->
<section class="overflow-hidden big-section position-relative">
    <div id="particles-style-01" class="position-absolute h-100 top-0 left-0 w-100"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="outside-box-right-50 lg-outside-box-right-65 sm-me-0">
                    <div class="swiper text-slider-style-02" data-slider-options='{ "slidesPerView": 1, "spaceBetween": 30, "loop": true, "autoplay": { "disableOnInteraction": false }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1400": { "slidesPerView": 2, "spaceBetween": 130 }, "992": { "slidesPerView": 2, "spaceBetween": 80 }, "768": { "slidesPerView": 2, "spaceBetween": 50 } }, "effect": "slide" }'>
                        <div class="swiper-wrapper">
                            <?php foreach ($latest_blogs as $post) : ?>
                                <div class="swiper-slide">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 pt-8 order-lg-1 order-2">
                                            <div class="d-flex align-items-center mb-20px">
                                                <span class="d-inline-block fw-600 text-dark-gray">
                                                    <?= date('M j, Y', strtotime($post['created_at'])) ?>
                                                </span>
                                                <span class="d-inline-block fs-18 alt-font text-light-gray ms-10px me-10px">•</span>
                                                <span class="d-inline-block fs-15 fw-500 text-dark-gray">
                                                    <i class="feather icon-feather-message-circle text-dark-gray d-inline-block fs-14"></i>
                                                    <span><?= $post['comments_count'] ?? 0 ?></span>
                                                </span>
                                                <span class="d-inline-block fs-18 alt-font text-light-gray ms-10px me-10px">•</span>
                                                <span class="d-inline-block fs-15 fw-500 text-dark-gray">
                                                    <i class="feather icon-feather-thumbs-up text-dark-gray d-inline-block fs-14"></i>
                                                    <span><?= $post['likes_count'] ?? 0 ?></span>
                                                </span>
                                            </div>
                                            <div class="outside-box-right-10 xl-outside-box-right-15 lg-outside-box-right-30 md-me-0 position-relative">
                                                <h3 class="ls-minus-1px fw-700 word-break-normal mb-40px sm-mb-20px">
                                                    <a href="/blog/<?= $post['slug'] ?>" class="text-dark-gray text-dark-gray-hover"><?= $post['name'] ?></a>
                                                </h3>
                                            </div>
                                            <div>
                                                <img src="/assets/site-assets/images/home-grown-side-1.webp" class="rounded-circle w-70px me-15px" alt="">
                                                <div class="d-inline-block align-middle">
                                                    <a href="#" class="text-dark-gray fs-18 fw-600 text-decoration-line-bottom"><?= $post['author'] ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-8 order-lg-2 order-1">
                                            <a href="/blog/<?= $post['slug'] ?>">
                                                <img src="/assets/site-assets/images/blog/<?= $post['slug'] ?>.webp" class="border-radius-6px" alt="<?= $post['name'] ?>" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end section -->