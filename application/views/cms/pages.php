<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('/global/cms/meta.php'); ?>
    <title>Knowledge Base | CORK - Multipurpose Bootstrap Dashboard Template </title>
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
    <?php $this->load->view('/global/cms/styles.php'); ?>
    <!-- END PLUGINS/CUSTOM STYLES -->
    <script src="https://cdn.tiny.cloud/1/3at6u02txgs4tmfghlfvznxexlw9o782zs3uy6qdpniueay0/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <style>
        .tox-dialog textarea,
        .tox-textarea {
            pointer-events: auto !important;
            opacity: 1 !important;
            background: #fff !important;
            color: #222 !important;
        }
    </style>
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
                                    <tbody class="edit-table">
                                        <?php foreach ($pages as &$page) : ?>
                                            <tr>
                                                <td>
                                                    <input class="form-check-input row-check" type="checkbox" name="page_ids[]" value="<?= $page['id']; ?>">
                                                </td>
                                                <td class="text-center">
                                                    <div class="dropdown position-relative">
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
                                                            <a class="dropdown-item edit-page" href="javascript:void(0);" data-id="<?= $page['id']; ?>">Quick Edit</a>
                                                            <a class="dropdown-item" href="/pages/edit/<?= $page['id']; ?>" target="_blank">Edit Content</a>
                                                            <a href="javascript:void(0);"
                                                                class="dropdown-item toggle-status"
                                                                data-id="<?= $page['id']; ?>"
                                                                data-status="<?= $page['status'] === 'published' ? 'draft' : 'published'; ?>">
                                                                <?= $page['status'] === 'published' ? 'Unpublish' : 'Publish'; ?>
                                                            </a>
                                                            <a class="dropdown-item text-danger delete-page"
                                                                href="javascript:void(0);"
                                                                data-id="<?= $page['id']; ?>"
                                                                data-title="<?= htmlspecialchars($page['title']); ?>">Delete</a>
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
                                <!-- Edit Page Modal -->
                                <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="editPageLabel" aria-hidden="true" id="editPage">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editPageLabel">Edit Page</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editPageForm" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" id="editPageId">
                                                    <div class="mb-3">
                                                        <label for="editFeaturedImage" class="form-label">Featured Image</label>
                                                        <input type="file" id="editFeaturedImage" name="featured_image" class="form-control">
                                                    </div>
                                                    <input type="hidden" id="featuredImagePath" name="featured_image_path">
                                                    <div class="mb-3">
                                                        <label for="editPageTitle" class="form-label">Title</label>
                                                        <input type="text" name="title" id="editPageTitle" class="form-control" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editPageParent" class="form-label">Parent Path</label>
                                                        <input type="text" name="parent_path" id="editPageParent" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editPageSlug" class="form-label">Page Slug</label>
                                                        <input type="text" name="slug" id="editPageSlug" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editPageH1" class="form-label">Main Heading (H1)</label>
                                                        <input type="text" name="h1" id="editPageH1" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editMetaDescription" class="form-label">Meta Description</label>
                                                        <textarea name="meta_description" id="editMetaDescription" class="form-control"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editPageTemplate" class="form-label">Template</label>
                                                        <select name="template" id="editPageTemplate" class="form-control">
                                                            <option value="default">Default</option>
                                                            <option value="landing">Landing</option>
                                                            <option value="service">Service</option>
                                                        </select>
                                                    </div>
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
                                                        <label for="editNewCategoryInput" class="form-label">New Category</label>
                                                        <input type="text" id="editNewCategoryInput" name="new_category" class="form-control" placeholder="Enter new category" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editPageStatus" class="form-label">Status</label>
                                                        <select name="status" id="editPageStatus" class="form-control">
                                                            <option value="draft">Draft</option>
                                                            <option value="published">Published</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editPageTags" class="form-label">Tags</label>
                                                        <input type="text" name="tags" id="editPageTags" class="form-control" placeholder="Tags (comma-separated)">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-light-dark" data-bs-dismiss="modal">Discard</button>
                                                <button type="button" id="updatePageBtn" class="btn btn-primary">Save Changes</button>
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
        let featuredImageFile = null;
        // --- Reusable TinyMCE setup function ---
        function initTinyMCE(selector, content = '') {
            if (tinymce.get(selector.replace('#', ''))) {
                tinymce.get(selector.replace('#', '')).remove();
            }
            tinymce.init({
                selector: selector,
                relative_urls: false,
                remove_script_host: false,
                convert_urls: true,
                height: 400,
                plugins: 'media image link code', // keep 'code' here
                toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | media image link | code', // 'code' at the end
                media_live_embeds: true,
                file_picker_types: 'media image',
                file_picker_callback: function(cb, value, meta) {
                    if (meta.filetype === 'image') {
                        const input = document.createElement('input');
                        input.type = 'file';
                        input.accept = 'image/*';
                        input.onchange = function() {
                            const file = this.files[0];
                            const slug = $('#editPageSlug').val() || $('#pageSlug').val() || 'generic-page';
                            const randomSuffix = Math.floor(Math.random() * 100000);
                            const filename = `${slug}-body-${randomSuffix}.${file.name.split('.').pop()}`;
                            const formData = new FormData();
                            formData.append('file', file);
                            formData.append('filename', filename);
                            formData.append('slug', slug);
                            fetch('/media/upload_image', {
                                    method: 'POST',
                                    body: formData
                                })
                                .then(res => res.json())
                                .then(json => cb(json.location)).catch(() => alert('Image upload failed.'));
                        };
                        input.click();
                    }
                },
                images_upload_handler: function(blobInfo, success, failure) {
                    const slug = $('#editPageSlug').val() || $('#pageSlug').val() || 'generic-page';
                    const randomSuffix = Math.floor(Math.random() * 100000);
                    const filename = `${slug}-body-${randomSuffix}.${blobInfo.filename().split('.').pop()}`;
                    const formData = new FormData();
                    formData.append('file', blobInfo.blob());
                    formData.append('filename', filename);
                    formData.append('slug', slug);
                    fetch('/media/upload_image', {
                            method: 'POST',
                            body: formData
                        })
                        .then(res => res.json())
                        .then(json => success(json.location))
                        .catch(() => failure('Image upload failed'));
                },
                setup: function(editor) {
                    editor.on('init', function() {
                        editor.setContent(content || '');
                    });
                }
            });
        }
        $(document).ready(function() {
            // 1. Add search inputs to tfoot (except for checkboxes & actions)
            $('#pages-table tfoot th').each(function(i) {
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
                            window.location.href = '/pages/create';
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
            // 6. TinyMCE modal logic (init on open, destroy on close)
            $('#addPage').on('shown.bs.modal', function() {
                initTinyMCE('#modalBodyEditor');
            });
            $('#addPage').on('hidden.bs.modal', function() {
                if (tinymce.get('modalBodyEditor')) {
                    tinymce.get('modalBodyEditor').remove();
                }
            });
            // --- Bulk delete remains the same ---
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
            // Save new page (Add)
            $(document).on('click', '#savePageBtn', function(e) {
                e.preventDefault();
                if (tinymce.get('modalBodyEditor')) {
                    tinymce.get('modalBodyEditor').save();
                }
                var formData = $('#pageForm').serialize();
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
                            Swal.fire('Error', response.message || 'Unexpected failure.', 'error');
                        }
                    },
                    error: function(xhr) {
                        let message = 'Something went wrong. Please try again.';
                        let rawText = xhr.responseText;
                        try {
                            const json = JSON.parse(rawText);
                            if (json.message) message = json.message;
                        } catch (e) {
                            const div = document.createElement('div');
                            div.innerHTML = rawText;
                            const text = div.textContent || div.innerText || '';
                            if (/Duplicate entry.*for key 'slug'/i.test(text)) {
                                message = 'A page with that slug already exists.';
                            } else if (/Duplicate entry.*for key/i.test(text)) {
                                message = 'That value must be unique. Please choose a different one.';
                            } else if (/Field '(.+)' doesn't have a default value/i.test(text)) {
                                const field = text.match(/Field '(.+)'/i)[1];
                                message = `Missing required field: ${field}.`;
                            } else if (/Error Number: \d+/i.test(text)) {
                                message = 'Something went wrong saving the page. Please check your inputs.';
                            }
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: message
                        });
                    }
                });
            });
            // --- Tag/Badge coloring and select logic remains unchanged ---
            const tagBadgeColors = [
                '#2196f3', '#4caf50', '#ff9800', '#9c27b0', '#f44336', '#00bcd4', '#e91e63',
                '#009688', '#ffeb3b', '#795548', '#673ab7', '#8bc34a', '#03a9f4', '#cddc39',
                '#607d8b', '#ff5722', '#607d8b', '#a1887f', '#ffd600', '#c51162', '#388e3c'
            ];

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
                '#007bff', '#28a745', '#ffc107', '#dc3545', '#6f42c1', '#20c997', '#343a40', '#ff9800',
                '#e91e63', '#009688', '#ba68c8', '#795548', '#00bcd4', '#fd7e14', '#17a2b8', '#8bc34a',
                '#607d8b', '#f44336', '#4caf50', '#cddc39', '#3f51b5', '#ffeb3b', '#9c27b0', '#00e676',
                '#00acc1', '#f06292', '#ab47bc', '#ff7043', '#ffa000', '#8d6e63', '#a1887f', '#e57373',
                '#81d4fa', '#b2ff59', '#d4e157', '#c2185b', '#7986cb', '#aed581', '#ffb300', '#c62828',
                '#ad1457', '#e1bee7', '#fbc02d', '#ffccbc', '#d7ccc8', '#b2dfdb', '#b388ff', '#ff8a65',
                '#388e3c', '#1de9b6'
            ];
            document.querySelectorAll('.badge-category').forEach(function(el) {
                const id = parseInt(el.getAttribute('data-category-id'), 10) || 0;
                const color = badgeColors[id % badgeColors.length];
                el.style.backgroundColor = color;
                el.style.color = '#fff';
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
            // --- Edit Modal Logic (AJAX load + TinyMCE) ---
            $(document).on('click', '.edit-page', function() {
                var pageId = $(this).data('id');
                $.get('/pages/get/' + pageId, function(response) {
                    if (response && response.status === 'success') {
                        var d = response.data;
                        $('#editPageId').val(d.id);
                        $('#editPageTitle').val(d.title);
                        const parentPath = d.path?.split('/').slice(0, -1).join('/') || '';
                        $('#editPageParent').val(parentPath);
                        $('#editPageSlug').val(d.slug || '');
                        $('#editPageH1').val(d.h1 || '');
                        $('#editMetaDescription').val(d.meta_description || '');
                        $('#editPageTemplate').val(d.template || 'default');
                        $('#editCategorySelect').val(d.category_id || '');
                        $('#editPageStatus').val(d.status || 'draft');
                        $('#editPageTags').val(d.tags || '');
                        // Category logic
                        if (d.category_id === null && d.category_name) {
                            $('#editCategorySelect').val('add_new');
                            $('#editNewCategoryDiv').show();
                            $('#editNewCategoryInput').val(d.category_name);
                        } else {
                            $('#editNewCategoryDiv').hide();
                            $('#editNewCategoryInput').val('');
                        }
                        // --- Unified TinyMCE usage for edit modal
                        initTinyMCE('#editModalBodyEditor', d.body || '');
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
            $(document).on('click', '#updatePageBtn', function(e) {
                e.preventDefault();
                if (tinymce.get('editModalBodyEditor')) {
                    tinymce.get('editModalBodyEditor').save();
                }
                const form = $('#editPageForm')[0];
                const formData = new FormData(form);
                const slug = $('#editPageSlug').val();
                if (featuredImageFile) {
                    formData.append('featured_image', featuredImageFile);
                    formData.append('slug', slug);
                }
                const pageId = $('#editPageId').val();
                $.ajax({
                    url: '/pages/update/' + pageId,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire('Success', response.message, 'success');
                            $('#editPage').modal('hide');
                            location.reload();
                        } else {
                            Swal.fire('Error', response.message || 'Unexpected failure.', 'error');
                        }
                    },
                    error: function(xhr) {
                        console.error('XHR error', xhr.responseText);
                    }
                });
            });
            // Status toggle remains unchanged
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
            // Store featured image file
            $('#editFeaturedImage').on('change', function() {
                featuredImageFile = this.files[0] || null;
            });
        });
        document.addEventListener('focusin', function(e) {
            // When TinyMCE's code modal opens, focus the textarea
            if (e.target.classList.contains('tox-textarea')) {
                setTimeout(() => e.target.focus(), 10);
            }
        });
    </script>
</body>

</html>