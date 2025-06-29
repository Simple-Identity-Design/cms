<?php
class Blog_model extends CI_model
{
    // public function getBlogs($limit = null, $topic = null, $orderByLatest = false)
    // {
    //     if ($orderByLatest) {
    //         $this->db->order_by('created_at', 'DESC');
    //     }
    //     if (!empty($topic)) {
    //         $this->db->where('topic', $topic);
    //     }
    //     if (!empty($limit)) {
    //         $this->db->limit((int) $limit);
    //     }
    //     $query = $this->db->get('blogs');
    //     return $query->result_array();
    // }
    public function getBlogs($limit = null, $topic = null, $orderByLatest = false)
    {
        $this->db->select('
        p.*, 
        CONCAT(u.first_name, " ", u.last_name) AS user, 
        CONCAT(LOWER(REPLACE(u.first_name, " ", "-")), "-", LOWER(REPLACE(u.last_name, " ", "-"))) AS author_slug,
        c.name AS category_name, 
        c.slug AS category_slug, 
        c.id AS category_id
    ');
        $this->db->from('cmsSID_pages p');
        $this->db->join('cmsSID_users u', 'u.user_id = p.user_id', 'left');
        $this->db->join('cmsSID_categories c', 'c.id = p.category_id', 'left');
        // Only published pages under blog/
        $this->db->where('p.status', 'published');
        $this->db->like('p.path', 'blog/', 'after');
        // Filter by topic if given (assuming 'page_type' is used for topic)
        if (!empty($topic)) {
            $this->db->where('p.page_type', $topic);
        }
        // Sort by newest if requested
        if ($orderByLatest) {
            $this->db->order_by('p.created_at', 'DESC');
        }
        // Limit result count if provided
        if (!empty($limit)) {
            $this->db->limit((int) $limit);
        }
        return $this->db->get()->result_array();
    }
    public function getSingleBlog($slug)
    {
        // Get the intended blog
        $this->db->select('*');
        $this->db->from('blogs');
        $this->db->where('slug', $slug);
        $query = $this->db->get();
        $result['intended'] = $query->row_array();
        // Get random blogs excluding the current one
        $this->db->select('*');
        $this->db->from('blogs');
        $this->db->where('slug !=', $slug); // Exclude the current blog
        $this->db->order_by('RAND()'); // Order randomly
        $this->db->limit(5); // Limit to 5 blogs
        $query = $this->db->get();
        $result['random'] = $query->result_array();
        // Check if there are not enough random blogs
        if (count($result['random']) < 2) {
            // Set a text value that can be checked in an if statement
            $result['random'] = "Not enough random blogs";
        }
        return $result;
    }
    public function isBlogSaved($blogId, $userId)
    {
        $this->db->where('blog_id', $blogId);
        $this->db->where('user_id', $userId);
        $query = $this->db->get('savedblogs');
        return ($query->num_rows() > 0);
    }
    public function saveBlog($data)
    {
        return $this->db->insert('savedblogs', $data);
    }
    public function delete_blog($id)
    {
        $this->db->where('ID', $id);
        return $this->db->delete('blogs');
    }
    public function insert($data)
    {
        return $this->db->insert('blogs', $data);
    }
    public function saveComment($data)
    {
        $this->db->insert('comments', $data);
        return $this->db->affected_rows() > 0;
    }
    public function getCommentsByBlogId($blogId)
    {
        $this->db->select('comment_id, user_id, comment_text, created_at');
        $this->db->where('blog_id', $blogId);
        $query = $this->db->get('comments');
        return $query->result_array();
    }
    public function get_user_blogs($user_id)
    {
        $this->db->select('blogs.*, savedblogs.saved_at');
        $this->db->from('savedblogs');
        $this->db->join('blogs', 'savedblogs.blog_id = blogs.ID');
        $this->db->where('savedblogs.user_id', $user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
