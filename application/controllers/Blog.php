<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Blog extends CI_Controller
{
    public function index()
    {
        $this->load->model('blog_model');
        // Get the slug from the second URI segment (which used to be segment2)
        $slug = $this->uri->segment(2);
        if ($slug) {
            // If a slug is present, load the specific blog
            $data['blog'] = $this->blog_model->getSingleBlog($slug);
            if (!$data['blog']) {
                show_404(); // Show 404 if the blog isn't found
            } else {
                // Dynamically load the view using the slug without the directory structure
                $this->load->view('blogs/' . $slug, $data);
            }
        } else {
            // No slug is present, load all blogs
            $data['blogs'] = $this->blog_model->getLatestBlogs();
            $this->load->view('blogs', $data); // Load the blog list view
        }
    }
    public function saveBlog()
    {
        $this->load->model('blog_model');
        $blogId = $this->input->post('blog_id');
        $users = getSessionVariables('user_name', 'simple_id', 'level');
        $userId = $users->simple_id;
        $data = array(
            'user_id' => $users->simple_id,
            'blog_id' => $blogId
        );
        if (!$userId) {
            echo json_encode(['error' => 'You must be logged in to save a blog.', 'saved' => false]);
            return;
        }
        $isSaved = $this->blog_model->isBlogSaved($blogId, $userId);
        if ($isSaved) {
            echo json_encode(['error' => 'Blog already saved.', 'saved' => true]);
            return;
        }
        $result = $this->blog_model->saveBlog($data);
        if ($result) {
            echo json_encode(['success' => 'Blog saved successfully.', 'saved' => false]);
        } else {
            echo json_encode(['error' => 'Failed to save blog.', 'saved' => false]);
        }
    }
    public function submitComment()
    {
        $this->load->model('blog_model');
        $users = getSessionVariables('user_name', 'simple_id', 'level');
        $blogId = $this->input->post('blog_id');
        $userId = $users->simple_id;
        $commentText = $this->input->post('comment_text');
        if (!$userId) {
            echo json_encode(['error' => 'You must be logged in to leave a comment.']);
            return;
        }
        $data = [
            'user_id' => $userId,
            'blog_id' => $blogId,
            'comment_text' => $commentText
        ];
        $result = $this->blog_model->saveComment($data);
        if ($result) {
            // Retrieve all comments for the blog
            $comments = $this->blog_model->getCommentsByBlogId($blogId);
            $totalComments = count($comments);
            echo json_encode(['success' => 'Comment submitted successfully.', 'comments' => $comments, 'totalComments' => $totalComments]);
        } else {
            echo json_encode(['error' => 'Failed to submit comment.']);
        }
    }
    public function getComments()
    {
        $this->load->model('blog_model');
        $blogId = $this->input->post('blog_id');
        $comments = $this->blog_model->getCommentsByBlogId($blogId);
        $totalComments = count($comments);
        echo json_encode(['comments' => $comments, 'totalComments' => $totalComments]);
    }
    public function deleteBlog()
    {
        // Assuming that the ID of the blog to be deleted is passed as POST data
        $id = $this->input->post('id');
        $delete = $this->blog_model->delete_blog($id);
        // Set Content-Type header to application/json
        $this->output->set_content_type('application/json');
        if ($delete) {
            // If the deletion was successful, return a success message
            $this->output->set_output(json_encode([
                'success' => 'The blog has been successfully deleted.'
            ]));
        } else {
            // If the deletion failed, return an error message
            $this->output->set_output(json_encode([
                'error' => 'An error occurred while attempting to delete the blog.'
            ]));
        }
    }
    public function submit()
    {
        // Load the form validation library
        $this->load->library('form_validation');
        $this->load->model('Blog_model');
        // Set form validation rules
        $this->form_validation->set_rules('add-blog-title', 'Title', 'required');
        $this->form_validation->set_rules('add-blog-h1', 'H1', 'required');
        $this->form_validation->set_rules('add-blog-h2', 'H2', 'required');
        $this->form_validation->set_rules('add-blog-slug', 'Slug', 'required');
        $this->form_validation->set_rules('add-blog-description', 'Description', 'required');
        $this->form_validation->set_rules('exampleFormControlSelect1', 'Category', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_msg', 'Failed to add blog. Please fill in all required fields.');
            redirect('/admin');
        } else {
            // Retrieve form data
            $title = $this->input->post('add-blog-title');
            $h1 = $this->input->post('add-blog-h1');
            $h2 = $this->input->post('add-blog-h2');
            $slug = str_replace(' ', '-', $this->input->post('add-blog-slug'));
            $description = $this->input->post('add-blog-description');
            $category = $this->input->post('exampleFormControlSelect1');
            $author = "Kapo"; // Hard set the author to "Kapo"
            // Prepare data for insertion
            $data = [
                'name' => $title,
                'blog_h1' => $h1,
                'blog_h2' => $h2,
                'slug' => $slug,
                'author' => $author,
                'category' => $category,
                'blog_desc' => $description,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            // Insert data into the database
            if ($this->Blog_model->insert($data)) {
                $this->session->set_flashdata('success_msg', 'Blog created successfully.');
                redirect('/admin');
            } else {
                $this->session->set_flashdata('error_msg', 'Failed to add blog');
                redirect('/admin');
            }
        }
    }
    public function getLatestBlogs()
    {
        $this->load->model('Blog_model');
        $blogs = $this->Blog_model->getLatestBlogs();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($blogs));
    }
}
