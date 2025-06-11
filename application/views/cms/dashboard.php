<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('/global/cms/meta.php'); ?>
    <title>Knowledge Base | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <?php $this->load->view('/global/cms/styles.php'); ?>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <!-- COMPONENTS: List Group & User Profile -->
    <link href="/assets/cms-assets/src/assets/css/light/components/list-group.css" rel="stylesheet" type="text/css">
    <link href="/assets/cms-assets/src/assets/css/light/users/user-profile.css" rel="stylesheet" type="text/css">
    <link href="/assets/cms-assets/src/assets/css/dark/components/list-group.css" rel="stylesheet" type="text/css">
    <link href="/assets/cms-assets/src/assets/css/dark/users/user-profile.css" rel="stylesheet" type="text/css">
    <!-- DATATABLES & APPS: -->
    <link rel="stylesheet" href="/assets/cms-assets/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" href="/assets/cms-assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" href="/assets/cms-assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <!-- Invoice List App (Light & Dark) -->
    <link href="/assets/cms-assets/src/assets/css/light/apps/invoice-list.css" rel="stylesheet" type="text/css">
    <link href="/assets/cms-assets/src/assets/css/dark/apps/invoice-list.css" rel="stylesheet" type="text/css">
    <!-- SWEETALERT2 -->
    <link rel="stylesheet" href="/assets/cms-assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
    <link href="/assets/cms-assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css">
    <link href="/assets/cms-assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css">
    <!-- SCROLLSPYNAV -->
    <link href="/assets/cms-assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css">
    <link href="/assets/cms-assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css">
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
                <div class="middle-content container-xxl p-0">
                    <?php $this->load->view('/global/cms/breadcrumbs.php'); ?>
                    <div class="fq-header-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 align-self-center order-md-0 order-1">
                                    <div class="faq-header-content">
                                        <p class="mt-4 mb-0"><?php if ($this->session->flashdata('error_msg')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo $this->session->flashdata('error_msg'); ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php elseif ($this->session->flashdata('success_msg')): ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <?php echo $this->session->flashdata('success_msg'); ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>
                                    </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row layout-spacing ">
                        <!-- Content -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
                            <div class="user-profile">
                                <div class="widget-content widget-content-area">
                                    <div class="d-flex justify-content-between">
                                        <h3 class=""><?php echo $this->data['user_name']; ?></h3>
                                        <a href="#" class="mt-2 edit-profile " data-bs-toggle="modal" data-bs-target="#inputFormModal"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                                <path d="M12 20h9"></path>
                                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                            </svg></a>
                                        <!-- Modal -->
                                        <div class="modal fade zoomInUp inputForm-modal" id="inputFormModal" tabindex="-1" role="dialog" aria-labelledby="inputFormModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header" id="inputFormModalLabel">
                                                        <h5 class="modal-title">Edit User Profile Details</b></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            id="profileForm"
                                                            method="post"
                                                            action="<?= site_url('user/update') ?>"
                                                            class="mt-0">
                                                            <!-- Alert container -->
                                                            <div id="profileAlert"></div>
                                                            <!-- FIRST NAME -->
                                                            <div class="form-group">
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text d-flex align-items-center gap-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                            <circle cx="12" cy="7" r="4" />
                                                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                                        </svg>
                                                                        <span>First</span>
                                                                    </span>
                                                                    <input type="text" name="first_name" class="form-control" placeholder="First Name" aria-label="first_name"
                                                                        value="<?= set_value('first_name', $this->session->userdata('first_name')) ?>">
                                                                </div>
                                                            </div>
                                                            <!-- LAST NAME -->
                                                            <div class="form-group">
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text d-flex align-items-center gap-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-id" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                            <rect x="3" y="4" width="18" height="16" rx="2" />
                                                                            <circle cx="9" cy="10" r="2" />
                                                                            <line x1="15" y1="8" x2="17" y2="8" />
                                                                            <line x1="15" y1="12" x2="17" y2="12" />
                                                                            <line x1="7" y1="16" x2="17" y2="16" />
                                                                        </svg>
                                                                        <span>Last</span>
                                                                    </span>
                                                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" aria-label="last_name"
                                                                        value="<?= set_value('last_name', $this->session->userdata('last_name')) ?>">
                                                                </div>
                                                            </div>
                                                            <!-- USERNAME -->
                                                            <div class="form-group">
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text d-flex align-items-center gap-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-at" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                            <circle cx="12" cy="12" r="4" />
                                                                            <path d="M16 12a4 4 0 1 1 -4 4" />
                                                                            <path d="M16 8v-2a2 2 0 0 0 -2 -2h-1" />
                                                                        </svg>
                                                                        <span>Username</span>
                                                                    </span>
                                                                    <input type="text" name="user_name" class="form-control" placeholder="Username" aria-label="user_name"
                                                                        value="<?= set_value('user_name', $this->session->userdata('user_name')) ?>">
                                                                </div>
                                                            </div>
                                                            <!-- EMAIL -->
                                                            <div class="form-group">
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text d-flex align-items-center gap-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                            <rect x="3" y="5" width="18" height="14" rx="2" />
                                                                            <polyline points="3 7 12 13 21 7" />
                                                                        </svg>
                                                                        <span>Email</span>
                                                                    </span>
                                                                    <input type="email" name="user_email" class="form-control" placeholder="Email" aria-label="email"
                                                                        value="<?= set_value('user_email', $this->session->userdata('user_email')) ?>">
                                                                </div>
                                                            </div>
                                                            <!-- AGE -->
                                                            <div class="form-group">
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text d-flex align-items-center gap-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                                                            <line x1="16" y1="2" x2="16" y2="6" />
                                                                            <line x1="8" y1="2" x2="8" y2="6" />
                                                                            <line x1="3" y1="10" x2="21" y2="10" />
                                                                        </svg>
                                                                        <span>Age</span>
                                                                    </span>
                                                                    <input type="number" name="user_age" class="form-control" placeholder="Age" aria-label="user_age" min="0"
                                                                        value="<?= set_value('user_age', $this->session->userdata('user_age')) ?>">
                                                                </div>
                                                            </div>
                                                            <!-- LEVEL -->
                                                            <div class="form-group">
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text d-flex align-items-center gap-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layers" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 2 7 12 12 22 7 12 2" />
                                                                            <polyline points="2 17 12 22 22 17" />
                                                                            <polyline points="2 12 12 17 22 12" />
                                                                        </svg>
                                                                        <span>Level</span>
                                                                    </span>
                                                                    <select name="level" class="form-control" <?= $this->session->userdata('level') != 1 ? 'disabled' : '' ?>>
                                                                        <option value="1" <?= set_select('level', '1', $this->session->userdata('level') == 1) ?>>Admin</option>
                                                                        <option value="2" <?= set_select('level', '2', $this->session->userdata('level') == 2) ?>>User</option>
                                                                        <option value="3" <?= set_select('level', '3', $this->session->userdata('level') == 3) ?>>Limited</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <?php if ($this->session->userdata('level') != 1): ?>
                                                                <input type="hidden" name="level" value="<?= $this->session->userdata('level') ?>">
                                                            <?php endif; ?>
                                                            <!-- PASSWORD -->
                                                            <div class="form-group">
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text d-flex align-items-center gap-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                            <rect x="5" y="11" width="14" height="10" rx="2" />
                                                                            <circle cx="12" cy="16" r="1" />
                                                                            <path d="M8 11v-4a4 4 0 0 1 8 0v4" />
                                                                        </svg>
                                                                        <span>Password</span>
                                                                    </span>
                                                                    <input type="password" name="user_password" class="form-control"
                                                                        placeholder="New Password (leave blank to keep current)" aria-label="password">
                                                                </div>
                                                            </div>
                                                            <!-- ACTIONS -->
                                                            <div class="d-flex justify-content-between">
                                                                <button type="button" class="btn btn-light-danger mt-2 mb-2 btn-no-effect w-45" data-bs-dismiss="modal">
                                                                    Cancel
                                                                </button>
                                                                <button type="submit" class="btn btn-secondary mt-2 mb-2 w-45">
                                                                    Update
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center user-info">
                                        <img src="/assets/cms-assets/src/assets/img/profile-30.png" alt="avatar">
                                        <p class="">
                                        <p>Welcome, <?php echo $this->data['first_name'] . " " . $this->data['last_name']; ?></p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area">
                                    <?php $this->load->view('/global/cms/user-table.php'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  BEGIN FOOTER  -->
            <?php $this->load->view('/global/cms/footer.php'); ?>
            <!--  END FOOTER  -->
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <!-- jQuery first (if not already globally included elsewhere) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- DataTables Core -->
    <script src="/assets/cms-assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="/assets/cms-assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <!-- Syntax Highlighter (if needed) -->
    <script src="/assets/cms-assets/src/plugins/src/highlight/highlight.pack.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/cms-assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/assets/cms-assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <!-- ScrollspyNav -->
    <script src="/assets/cms-assets/src/assets/js/scrollspyNav.js"></script>
    <!-- App-Specific Logic -->
    <script src="/assets/cms-assets/src/assets/js/apps/invoice-list.js"></script>
    <!-- Global CMS Scripts (provided by your backend) -->
    <?php $this->load->view('/global/cms/scripts.php'); ?>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

</html>