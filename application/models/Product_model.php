<?php
class Product_model extends CI_model
{
  function getArt($limit = null)
  {
    $this->db->select('*');
    if ($limit !== null) {
      $this->db->limit($limit);
    }
    $query = $this->db->get('cmsSID_products');
    return $query->result_array();
  }
  public function saveProdcut($data)
  {
    return $this->db->insert('cmsSID_products', $data);
  }
  public function getPiece($id)
  {
    $condition = "id =" . "'" . $id . "'";
    $this->db->select('*');
    $this->db->from('cmsSID_products');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
      return $query->result();
    } else {
      return false;
    }
  }
  public function getPaginated($limit, $offset)
  {
    $this->db->limit($limit, $offset);
    $query = $this->db->get('cmsSID_products');
    return $query->result_array();
  }
  public function countAll()
  {
    return (int) $this->db->count_all('cmsSID_products');
  }
  public function countByCategory($slug)
  {
    // Count all products where the category matches the provided slug
    $this->db->where('cmsSID_category', $slug);
    return (int)$this->db->count_all_results('cmsSID_products');
  }
  public function getPaginatedByCategory($slug, $limit, $offset)
  {
    // Retrieve products for a given category with pagination
    $this->db->where('cmsSID_category', $slug);
    $this->db->limit($limit, $offset);
    $query = $this->db->get('cmsSID_products');
    return $query->result_array();
  }
  public function getProductBySlug($slug)
  {
    $this->db->where('cmsSID_slug', $slug);
    $query = $this->db->get('cmsSID_products');
    if ($query->num_rows() == 1) {
      return $query->row_array();
    }
    return false;
  }
}
