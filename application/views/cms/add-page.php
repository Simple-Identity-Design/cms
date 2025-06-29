<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('/global/cms/meta.php'); ?>
    <title>Knowledge Base | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <!-- BEGIN PLUGINS/CUSTOM STYLES FOR BOTH THEMES -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- SweetAlert2 Custom -->
    <link href="/assets/cms-assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="/assets/cms-assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
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
                                <form id="editPageForm" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="editPageId" value="<?= htmlspecialchars($page['id']) ?>">
                                    <div class="mb-3">
                                        <label for="editFeaturedImage" class="form-label">Featured Image</label>
                                        <input type="file" id="editFeaturedImage" name="featured_image" class="form-control">
                                        <?php if (!empty($page['featured_image_path'])): ?>
                                            <img src="<?= htmlspecialchars($page['featured_image_path']) ?>" alt="Current Image" class="mt-2" style="max-width:150px;">
                                        <?php endif; ?>
                                    </div>
                                    <input type="hidden" id="featuredImagePath" name="featured_image_path" value="<?= htmlspecialchars($page['featured_image_path'] ?? '') ?>">
                                    <div class="mb-3">
                                        <label for="editPageTitle" class="form-label">Title</label>
                                        <input type="text" name="title" id="editPageTitle" class="form-control" value="<?= htmlspecialchars($page['title']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editPageParent" class="form-label">Parent Path</label>
                                        <input type="text" name="parent_path" id="editPageParent" class="form-control" value="<?= htmlspecialchars(dirname($page['path'])) ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editPageSlug" class="form-label">Page Slug</label>
                                        <input type="text" name="slug" id="editPageSlug" class="form-control" value="<?= htmlspecialchars($page['slug']) ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editPageH1" class="form-label">Main Heading (H1)</label>
                                        <input type="text" name="h1" id="editPageH1" class="form-control" value="<?= htmlspecialchars($page['h1']) ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editMetaDescription" class="form-label">Meta Description</label>
                                        <textarea name="meta_description" id="editMetaDescription" class="form-control"><?= htmlspecialchars($page['meta_description']) ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editPageTemplate" class="form-label">Template</label>
                                        <select name="template" id="editPageTemplate" class="form-control">
                                            <option value="default" <?= $page['template'] == 'default' ? 'selected' : '' ?>>Default</option>
                                            <option value="landing" <?= $page['template'] == 'landing' ? 'selected' : '' ?>>Landing</option>
                                            <option value="service" <?= $page['template'] == 'service' ? 'selected' : '' ?>>Service</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editCategorySelect" class="form-label">Category</label>
                                        <select name="category_id" id="editCategorySelect" class="form-control">
                                            <option value="">Select Category</option>
                                            <?php foreach ($categories as $cat): ?>
                                                <option value="<?= $cat['id'] ?>" <?= (isset($page['category_id']) && $page['category_id'] == $cat['id']) ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($cat['name']) ?>
                                                </option>
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
                                            <option value="draft" <?= $page['status'] == 'draft' ? 'selected' : '' ?>>Draft</option>
                                            <option value="published" <?= $page['status'] == 'published' ? 'selected' : '' ?>>Published</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editPageTags" class="form-label">Tags</label>
                                        <input type="text" name="tags" id="editPageTags" class="form-control"
                                            value="<?= htmlspecialchars(is_array($tags ?? null) ? implode(',', $tags) : ($page['tags'] ?? '')) ?>"
                                            placeholder="Tags (comma-separated)">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editPageBody" class="form-label">Edit Page</label>
                                        <textarea name="body" id="editPageBody"><?= htmlspecialchars($page['body'] ?? '') ?></textarea>
                                    </div>
                                    <!-- You may want to add a save button or handle this via JS -->
                                    <button type="submit" class="btn btn-primary" id="updatePageBtn">Save Changes</button>
                                </form>
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
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        let featuredImageFile = null;
        // --- TinyMCE SETUP for full edit page ---
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
                plugins: 'media image link code',
                toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | media image link | code',
                media_live_embeds: true,
                file_picker_types: 'media image',
                file_picker_callback: function(cb, value, meta) {
                    if (meta.filetype === 'image') {
                        const input = document.createElement('input');
                        input.type = 'file';
                        input.accept = 'image/*';
                        input.onchange = function() {
                            const file = this.files[0];
                            const slug = $('#editPageSlug').val() || 'generic-page';
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
                                .then(json => cb(json.location))
                                .catch(() => alert('Image upload failed.'));
                        };
                        input.click();
                    }
                },
                images_upload_handler: function(blobInfo, success, failure) {
                    const slug = $('#editPageSlug').val() || 'generic-page';
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
                        editor.setContent(content || $('textarea[name="body"]').val() || '');
                    });
                }
            });
        }
        // On page ready
        $(function() {
            // 1. Init TinyMCE on page body
            initTinyMCE('#editPageBody');
            // 2. Category add new logic
            $('#editCategorySelect').on('change', function() {
                if ($(this).val() === 'add_new') {
                    $('#editNewCategoryDiv').show();
                    $('#editNewCategoryInput').prop('required', true);
                } else {
                    $('#editNewCategoryDiv').hide();
                    $('#editNewCategoryInput').prop('required', false).val('');
                }
            }).trigger('change');
            // 3. Track featured image file for AJAX
            $('#editFeaturedImage').on('change', function() {
                featuredImageFile = this.files[0] || null;
            });
            // 4. Form submission via AJAX
            $('#editPageForm').on('submit', function(e) {
                e.preventDefault();
                if (tinymce.get('editPageBody')) {
                    tinymce.get('editPageBody').save();
                }
                const form = this;
                const formData = new FormData(form);
                if (featuredImageFile) {
                    formData.set('featured_image', featuredImageFile);
                }
                const pageId = $('#editPageId').val();
                let url = '/pages/save';
                if (pageId) { // Edit mode
                    url = '/pages/update/' + pageId;
                }
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Saved!',
                                text: response.message,
                                timer: 1200,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.href = '/pages';
                            });
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
                        } catch (e) {}
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: message
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>