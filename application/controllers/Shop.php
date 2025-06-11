<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Shop extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Load your model
		$this->load->model('Product_model');
	}
	// Display all products on the shop page (existing method)
	public function index()
	{
		// Assign breadcrumbs to a key instead of $data directly
		$data['breadcrumbs'] = getBreadcrumbs();
		// Get the total number of products and set items per page
		$total    = (int)$this->Product_model->countAll();
		$per_page = 9;
		// Retrieve the 'page' query string; default to page 1 if not present or invalid
		$page = $this->input->get('page');
		if (!ctype_digit((string)$page) || $page < 1) {
			$page = 1; // default to page 1 if invalid
		}
		$config['cur_page'] = $page;
		// Load the pagination library
		$this->load->library('pagination');
		// Configure pagination with query string settings
		$config['base_url'] = base_url('shop');
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		// Ensure the first page link remains clean (/shop instead of /shop?page=0)
		$config['first_url'] = base_url('shop');
		// Optional: Custom HTML for pagination links
		$config['full_tag_open']  = '<ul class="pagination pagination-style-01 fs-14 fw-500 mb-0">';
		$config['full_tag_close'] = '</ul>';
		// Wrap each page number in <li> tags
		$config['num_tag_open']   = '<li class="page-item">';
		$config['num_tag_close']  = '</li>';
		// Highlight current page
		$config['cur_tag_open']   = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']  = '</a></li>';
		// Previous/Next arrows
		$config['prev_tag_open']  = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open']  = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		// Set arrow icons
		$config['prev_link']      = '<i class="feather icon-feather-arrow-left fs-18 d-xs-none"></i>';
		$config['next_link']      = '<i class="feather icon-feather-arrow-right fs-18 d-xs-none"></i>';
		// Add class="page-link" to each <a> tag
		$config['use_page_numbers'] = TRUE;
		$config['attributes'] = array('class' => 'page-link');
		// Set current page and initialize
		$config['cur_page'] = $page;
		$data['current_page'] = $page;
		$this->pagination->initialize($config);
		// Fetch paginated products and generate links
		// If $page is at least 1, offset = ($page - 1) * per_page
		$offset = ($page > 0 ? $page - 1 : 0) * $per_page;
		$data['products'] = $this->Product_model->getPaginated($per_page, $offset);
		$data['pagination_links'] = $this->pagination->create_links();
		$this->load->view('shop', $data);
	}
	public function category($slug = null)
	{
		if ($slug === null) {
			show_404();
		}
		// Count products for the given category
		$total = (int)$this->Product_model->countByCategory($slug);
		$per_page = 9;
		$page = $this->input->get('page');
		if (!ctype_digit((string)$page) || $page < 1) {
			$page = 1;
		}
		$offset = ($page - 1) * $per_page;
		$this->load->library('pagination');
		$config['base_url'] = base_url('shop/' . $slug);
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['first_url'] = base_url('shop/' . $slug);
		$config['use_page_numbers'] = TRUE;
		$config['attributes'] = array('class' => 'page-link');
		// Optional: Custom HTML for pagination links
		$config['full_tag_open']  = '<ul class="pagination pagination-style-01 fs-14 fw-500 mb-0">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open']   = '<li class="page-item">';
		$config['num_tag_close']  = '</li>';
		$config['cur_tag_open']   = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']  = '</a></li>';
		$config['prev_tag_open']  = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open']  = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link']      = '<i class="feather icon-feather-arrow-left fs-18 d-xs-none"></i>';
		$config['next_link']      = '<i class="feather icon-feather-arrow-right fs-18 d-xs-none"></i>';
		$config['cur_page'] = $page;
		$data['current_page'] = $page;
		$this->pagination->initialize($config);
		$data['products'] = $this->Product_model->getPaginatedByCategory($slug, $per_page, $offset);
		$data['pagination_links'] = $this->pagination->create_links();
		$data['category_slug'] = $slug;
		// Load your category view (e.g., shop_category.php)
		$this->load->view('shop_category', $data);
	}
	// Method for displaying a single product
	// e.g., /shop/earrings/product-slug
	public function product($category, $slug)
	{
		// Look up the product by its slug
		$product = $this->Product_model->getProductBySlug($slug);
		// If not found, or if the product's category doesn't match the URL, show a 404
		if (!$product || strtolower($product['cmsSID_category']) !== strtolower($category)) {
			show_404();
		}
		$data['product'] = $product;
		$data['category'] = ucfirst($category);
		// Load your product view (e.g., product_view.php)
		$this->load->view('product_view', $data);
	}
}
