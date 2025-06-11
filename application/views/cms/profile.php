<head>
    <?php $this->load->view('/global/cms/meta.php'); ?>
    <title>Knowledge Base | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <?php $this->load->view('/global/cms/styles.php'); ?>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="/assets/cms-assets/src/assets/css/light/components/list-group.css" rel="stylesheet" type="text/css">
    <link href="/assets/cms-assets/src/assets/css/light/users/user-profile.css" rel="stylesheet" type="text/css" />
    <link href="/assets/cms-assets/src/assets/css/dark/components/list-group.css" rel="stylesheet" type="text/css">
    <link href="/assets/cms-assets/src/assets/css/dark/users/user-profile.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
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
                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->
                    <div class="row layout-spacing ">
                        <!-- Content -->
                        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
                            <div class="user-profile">
                                <div class="widget-content widget-content-area">
                                    <div class="d-flex justify-content-between">
                                        <h3 class=""><?= htmlspecialchars($this->data['user_name']) ?></h3>
                                        <a href="#" class="mt-2 edit-profile" data-bs-toggle="modal" data-bs-target="#inputFormModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                                <path d="M12 20h9"></path>
                                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                            </svg>
                                        </a>
                                    </div>
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
                                    <div class="text-center user-info">
                                        <img src="/assets/cms-assets/src/assets/img/profile-30.png" alt="avatar">
                                        <p>Welcome, <?= htmlspecialchars($this->data['first_name'] . ' ' . $this->data['last_name']) ?></p>
                                    </div>
                                    <div class="user-info-list">
                                        <ul class="contacts-block list-unstyled">
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-shield">
                                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                                </svg>
                                                <?= htmlspecialchars($this->data['user_name']) ?>
                                            </li>
                                            <li class="contacts-block__item">
                                                <a href="mailto:<?= htmlspecialchars($this->data['user_email']) ?>">
                                                    <svg class="feather me-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <rect x="3" y="5" width="18" height="14" rx="2" />
                                                        <polyline points="3 7 12 13 21 7" />
                                                    </svg>
                                                    <?= htmlspecialchars($this->data['user_email']) ?>
                                                </a>
                                            </li>
                                            <li class="contacts-block__item">
                                                <a href="tel:<?= htmlspecialchars($this->data['user_phone']) ?>">
                                                    <svg class="feather me-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2
                     19.79 19.79 0 0 1-8.63-3.07
                     19.5 19.5 0 0 1-6-6
                     19.79 19.79 0 0 1-3.07-8.67
                     A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72
                     12.84 12.84 0 0 0 .7 2.81
                     2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27
                     a2 2 0 0 1 2.11-.45
                     12.84 12.84 0 0 0 2.81.7
                     A2 2 0 0 1 22 16.92z" />
                                                    </svg>
                                                    <?= htmlspecialchars($this->data['user_phone']) ?>
                                                </a>
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg class="feather me-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                                    <line x1="16" y1="2" x2="16" y2="6" />
                                                    <line x1="8" y1="2" x2="8" y2="6" />
                                                    <line x1="3" y1="10" x2="21" y2="10" />
                                                </svg>
                                                </a>
                                                Age: <?= htmlspecialchars($this->data['user_age']) ?>
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-clock">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <polyline points="12 6 12 12 16 14" />
                                                </svg>
                                                Joined: <?= date('M d, Y', strtotime($this->data['created_at'])) ?>
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-clock">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <polyline points="12 6 12 12 16 14" />
                                                </svg>
                                                Last Update: <?= date('M d, Y', strtotime($this->data['modified_at'])) ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
                            <div class="usr-tasks ">
                                <div class="widget-content widget-content-area">
                                    <h3 class="">Task</h3>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Projects</th>
                                                    <th>Progress</th>
                                                    <th>Task Done</th>
                                                    <th class="text-center">Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Figma Design</td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-danger" role="progressbar" style="width: 29.56%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-danger">29.56%</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p>2 mins ago</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Vue Migration</td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-info" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-success">50%</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p>4 hrs ago</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Flutter App</td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-warning" role="progressbar" style="width: 39%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-danger">39%</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p>a min ago</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>API Integration</td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-success" role="progressbar" style="width: 78.03%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-success">78.03%</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p>2 weeks ago</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Blog Update</td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-secondary" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-success">100%</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p>18 hrs ago</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Landing Page</td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-danger" role="progressbar" style="width: 19.15%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-danger">19.15%</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p>5 days ago</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Shopify Dev</td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-info" role="progressbar" style="width: 60.55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-success">60.55%</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p>8 days ago</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                            <div class="summary layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <h3 class="">Summary</h3>
                                    <div class="order-summary">
                                        <div class="summary-list summary-income">
                                            <div class="summery-info">
                                                <div class="w-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag">
                                                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                    </svg>
                                                </div>
                                                <div class="w-summary-details">
                                                    <div class="w-summary-info">
                                                        <h6>Income <span class="summary-count">$92,600 </span></h6>
                                                        <p class="summary-average">90%</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="summary-list summary-profit">
                                            <div class="summery-info">
                                                <div class="w-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                                        <line x1="12" y1="1" x2="12" y2="23"></line>
                                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                                    </svg>
                                                </div>
                                                <div class="w-summary-details">
                                                    <div class="w-summary-info">
                                                        <h6>Profit <span class="summary-count">$37,515</span></h6>
                                                        <p class="summary-average">65%</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="summary-list summary-expenses">
                                            <div class="summery-info">
                                                <div class="w-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                        <line x1="1" y1="10" x2="23" y2="10"></line>
                                                    </svg>
                                                </div>
                                                <div class="w-summary-details">
                                                    <div class="w-summary-info">
                                                        <h6>Expenses <span class="summary-count">$55,085</span></h6>
                                                        <p class="summary-average">42%</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                            <div class="pro-plan layout-spacing">
                                <div class="widget">
                                    <div class="widget-heading">
                                        <div class="task-info">
                                            <div class="w-title">
                                                <h5>Pro Plan</h5>
                                                <span>$25/month</span>
                                            </div>
                                        </div>
                                        <div class="task-action">
                                            <button class="btn btn-secondary">Renew Now</button>
                                        </div>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="p-2 ps-3 mb-4">
                                            <li class="mb-1"><strong>10,000 Monthly Visitors</strong></li>
                                            <li class="mb-1"><strong>Unlimited Reports</strong></li>
                                            <li class=""><strong>2 Years Data Storage</strong></li>
                                        </ul>
                                        <div class="progress-data">
                                            <div class="progress-info">
                                                <div class="due-time">
                                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <polyline points="12 6 12 12 16 14"></polyline>
                                                        </svg> 5 Days Left</p>
                                                </div>
                                                <div class="progress-stats">
                                                    <p class="text-info">$25 / month</p>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                            <div class="payment-history layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <h3 class="">Payment History</h3>
                                    <div class="list-group">
                                        <div class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="me-auto">
                                                <div class="fw-bold title">March</div>
                                                <p class="sub-title mb-0">Pro Membership</p>
                                            </div>
                                            <span class="pay-pricing align-self-center me-3">$45</span>
                                            <div class="btn-group dropend align-self-center" role="group">
                                                <a id="paymentHistory1" href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="paymentHistory1">
                                                    <a class="dropdown-item" href="javascript:void(0);">View Invoice</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Download Invoice</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="me-auto">
                                                <div class="fw-bold title">February</div>
                                                <p class="sub-title mb-0">Pro Membership</p>
                                            </div>
                                            <span class="pay-pricing align-self-center me-3">$45</span>
                                            <div class="btn-group dropend align-self-center" role="group">
                                                <a id="paymentHistory2" href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="paymentHistory2">
                                                    <a class="dropdown-item" href="javascript:void(0);">View Invoice</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Download Invoice</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="me-auto">
                                                <div class="fw-bold title">January</div>
                                                <p class="sub-title mb-0">Pro Membership</p>
                                            </div>
                                            <span class="pay-pricing align-self-center me-3">$45</span>
                                            <div class="btn-group dropend align-self-center" role="group">
                                                <a id="paymentHistory3" href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="paymentHistory3">
                                                    <a class="dropdown-item" href="javascript:void(0);">View Invoice</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Download Invoice</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                            <div class="payment-methods layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <h3 class="">Payment Methods</h3>
                                    <div class="list-group">
                                        <div class="list-group-item d-flex justify-content-between align-items-start">
                                            <img src="../src/assets/img/card-americanexpress.svg" class="align-self-center me-3" alt="americanexpress">
                                            <div class="me-auto">
                                                <div class="fw-bold title">American Express</div>
                                                <p class="sub-title mb-0">Expires on 12/2025</p>
                                            </div>
                                            <span class="badge badge-success align-self-center me-3">Primary</span>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-start">
                                            <img src="../src/assets/img/card-mastercard.svg" class="align-self-center me-3" alt="mastercard">
                                            <div class="me-auto">
                                                <div class="fw-bold title">Mastercard</div>
                                                <p class="sub-title mb-0">Expires on 03/2025</p>
                                            </div>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-start">
                                            <img src="../src/assets/img/card-visa.svg" class="align-self-center me-3" alt="visa">
                                            <div class="me-auto">
                                                <div class="fw-bold title">Visa</div>
                                                <p class="sub-title mb-0">Expires on 10/2025</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  BEGIN FOOTER  -->
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg></p>
                </div>
            </div>
            <!--  END FOOTER  -->
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <?php $this->load->view('/global/cms/scripts.php'); ?>
</body>
</html>