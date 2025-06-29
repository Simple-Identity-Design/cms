<!doctype html>
<html class="no-js" lang="en">
<head>
    <title><?= htmlspecialchars(ucwords($page['title']) . " | Simple Identity Design") ?></title>
    <meta name="description" content="<?= htmlspecialchars(ucfirst($page['meta_description'])) ?>">
    <?php $this->load->view('/global/meta.php'); ?>
    <?php $this->load->view('/global/main-styles.php'); ?>
    <style>
    </style>
</head>
<body data-mobile-nav-style="classic">
    <?php $this->load->view('/global/menu.php'); ?>
    <!-- start page title -->
    <section class="page-title-separate-breadcrumbs bg-al-blue ipad-top-space-margin cover-background">
        <div class="opacity-full-dark bg-gradient-dark-transparent"></div>
        <div class="container position-relative">
            <div class="row flex-column flex-lg-row justify-content-center align-items-lg-end h-200px">
                <!-- LEFT COLUMN: Title -->
                <div class="col-xxl-7 col-md-7 position-relative page-title-large md-mb-30px sm-mb-20px">
                    <h1 class="text-white alt-font fw-500 ls-minus-1px mb-0 font-style-italic"
                        data-fancy-text='{ "opacity": [0, 1], "delay": 500, "speed": 50, "string": ["<?= htmlspecialchars($page['h1']) ?>"], "easing": "easeOutQuad" }'>
                    </h1>
                </div>
                <!-- RIGHT COLUMN: Meta -->
                <div class="col-xxl-5 col-lg-5 col-md-7 col-sm-9 last-paragraph-no-margin text-start text-xxl-end" data-anime='{ "opacity": [0, 1], "delay": 500, "easing": "easeOutQuad" }'>
                    <p class="text-white opacity-8 mb-2"><?= htmlspecialchars(ucfirst($page['meta_description'])) ?></p>
                    <div class="d-flex justify-content-xxl-end align-items-center gap-4 text-white small opacity-7 flex-wrap flex-md-nowrap">
                        <div class="d-flex align-items-center gap-1">
                            <i class="bi bi-person"></i>
                            <span><?= isset($page['author']) ? htmlspecialchars($page['author']) : 'Unknown Author' ?></span>
                        </div>
                        <div class="d-flex align-items-center gap-1">
                            <i class="bi bi-calendar"></i>
                            <span><?= date('F j, Y', strtotime($page['updated_at'])) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    <!-- start section -->
    <?php $this->load->view('/global/breadcrumbs.php'); ?>
    <!-- start section -->
    <section class="top-space-margin right-side-bar mt-0 p-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 blog-standard md-mb-50px sm-mb-40px">
                    <?php
                    $slug = $page['slug'];
                    $basePath = FCPATH . 'assets/site-assets/images/uploads/';
                    $baseUrl  = base_url('assets/site-assets/images/uploads/');
                    $extensions = ['webp', 'jpg', 'jpeg', 'png', 'gif'];
                    $featuredImagePath = null;
                    foreach ($extensions as $ext) {
                        $filePath = $basePath . $slug . '-featured-image.' . $ext;
                        if (file_exists($filePath)) {
                            $featuredImagePath = $baseUrl . $slug . '-featured-image.' . $ext;
                            break;
                        }
                    }
                    ?>
                    <?php if ($featuredImagePath): ?>
                        <div class="float-start me-4 mb-4" style="max-width: 400px;">
                            <img src="<?= $featuredImagePath ?>"
                                alt="<?= htmlspecialchars($page['title'] ?? '') ?>"
                                class="img-fluid border-radius-6px"
                                style="max-height: 300px; object-fit: cover; width: 100%;">
                        </div>
                    <?php endif; ?>
                    <!-- start blog details  -->
                    <div class="col-12 blog-details mb-12">
                        <?= $page['body']; ?>
                    </div>
                    <!-- end blog details -->
                </div>
                <?php $this->load->view('/global/blog-sidebar.php'); ?>
            </div>
        </div>
    </section>
    <!-- end section -->
    <?php $this->load->view('/global/footer.php'); ?>
    </div>
    <?php $this->load->view('/global/scroller.php'); ?>
    <?php $this->load->view('/global/main-scripts.php'); ?>
    <?php $this->load->view('/global/contact-script.php'); ?>
</body>
</html>