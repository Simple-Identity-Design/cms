<!doctype html>
<html class="no-js" lang="en">
<head>
    <title>Crafto - The Multipurpose HTML5 Template</title>
    <meta name="description" content="Elevate your online presence with Crafto - a modern, versatile, multipurpose Bootstrap 5 responsive HTML5, SCSS template using highly creative 52+ ready demos.">
    <?php $this->load->view('/global/meta.php'); ?>
    <?php $this->load->view('/global/main-styles.php'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.dataTables.css">
</head>
<body data-mobile-nav-style="classic">
    <?php $this->load->view('/global/menu.php'); ?>
    <!-- start section  -->
    <section class="top-space-margin pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center text-md-start" data-anime='{"opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="fs-140 xxl-fs-100 sm-fs-60 fw-600 text-dark-gray alt-font ls-minus-8px sm-ls-minus-2px" data-bottom-top="transform: translate3d(-50px, 0px, 0px);" data-top-bottom="transform: translate3d(50px, 0px, 0px);">The Best</div>
                </div>
                <div class="col-12">
                    <div class="row align-items-center align-items-lg-end" data-bottom-top="transform: translate3d(-30px, 0px, 0px);" data-top-bottom="transform: translate3d(30px, 0px, 0px);">
                        <div class="col-lg-2 col-md-4 text-md-end text-center md-mt-30px md-mb-20px" data-anime='{"opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                            <div class="position-relative">
                                <img src="/assets/site-assets/images/demo-branding-agency-about-01.png" class="animation-rotation position-relative z-index-2" alt="">
                                <div class="absolute-middle-center w-100 z-index-1"><img src="/assets/site-assets/images/demo-branding-agency-about-02.png" alt=""></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 text-center text-md-start" data-anime='{"opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                            <div class="fs-140 xxl-fs-100 sm-fs-60 fw-600 text-dark-gray alt-font ls-minus-8px sm-ls-minus-2px">Fruit</div>
                        </div>
                        <div class="col-lg-4 last-paragraph-no-margin md-mt-30px" data-anime='{"opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                            <p class="w-95 md-w-80 mx-auto text-center text-lg-start lg-w-100">Discover our selection of seasonal, fresh fruits grown right here on the farm.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <section class="background-position-right-bottom background-no-repeat sm-background-image-none" style="background-image: url('images/demo-conference-about-bg.png')">
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-12 col-lg-6 text-center">
                    <span class="ps-25px pe-25px mb-15px text-uppercase text-base-color fs-12 lh-40 fw-700 border-radius-100px bg-solitude-blue d-inline-flex"><i class="bi bi-box-seam fs-16 me-5px"></i>Everything</span>
                    <h2 class="alt-font text-dark-gray fw-800">Home Grown Fruit</h2>
                </div>
            </div>
            <div class="row align-items-center">
                <!-- Table HTML -->
                <table id="example" class="display table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($blogs as &$blog) : ?>
                            <tr>
                                <td>
                                    <a href='/blog/<?php echo $blog['slug']; ?>'>
                                        <?php echo $blog['blog_title']; ?>
                                    </a>
                                    <br>
                                    <?php
                                    $date = new DateTime($blog['created_at']);
                                    echo $date->format('Y-m-d g:i a');
                                    ?>
                                </td>
                                <td><?php echo $blog['author']; ?></td>
                                <td>
                                    <div class="dropdown">
                                        <i class="fa-regular fa-square-caret-down" id="dropdownMenuButton<?php echo $blog['slug']; ?>" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo $blog['slug']; ?>">
                                            <li>
                                                <a class="dropdown-item" href='/blog/<?php echo $blog['slug']; ?>'>
                                                    <i class="fa-solid fa-book-open"></i> Visit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="javascript:void(0);" onclick="copyToClipboard('<?php echo "https://" . $_SERVER['HTTP_HOST'] . '/blog/' . $blog['slug']; ?>'); showAlert()">
                                                    <i class="fa-solid fa-link"></i> Share
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Options</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
    <!-- end section -->
    <?php $this->load->view('/global/why.php'); ?>
    <?php $this->load->view('/global/footer.php'); ?>
    <!-- javascript libraries -->
    <?php $this->load->view('/global/footer.php'); ?>
    <?php $this->load->view('/global/main-scripts.php'); ?>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.dataTables.js"></script>
    <!-- Slider's main "init" script -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                order: [
                    [2, 'desc']
                ]
            });
        });
        //get year
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>
</html>