<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Services extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
    }
    public function _remap($method, $params = [])
    {
        if ($method === 'index' || $method === '') {
            return $this->index();
        }
        $pathSegments = array_filter(array_merge([$method], $params));
        $viewPath = 'services/' . implode('/', $pathSegments);
        $fullPath = APPPATH . 'views/' . $viewPath . '.php';
        if (file_exists($fullPath)) {
            $this->load->view($viewPath);
        } elseif (file_exists(APPPATH . 'views/services/' . $method . '.php')) {
            $this->load->view('services/' . $method);
        } else {
            show_404();
        }
    }
    public function index()
    {
        $data['latest_blogs'] = $this->blog_model->getLatestBlogsLimited(3);
        $this->load->view('services', $data);
    }
}
