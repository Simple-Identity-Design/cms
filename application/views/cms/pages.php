<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('/global/cms/meta.php'); ?>
    <title>Knowledge Base | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <?php $this->load->view('/global/cms/styles.php'); ?>
    <!-- BEGIN PLUGINS/CUSTOM STYLES FOR BOTH THEMES -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- SweetAlert2 Custom -->
    <link href="/assets/cms-assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="/assets/cms-assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <!-- DataTables Custom (LIGHT) -->
    <link rel="stylesheet" href="/assets/cms-assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" href="/assets/cms-assets/src/plugins/css/light/table/datatable/custom_dt_custom.css">
    <link rel="stylesheet" href="/assets/cms-assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">
    <!-- DataTables Custom (DARK) -->
    <link rel="stylesheet" href="/assets/cms-assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" href="/assets/cms-assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">
    <!-- ScrollspyNav & Flatpickr (LIGHT) -->
    <link href="/assets/cms-assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/cms-assets/src/plugins/css/light/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <!-- ScrollspyNav & Flatpickr (DARK) -->
    <link href="/assets/cms-assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/assets/cms-assets/src/plugins/css/dark/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <!-- END PLUGINS/CUSTOM STYLES -->
    <script src="https://cdn.tiny.cloud/1/3at6u02txgs4tmfghlfvznxexlw9o782zs3uy6qdpniueay0/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
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
                                    <p class="mt-4 mb-0"><?php if ($this->session->flashdata('error_msg')): ?>
                                    <div class="alert alert-danger">
                                        <?php echo $this->session->flashdata('error_msg'); ?>
                                    </div>
                                <?php elseif ($this->session->flashdata('success_msg')): ?>
                                    <div class="alert alert-success">
                                        <?php echo $this->session->flashdata('success_msg'); ?>
                                    </div>
                                <?php endif; ?>
                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="seperator-header">
                    <h4 class="">Style 2</h4>
                </div> -->
                <div class="row layout-spacing">
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <table id="pages-table" class="table style-1 dt-table-hover non-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check form-check-primary d-block new-control">
                                                    <input class="form-check-input chk-parent" type="checkbox" id="form-check-parent">
                                                </div>
                                            </th>
                                            <th>Actions</th>
                                            <th>Title & Info</th>
                                            <th>User/Author</th>
                                            <th>Status</th>
                                            <th>Category</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pages as &$page) : ?>
                                            <tr>
                                                <td>
                                                    <input class="form-check-input row-check" type="checkbox" name="page_ids[]" value="<?= $page['id']; ?>">
                                                </td>
                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown" role="button" id="dropdownMenuLink<?= $page['id']; ?>"
                                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" class="feather feather-more-horizontal">
                                                                <circle cx="12" cy="12" r="1"></circle>
                                                                <circle cx="19" cy="12" r="1"></circle>
                                                                <circle cx="5" cy="12" r="1"></circle>
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink<?= $page['id']; ?>">
                                                            <a class="dropdown-item" href="/<?= htmlspecialchars($page['path']); ?>">View</a>
                                                            <a class="dropdown-item edit-page" href="javascript:void(0);" data-id="<?= $page['id']; ?>">Edit</a>
                                                            <!-- Inside each table row, actions column -->
                                                            <a href="javascript:void(0);"
                                                                class="dropdown-item toggle-status"
                                                                data-id="<?= $page['id']; ?>"
                                                                data-status="<?= $page['status'] === 'published' ? 'draft' : 'published'; ?>">
                                                                <?= $page['status'] === 'published' ? 'Unpublish' : 'Publish'; ?>
                                                            </a>
                                                            <a class="dropdown-item text-danger delete-page" href="javascript:void(0);" data-id="<?= $page['id']; ?>" data-title="<?= htmlspecialchars($page['title']); ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <strong>
                                                        <a href="/<?= htmlspecialchars($page['path']); ?>">
                                                            <?= htmlspecialchars($page['title']); ?>
                                                        </a>
                                                    </strong>
                                                    <div class="text-muted small">
                                                        <strong>H1:</strong> <?= htmlspecialchars($page['h1']); ?><br>
                                                        <strong>.Meta:</strong>
                                                        <?= htmlspecialchars(
                                                            trim(
                                                                mb_strimwidth(strip_tags($page['meta_description']), 0, 100, ''),
                                                                " ."
                                                            )
                                                        ) ?><br>
                                                        <?php if (!empty($page['tags'])): ?>
                                                            <?php foreach ($page['tags'] as $tag): ?>
                                                                <a href="/tag/<?= urlencode(strtolower($tag)); ?>" class="tag-link">
                                                                    <span class="badge badge-tag" data-tag="<?= htmlspecialchars($tag); ?>">
                                                                        <?= htmlspecialchars($tag); ?>
                                                                    </span>
                                                                </a>
                                                            <?php endforeach; ?>
                                                            <strong>:Tags</strong>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php if (!empty($page['user']) && !empty($page['author_slug'])): ?>
                                                        <a href="/author/<?= htmlspecialchars($page['author_slug']) ?>">
                                                            <?= htmlspecialchars($page['user']) ?>
                                                        </a>
                                                    <?php else: ?>
                                                        —
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge <?= $page['status'] === 'published' ? 'badge-success' : 'badge-warning'; ?>">
                                                        <?= ucfirst($page['status']); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <?php
                                                    $slug = strtolower(preg_replace('/\s+/', '-', $page['category_name'] ?? 'uncategorized'));
                                                    ?>
                                                    <a href="/category/<?= urlencode($slug); ?>">
                                                        <span class="badge badge-category" data-category-id="<?= $page['category_id']; ?>">
                                                            <?= htmlspecialchars($page['category_name']); ?>
                                                        </span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php
                                                    $date = new DateTime($page['created_at']);
                                                    echo $date->format('F j, Y') . '<br>' . $date->format('g:ia');
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $date = new DateTime($page['updated_at']);
                                                    echo $date->format('F j, Y') . '<br>' . $date->format('g:ia');
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th> <!-- Checkbox: blank -->
                                            <th></th> <!-- Actions: blank -->
                                            <th>Search Title & Info</th>
                                            <th>Search User/Author</th>
                                            <th>Search Status</th>
                                            <th>Search Category</th>
                                            <th>Search Created At</th>
                                            <th>Search Updated At</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <!-- Registration Modal -->
                                <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="addPageLabel" aria-hidden="true" id="addPage">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addPageLabel">Extra Large</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="pageForm" method="post">
                                                    <input type="text" name="title" id="pageTitle" placeholder="Title" class="form-control mb-3" required>
                                                    <!-- Renamed path to 'parent_path' -->
                                                    <input type="text" name="parent_path" id="pageParent" placeholder="Parent path (e.g. services/web)" class="form-control mb-3">
                                                    <!-- Optional slug -->
                                                    <input type="text" name="slug" id="pageSlug" placeholder="Page slug (e.g. web-design)" class="form-control mb-3">
                                                    <input type="text" name="h1" id="pageH1" placeholder="Main Heading (H1)" class="form-control mb-3">
                                                    <textarea name="meta_description" id="metaDescription" placeholder="Meta Description" class="form-control mb-3"></textarea>
                                                    <select name="template" id="pageTemplate" class="form-control mb-3">
                                                        <option value="default">Default</option>
                                                        <option value="landing">Landing</option>
                                                        <option value="service">Service</option>
                                                    </select>
                                                    <div class="mb-3">
                                                        <label for="categorySelect" class="form-label">Category</label>
                                                        <select name="category_id" id="categorySelect" class="form-control">
                                                            <option value="">Select Category</option>
                                                            <?php foreach ($categories as $cat): ?>
                                                                <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                                                            <?php endforeach; ?>
                                                            <option value="add_new">Add New...</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3" id="newCategoryDiv" style="display:none;">
                                                        <input type="text" id="newCategoryInput" name="new_category" class="form-control" placeholder="Enter new category" />
                                                    </div>
                                                    <select name="status" id="pageStatus" class="form-control mb-3">
                                                        <option value="draft">Draft</option>
                                                        <option value="published">Published</option>
                                                    </select>
                                                    <input type="text" name="tags" id="pageTags" placeholder="Tags (comma-separated)" class="form-control mb-3">
                                                    <textarea id="modalBodyEditor" name="body" class="form-control mb-3"></textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-light-dark" data-bs-dismiss="modal"> Discard</button>
                                                <button type="button" class="btn btn-primary" id="savePageBtn">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Page Modal -->
                                <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="editPageLabel" aria-hidden="true" id="editPage">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editPageLabel">Edit Page</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editPageForm" method="post">
                                                    <input type="hidden" name="id" id="editPageId">
                                                    <input type="text" name="title" id="editPageTitle" placeholder="Title" class="form-control mb-3" required>
                                                    <input type="text" name="parent_path" id="editPageParent" placeholder="Parent path" class="form-control mb-3">
                                                    <input type="text" name="slug" id="editPageSlug" placeholder="Page slug" class="form-control mb-3">
                                                    <input type="text" name="h1" id="editPageH1" placeholder="Main Heading (H1)" class="form-control mb-3">
                                                    <textarea name="meta_description" id="editMetaDescription" placeholder="Meta Description" class="form-control mb-3"></textarea>
                                                    <select name="template" id="editPageTemplate" class="form-control mb-3">
                                                        <option value="default">Default</option>
                                                        <option value="landing">Landing</option>
                                                        <option value="service">Service</option>
                                                    </select>
                                                    <div class="mb-3">
                                                        <label for="editCategorySelect" class="form-label">Category</label>
                                                        <select name="category_id" id="editCategorySelect" class="form-control">
                                                            <option value="">Select Category</option>
                                                            <?php foreach ($categories as $cat): ?>
                                                                <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                                                            <?php endforeach; ?>
                                                            <option value="add_new">Add New...</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3" id="editNewCategoryDiv" style="display:none;">
                                                        <input type="text" id="editNewCategoryInput" name="new_category" class="form-control" placeholder="Enter new category" />
                                                    </div>
                                                    <select name="status" id="editPageStatus" class="form-control mb-3">
                                                        <option value="draft">Draft</option>
                                                        <option value="published">Published</option>
                                                    </select>
                                                    <input type="text" name="tags" id="editPageTags" placeholder="Tags (comma-separated)" class="form-control mb-3">
                                                    <textarea id="editModalBodyEditor" name="body" class="form-control mb-3"></textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-light-dark" data-bs-dismiss="modal">Discard</button>
                                                <button type="button" class="btn btn-primary" id="updatePageBtn">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
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
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="/assets/cms-assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        $(document).ready(function() {
            // 1. Add search inputs to tfoot (except for checkboxes & actions)
            $('#pages-table tfoot th').each(function(i) {
                // Only add search boxes to searchable columns (not checkbox or actions)
                if ([0, 1].includes(i)) {
                    $(this).html('');
                } else {
                    var title = $('#pages-table thead th').eq(i).text().replace('Search ', '').trim();
                    $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
                }
            });
            // 2. Initialize DataTable
            var table = $('#pages-table').DataTable({
                dom: "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f<'dt-action-buttons align-self-center'B>>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count mb-sm-0 mb-3'i><'dt--pagination'p>>",
                buttons: [{
                        text: "Add New",
                        className: "btn btn-primary mb-2 me-2",
                        action: function() {
                            $('#addPage').modal('show');
                        }
                    },
                    {
                        text: "Delete Selected",
                        className: "btn btn-danger mb-2",
                        attr: {
                            id: "bulkDeleteBtn"
                        },
                        action: function() {
                            $('#bulkDeleteBtn').trigger('click');
                        }
                    }
                ],
                columnDefs: [{
                        targets: 0,
                        orderable: false
                    },
                    {
                        targets: 7,
                        orderable: false
                    }
                ],
                oLanguage: {
                    oPaginate: {
                        sPrevious: '<svg ...>...</svg>',
                        sNext: '<svg ...>...</svg>'
                    },
                    sInfo: "Showing page _PAGE_ of _PAGES_",
                    sSearch: '<svg ...>...</svg>',
                    sSearchPlaceholder: "...Search",
                    sLengthMenu: "Results: _MENU_"
                },
                lengthMenu: [5, 10, 20, 50],
                pageLength: 10
            });
            // 3. Individual column search
            table.columns().every(function() {
                var that = this;
                $('input', this.footer()).on('keyup change', function() {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });
            // 4. Select/Deselect All
            $('#form-check-default, #form-check-parent, #check-all').on('change', function() {
                var checked = $(this).is(':checked');
                $('.child-chk, .row-check').prop('checked', checked);
            });
            $(document).on('change', '.row-check', function() {
                var allChecked = $('.row-check').length === $('.row-check:checked').length;
                $('#form-check-default').prop('checked', allChecked);
            });
            // 5. Delete logic
            $(document).on("click", ".delete-page", function() {
                const pageId = $(this).data("id");
                const title = $(this).data("title");
                Swal.fire({
                    title: "Are you sure?",
                    text: `Do you want to delete "${title}"?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#e7515a",
                    cancelButtonColor: "#888ea8",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/pages/delete",
                            method: "POST",
                            data: {
                                page_ids: [pageId]
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.status === "success") {
                                    Swal.fire("Deleted!", response.message, "success");
                                    location.reload();
                                } else {
                                    Swal.fire("Error", response.message, "error");
                                }
                            },
                            error: function() {
                                Swal.fire("Error", "Something went wrong.", "error");
                            }
                        });
                    }
                });
            });
            // 6. TinyMCE modal logic (auto-init and persist content if needed)
            $('#addPage').on('shown.bs.modal', function() {
                // Destroy previous editor if it exists (avoid duplication)
                if (tinymce.get('modalBodyEditor')) {
                    tinymce.get('modalBodyEditor').remove();
                }
                tinymce.init({
                    selector: '#modalBodyEditor', // Set this ID on your <textarea>
                    height: 400,
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | bold italic backcolor | \
                    alignleft aligncenter alignright alignjustify | \
                    bullist numlist outdent indent | removeformat | help '
                });
            });
            $('#addPage').on('hidden.bs.modal', function() {
                if (tinymce.get('modalBodyEditor')) {
                    tinymce.get('modalBodyEditor').remove();
                }
            });
            $(document).on("click", "#bulkDeleteBtn", function() {
                const selected = $(".row-check:checked");
                if (selected.length === 0) {
                    Swal.fire({
                        icon: "warning",
                        title: "No pages selected",
                        text: "Please select at least one page to delete.",
                        confirmButtonText: "OK"
                    });
                    return;
                }
                const pageIds = [];
                selected.each(function() {
                    pageIds.push($(this).val());
                });
                Swal.fire({
                    title: "Are you sure?",
                    text: `You are about to delete ${pageIds.length} page(s).`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#e7515a",
                    cancelButtonColor: "#888ea8",
                    confirmButtonText: "Yes, delete",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/pages/delete",
                            method: "POST",
                            data: {
                                page_ids: pageIds
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.status === "success") {
                                    Swal.fire("Deleted!", response.message, "success");
                                    location.reload();
                                } else {
                                    Swal.fire("Error", response.message, "error");
                                }
                            },
                            error: function() {
                                Swal.fire("Error", "Something went wrong.", "error");
                            }
                        });
                    }
                });
            });
            $(document).on('click', '#savePageBtn', function(e) {
                e.preventDefault();
                // 1. Ensure TinyMCE content is synced
                if (tinymce.get('modalBodyEditor')) {
                    tinymce.get('modalBodyEditor').save(); // copies content to textarea
                }
                // 2. Gather form data
                var formData = $('#pageForm').serialize();
                // 3. Submit via AJAX (update URL to match your endpoint)
                $.ajax({
                    url: '/pages/save',
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire('Success', response.message, 'success');
                            $('#addPage').modal('hide');
                            location.reload();
                        } else {
                            Swal.fire('Error', response.message, 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Something went wrong.', 'error');
                    }
                });
            });
        });
        const tagBadgeColors = [
            '#2196f3', '#4caf50', '#ff9800', '#9c27b0', '#f44336', '#00bcd4', '#e91e63',
            '#009688', '#ffeb3b', '#795548', '#673ab7', '#8bc34a', '#03a9f4', '#cddc39',
            '#607d8b', '#ff5722', '#607d8b', '#a1887f', '#ffd600', '#c51162', '#388e3c'
        ];
        // Simple hash function for consistency based on tag name
        function getTagColor(tag) {
            let hash = 0;
            for (let i = 0; i < tag.length; i++) {
                hash = tag.charCodeAt(i) + ((hash << 5) - hash);
            }
            return tagBadgeColors[Math.abs(hash) % tagBadgeColors.length];
        }
        document.querySelectorAll('.badge-tag').forEach(function(el) {
            const tag = el.getAttribute('data-tag') || '';
            el.style.backgroundColor = getTagColor(tag);
            el.style.color = '#fff';
        });
        const badgeColors = [
            '#007bff', // Blue
            '#28a745', // Green
            '#ffc107', // Yellow
            '#dc3545', // Red
            '#6f42c1', // Purple
            '#20c997', // Teal
            '#343a40', // Dark
            '#ff9800', // Orange
            '#e91e63', // Pink
            '#009688', // Teal
            '#ba68c8', // Light Purple
            '#795548', // Brown
            '#00bcd4', // Cyan
            '#fd7e14', // Deep Orange
            '#17a2b8', // Blue-Green
            '#8bc34a', // Light Green
            '#607d8b', // Blue Gray
            '#f44336', // Vivid Red
            '#4caf50', // Green
            '#cddc39', // Lime
            '#3f51b5', // Indigo
            '#ffeb3b', // Light Yellow
            '#9c27b0', // Violet
            '#00e676', // Emerald
            '#00acc1', // Sky Blue
            '#f06292', // Light Pink
            '#ab47bc', // Lavender
            '#ff7043', // Coral
            '#ffa000', // Gold
            '#8d6e63', // Taupe
            '#a1887f', // Sand
            '#e57373', // Salmon
            '#81d4fa', // Pale Blue
            '#b2ff59', // Neon Green
            '#d4e157', // Chartreuse
            '#c2185b', // Deep Pink
            '#7986cb', // Light Indigo
            '#aed581', // Soft Green
            '#ffb300', // Amber
            '#c62828', // Fire Red
            '#ad1457', // Dark Pink
            '#e1bee7', // Lavender Blush
            '#fbc02d', // Saffron
            '#ffccbc', // Peach
            '#d7ccc8', // Clay
            '#b2dfdb', // Aqua
            '#b388ff', // Light Violet
            '#ff8a65', // Peachy Orange
            '#388e3c', // Deep Green
            '#1de9b6', // Mint
        ];
        document.querySelectorAll('.badge-category').forEach(function(el) {
            const id = parseInt(el.getAttribute('data-category-id'), 10) || 0;
            const color = badgeColors[id % badgeColors.length];
            el.style.backgroundColor = color;
            el.style.color = '#fff'; // always white text
        });
        $('#categorySelect').on('change', function() {
            if ($(this).val() === 'add_new') {
                $('#newCategoryDiv').show();
                $('#newCategoryInput').prop('required', true);
            } else {
                $('#newCategoryDiv').hide();
                $('#newCategoryInput').prop('required', false).val('');
            }
        });
        $(document).on('click', '.edit-page', function() {
            var pageId = $(this).data('id');
            $.get('/pages/get/' + pageId, function(response) {
                if (response && response.status === 'success') {
                    var d = response.data;
                    $('#editPageId').val(d.id);
                    $('#editPageTitle').val(d.title);
                    $('#editPageParent').val(d.parent_path || '');
                    $('#editPageSlug').val(d.slug || '');
                    $('#editPageH1').val(d.h1 || '');
                    $('#editMetaDescription').val(d.meta_description || '');
                    $('#editPageTemplate').val(d.template || 'default');
                    $('#editCategorySelect').val(d.category_id || '');
                    $('#editPageStatus').val(d.status || 'draft');
                    $('#editPageTags').val(d.tags || '');
                    // Handle category add new
                    if (d.category_id === null && d.category_name) {
                        $('#editCategorySelect').val('add_new');
                        $('#editNewCategoryDiv').show();
                        $('#editNewCategoryInput').val(d.category_name);
                    } else {
                        $('#editNewCategoryDiv').hide();
                        $('#editNewCategoryInput').val('');
                    }
                    // TinyMCE for edit body
                    if (tinymce.get('editModalBodyEditor')) tinymce.get('editModalBodyEditor').setContent(d.body || '');
                    else tinymce.init({
                        selector: '#editModalBodyEditor',
                        setup: function(editor) {
                            editor.on('init', function() {
                                editor.setContent(d.body || '');
                            });
                        }
                    });
                    $('#editPage').modal('show');
                } else {
                    Swal.fire('Error', 'Could not load page for editing.', 'error');
                }
            });
        });
        // Handle add new category in edit modal
        $('#editCategorySelect').on('change', function() {
            if ($(this).val() === 'add_new') {
                $('#editNewCategoryDiv').show();
                $('#editNewCategoryInput').prop('required', true);
            } else {
                $('#editNewCategoryDiv').hide();
                $('#editNewCategoryInput').prop('required', false).val('');
            }
        });
        // Save changes (Edit)
        $('#updatePageBtn').on('click', function(e) {
            e.preventDefault();
            if (tinymce.get('editModalBodyEditor')) tinymce.get('editModalBodyEditor').save();
            var formData = $('#editPageForm').serialize();
            var pageId = $('#editPageId').val();
            $.ajax({
                url: '/pages/update/' + pageId,
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire('Success', response.message, 'success');
                        $('#editPage').modal('hide');
                        location.reload();
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Something went wrong.', 'error');
                }
            });
        });
        $(document).on('click', '.toggle-status', function() {
            var pageId = $(this).data('id');
            var newStatus = $(this).data('status');
            $.ajax({
                url: '/pages/toggle_status',
                method: 'POST',
                data: {
                    id: pageId,
                    status: newStatus
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire('Success', response.message, 'success');
                        location.reload();
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Something went wrong.', 'error');
                }
            });
        });
    </script>
</body>

</html>