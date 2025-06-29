<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('/global/cms/meta.php'); ?>
    <title> | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <?php $this->load->view('/global/cms/styles.php'); ?>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="/assets/cms-assets/src/plugins/src/autocomplete/css/autoComplete.02.css" rel="stylesheet" type="text/css" />
    <link href="/assets/cms-assets/src/plugins/css/light/autocomplete/css/custom-autoComplete.css" rel="stylesheet" type="text/css" />
    <link href="/assets/cms-assets/src/plugins/css/dark/autocomplete/css/custom-autoComplete.css" rel="stylesheet" type="text/css" />
    <link href="/assets/cms-assets/src/assets/css/light/pages/knowledge_base.css" rel="stylesheet" type="text/css" />
    <link href="/assets/cms-assets/src/assets/css/dark/pages/knowledge_base.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
</head>

<body class=" layout-boxed">
    <?php $this->load->view('/global/cms/loader.php'); ?>
    <?php $this->load->view('/global/cms/menu.php'); ?>
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">
        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>
        <?php $this->load->view('/global/cms/sidebar.php'); ?>
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="fq-header-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 align-self-center order-md-0 order-1">
                                <div class="faq-header-content">
                                    <h1 class="mb-4">CMS</h1>
                                    <?php if ($this->session->flashdata('error_msg')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo $this->session->flashdata('error_msg'); ?>
                                        </div>
                                    <?php elseif ($this->session->flashdata('success_msg')): ?>
                                        <div class="alert alert-success">
                                            <?php echo $this->session->flashdata('success_msg'); ?>
                                        </div>
                                        <?php echo isset($logout_alert) ? $logout_alert : ''; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="faq container">
                    <div class="faq-layouting layout-spacing">
                        <div class="kb-widget-section">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-6 mb-3">
                                    <a href="/dashboard" class="text-decoration-none text-dark">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <div class="card-icon mb-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay">
                                                        <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                                                        <polygon points="12 15 17 21 7 21 12 15"></polygon>
                                                    </svg>
                                                </div>
                                                <h5 class="card-title mb-0">CMS</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <a href="#" class="text-decoration-none text-dark">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <div class="card-icon mb-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                        <circle cx="12" cy="7" r="4"></circle>
                                                    </svg>
                                                </div>
                                                <h5 class="card-title mb-0">Website</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('/global/cms/footer.php'); ?>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    <?php $this->load->view('/global/cms/scripts.php'); ?>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="/assets/cms-assets/src/plugins/src/autocomplete/autoComplete.min.js"></script>
    <script src="/assets/cms-assets/src/assets/js/pages/knowledge-base.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

</html>