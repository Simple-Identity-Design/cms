<!-- start sidebar -->
<aside class="col-12 col-xl-4 col-lg-4 col-md-7 ps-55px xl-ps-50px lg-ps-15px sidebar">
    <div class="mb-15 md-mb-50px xs-mb-35px">
        <div class="fw-600 fs-19 lh-22 ls-minus-05px text-dark-gray border-bottom border-color-dark-gray border-2 d-block mb-30px pb-15px position-relative">Recent Posts</div>
        <ul class="popular-post-sidebar position-relative">
            <?php foreach ($blog['random'] as $post) : ?>
                <li class="d-flex align-items-center">
                    <figure>
                        <a href="/blog/<?= $post['slug'] ?>">
                            <img src="/assets/site-assets/images/blog/<?= $post['slug'] ?>.webp" alt="<?= $post['blog_title'] ?>">
                        </a>
                    </figure>
                    <div class="col media-body">
                        <a href="/blog/<?= $post['slug'] ?>" class="fw-600 fs-17 text-dark-gray d-inline-block mb-10px">
                            <?= $post['blog_title'] ?>
                        </a>
                        <div>
                            <span class="d-inline-block fs-15">
                                <?= date('F j, Y', strtotime($post['created_at'])) ?>
                            </span>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="mb-15 md-mb-50px xs-mb-35px elements-social social-icon-style-10">
        <div class="fw-600 fs-19 lh-22 ls-minus-05px text-dark-gray border-bottom border-color-dark-gray border-2 d-block mb-30px pb-15px position-relative">Stay connected</div>
        <div class="row row-cols-2 row-cols-lg-2 justify-content-center align-items-center g-0">
            <div class="col border-bottom border-end border-color-extra-medium-gray ps-25px pe-25px xl-ps-15px xl-pe-15px lg-ps-10px lg-pe-10px pt-10px pb-10px">
                <a class="facebook text-dark-gray" href="https://www.facebook.com/" target="_blank">
                    <i class="fa-brands fa-facebook-f fs-18 me-10px"></i>
                    <span class="fw-500">Facebook</span>
                </a>
            </div>
            <div class="col border-bottom border-color-extra-medium-gray ps-25px pe-25px xl-ps-15px xl-pe-15px lg-ps-10px lg-pe-10px pt-10px pb-10px">
                <a class="dribbble text-dark-gray" href="http://www.dribbble.com" target="_blank">
                    <i class="fa-brands fa-dribbble fs-18 me-10px"></i>
                    <span class="fw-500">Dribbble</span>
                </a>
            </div>
            <div class="col border-bottom border-end border-color-extra-medium-gray ps-25px pe-25px xl-ps-15px xl-pe-15px lg-ps-10px lg-pe-10px pt-10px pb-10px">
                <a class="twitter text-dark-gray" href="http://www.twitter.com" target="_blank">
                    <i class="fa-brands fa-twitter fs-18 me-10px"></i>
                    <span class="fw-500">Twitter</span>
                </a>
            </div>
            <div class="col border-bottom border-color-extra-medium-gray ps-25px pe-25px xl-ps-15px xl-pe-15px lg-ps-10px lg-pe-10px pt-10px pb-10px">
                <a class="youtube text-dark-gray" href="http://www.youtube.com" target="_blank">
                    <i class="fa-brands fa-youtube fs-18 me-10px"></i>
                    <span class="fw-500">Youtube</span>
                </a>
            </div>
            <div class="col border-bottom border-end border-color-extra-medium-gray ps-25px pe-25px xl-ps-15px xl-pe-15px lg-ps-10px lg-pe-10px pt-10px pb-10px">
                <a class="instagram text-dark-gray" href="http://www.instagram.com" target="_blank">
                    <i class="fa-brands fa-instagram fs-18 me-10px"></i>
                    <span class="fw-500">Instagram</span>
                </a>
            </div>
            <div class="col border-bottom border-color-extra-medium-gray ps-25px pe-25px xl-ps-15px xl-pe-15px lg-ps-10px lg-pe-10px pt-10px pb-10px">
                <a class="vimeo text-dark-gray" href="https://vimeo.com/" target="_blank">
                    <i class="fa-brands fa-vimeo-v fs-18 me-10px"></i>
                    <span class="fw-500">Vimeo</span>
                </a>
            </div>
            <div class="col border-end border-color-extra-medium-gray ps-25px pe-25px xl-ps-15px xl-pe-15px lg-ps-10px lg-pe-10px pt-10px pb-10px">
                <a class="linkedin text-dark-gray" href="https://www.linkedin.com/" target="_blank">
                    <i class="fa-brands fa-linkedin-in fs-18 me-10px"></i>
                    <span class="fw-500">Linkedin</span>
                </a>
            </div>
            <div class="col ps-25px pe-25px xl-ps-15px xl-pe-15px lg-ps-10px lg-pe-10px pt-10px pb-10px">
                <a class="behance text-dark-gray" href="http://www.behance.com/" target="_blank">
                    <i class="fa-brands fa-behance fs-18 me-10px"></i>
                    <span class="fw-500 fs-16">Behance</span>
                </a>
            </div>
        </div>
    </div>
</aside>
<!-- end sidebar -->