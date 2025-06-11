<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Crafto - The Multipurpose HTML5 Template</title>
    <meta name="description" content="Elevate your online presence with Crafto - a modern, versatile, multipurpose Bootstrap 5 responsive HTML5, SCSS template using highly creative 52+ ready demos.">
    <?php $this->load->view('/global/meta.php'); ?>
    <?php $this->load->view('/global/canonical.php'); ?>
    <?php $this->load->view('/global/main-styles.php'); ?>
    <?php $this->load->view('/global/custom-styles.php'); ?>
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

<body data-mobile-nav-style="classic" class="background-position-center-top custom-cursor" style="background-image: url(/assets/images/vertical-line-bg-small-medium-gray.svg)">
    <!-- start cursor -->
    <div class="cursor-page-inner">
        <div class="circle-cursor circle-cursor-inner"></div>
        <div class="circle-cursor circle-cursor-outer"></div>
    </div>
    <!-- end cursor -->
    <?php $this->load->view('/global/menu.php'); ?>
    <!-- start page title -->
    <section class="page-title-separate-breadcrumbs bg-base-color bg-sliding-line ipad-top-space-margin">
        <div class="container position-relative">
            <div class="row justify-content-center align-items-lg-end extra-very-small-screen" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <div class="col-lg-6 position-relative page-title-extra-large md-mb-30px sm-mb-20px z-index-9">
                    <h1 class="text-dark-gray fw-600 ls-minus-4px mb-0 alt-font highlight-separator-small">
                        <span class="highlight-separator mb-0 pb-0" data-shadow-animation="true" data-animation-delay="500">
                            <?= htmlspecialchars($category['name']) ?>
                            <span><img src="images/demo-digital-agency-highlight-separator.png" alt=""></span>
                        </span>
                    </h1>
                </div>
                <div class="col-lg-6">
                    <p class="fs-20 lh-32 text-dark-gray opacity-7 w-90 lg-w-100 md-w-80 mb-0">
                        <!-- Update this to your category description or a static text -->
                        <?= !empty($category['description'])
                            ? htmlspecialchars($category['description'])
                            : 'Category description goes here. Update this in your view.'; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    <!-- start section -->
    <section class="bg-light-gray p-2 overflow-hidden position-relative ipad-top-space" style="background-image: url('images/demo-minimal-portfolio-pattern.svg')">
        <div class="container-fluid h-100 p-0">
            <div class="row g-0 h-100 flex-column-reverse">
                <div class="col-lg-12 pt-6 pb-6 ps-2 pe-2">
                    <div class="h-100">
                        <table id="category-table" class="table style-1 dt-table-hover non-hover">
                            <thead>
                                <tr>
                                    <th>Title & Info</th>
                                    <th>Last Modified</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pages as &$page) : ?>
                                    <tr>
                                        <td>
                                            <strong>
                                                <a href="/<?= htmlspecialchars($page['path']); ?>">
                                                    <?= htmlspecialchars($page['title']); ?>
                                                </a>
                                            </strong>
                                            <div class="text-muted small">
                                                <strong>H1:</strong> <?= htmlspecialchars($page['h1']); ?><br>
                                                <strong>Meta:</strong>
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
                                                    <strong>:Tags</strong><br>
                                                <?php endif; ?>
                                                <?php
                                                $slug = strtolower(preg_replace('/\s+/', '-', $page['category_name'] ?? 'uncategorized'));
                                                ?>
                                                <strong>Category:</strong>
                                                <a href="/category/<?= urlencode($slug); ?>">
                                                    <span class="badge badge-category" data-category-id="<?= $page['category_id']; ?>">
                                                        <?= htmlspecialchars($page['category_name']); ?>
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if (!empty($page['user']) && !empty($page['author_slug'])): ?>
                                                <strong> <a href="/author/<?= htmlspecialchars($page['author_slug']) ?>" class="text-muted">
                                                        <?= htmlspecialchars($page['user']) ?>
                                                    </a></strong>
                                                <br>
                                            <?php endif; ?>
                                            <?php
                                            $date = new DateTime($page['updated_at']);
                                            echo $date->format('F j, Y') . '<br>' . $date->format('g:ia');
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <!-- Remove or update the tfoot -->
                            <tfoot>
                                <tr>
                                    <th>Search Title & Info</th>
                                    <th>Search Last Modified</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <?php $this->load->view('/global/scroller.php'); ?>
    <!-- javascript libraries -->
    <?php $this->load->view('/global/main-scripts.php'); ?>
    <?php $this->load->view('/global/contact-script.php'); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="/assets/cms-assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        $(document).ready(function() {
            // 1. Add search inputs to tfoot
            $('#category-table tfoot th').each(function(i) {
                var title = $('#category-table thead th').eq(i).text();
                $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
            });
            // 2. Initialize DataTable (no admin buttons, just display)
            var table = $('#category-table').DataTable({
                dom: "lfrtip", // Or whatever you prefer for search/filter
                // Remove buttons and admin options
                // Remove columnDefs for non-existent columns
                columnDefs: [],
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
            // Remove all checkbox/bulk delete logic (since those aren't in this table anymore)
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
    </script>
</body>

</html>