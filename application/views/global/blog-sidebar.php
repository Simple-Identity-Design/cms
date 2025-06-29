<!-- start sidebar -->
<aside class="col-12 col-xl-4 col-lg-4 col-md-7 ps-55px xl-ps-50px lg-ps-15px sidebar">
    <div class="mb-15 md-mb-50px xs-mb-35px">
        <div class="fw-600 fs-19 lh-22 ls-minus-05px text-dark-gray border-bottom border-color-dark-gray border-2 d-block mb-30px pb-15px position-relative">Recent Posts</div>
        <ul class="popular-post-sidebar position-relative">
            <?php
            // Get current slug from URL (adjust segment number as needed)
            $current_slug = $this->uri->segment(2); // Change to 3 if needed
            $shown = 0;
            $max_shown = 4;
            foreach ($latest_blogs as $post) {
                // Skip if this is the current blog
                if ($post['slug'] === $current_slug) continue;
                if ($shown >= $max_shown) break;
                $shown++;
                $slug = $post['slug'];
                $basePath = FCPATH . 'assets/site-assets/images/uploads/';
                $baseUrl  = base_url('assets/site-assets/images/uploads/');
                $extensions = ['webp', 'jpg', 'jpeg', 'png', 'gif'];
                $blogImagePath = null;
                foreach ($extensions as $ext) {
                    $filePath = $basePath . $slug . '-featured-image.' . $ext;
                    if (file_exists($filePath)) {
                        $blogImagePath = $baseUrl . $slug . '-featured-image.' . $ext;
                        break;
                    }
                }
                if ($blogImagePath): ?>
                    <li class="d-flex align-items-center mb-3">
                        <figure class="mb-0 me-3" style="width:64px; height:64px; flex-shrink:0; overflow:hidden;">
                            <a href="/blog/<?= $slug ?>">
                                <img
                                    src="<?= $blogImagePath ?>"
                                    alt="<?= htmlspecialchars($post['title']) ?>"
                                    style="width:100%; height:100%; object-fit:cover; border-radius:6px;">
                            </a>
                        </figure>
                        <div class="col media-body ps-0">
                            <a href="/blog/<?= $slug ?>" class="fw-600 fs-17 text-dark-gray d-inline-block mb-10px">
                                <?= htmlspecialchars($post['title']) ?>
                            </a>
                            <div>
                                <span class="d-inline-block fs-15">
                                    <?= date('F j, Y', strtotime($post['created_at'])) ?>
                                </span>
                            </div>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="d-flex align-items-center mb-3">
                        <div class="col media-body ps-0">
                            <a href="/blog/<?= $slug ?>" class="fw-600 fs-17 text-dark-gray d-inline-block mb-10px">
                                <?= htmlspecialchars($post['title']) ?>
                            </a>
                            <div>
                                <span class="d-inline-block fs-15">
                                    <?= date('F j, Y', strtotime($post['created_at'])) ?>
                                </span>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>
            <?php } ?>
        </ul>
    </div>
    <!-- <div class="mb-15 md-mb-50px xs-mb-35px elements-social social-icon-style-10">
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
    </div> -->
    <div class="mb-15 md-mb-50px xs-mb-35px elements-social social-icon-style-10">
        <div class="fw-600 fs-19 lh-22 ls-minus-05px text-dark-gray border-bottom border-color-dark-gray border-2 d-block mb-30px pb-15px position-relative">Stay connected</div>
        <div class="row justify-content-center align-items-center g-0">
            <form action="/contact/submit" method="post" class="contact-form-style-07">
                <!-- Results placeholder -->
                <div class="col-12 mt-20px mb-0 text-center text-md-start">
                    <div class="my-custom-results d-none"></div>
                </div>
                <!-- Full Name -->
                <div class="position-relative form-group mb-20px">
                    <span class="form-icon text-medium-gray opacity-6"><i class="bi bi-emoji-smile"></i></span>
                    <input type="text" name="full_name" placeholder="Your name*"
                        class="ps-0 border-radius-0px bg-transparent border-color-extra-medium-gray form-control required">
                </div>
                <!-- Email -->
                <div class="position-relative form-group mb-20px">
                    <span class="form-icon medium-gray opacity-6"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" placeholder="Your email address*"
                        class="ps-0 border-radius-0px bg-transparent border-color-extra-medium-gray form-control required">
                </div>
                <!-- Message -->
                <div class="position-relative form-group form-textarea mb-0">
                    <textarea name="message" placeholder="Your message" rows="3"
                        class="ps-0 border-radius-0px bg-transparent border-color-extra-medium-gray form-control"></textarea>
                    <span class="form-icon medium-gray opacity-6"><i class="bi bi-chat-square-dots"></i></span>
                </div>
                <!-- Privacy & Submit -->
                <div class="row mt-35px align-items-center">
                    <div class="col-md-12 col-sm-12 text-center text-sm-end xs-mt-25px">
                        <input type="hidden" name="redirect" value="">
                        <button class="btn btn-al-orange btn-small btn-box-shadow" type="submit">Send message</button>
                    </div>
                </div>
                <!-- Optional results container -->
                <div class="form-results mt-20px d-none"></div>
            </form>
        </div>
    </div>
</aside>
<!-- end sidebar -->