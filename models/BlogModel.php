<?php

namespace Models;

class BlogModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'blog';
  }
  public function getAll(int $limit = null)
  {
    $data = [
      'blog' => [],
      'banner' => [],
      'cmt' => [],
    ];
    try {
      $data_temp = $this->getAllBlog(null);
      foreach ($data_temp as $key1 => $blog_value) {
        foreach ($blog_value as $key2 => $value) {
          if ($key2 == "userId") {
            $userModel = new UserModel();
            $fullname = $userModel->getFullnameById($value);
            $data_temp[$key1]['fullname'] = $fullname;
          }
        }
      }
      $data['blog'] = $data_temp;
      $data_temp = $this->getAllBlogBanner(null);
      $data['banner'] = $data_temp;
      $data_temp = $this->getAllBlogComment(null);
      $data['cmt'] = $data_temp;
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
  private function getAllBlog(int $limit = null)
  {
    try {
      $sql = "SELECT * FROM blog";
      if ($limit != null) {
        $sql += 'LIMIT' . $limit;
      };
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
  private function getAllBlogBanner(int $limit = null)
  {
    try {
      $sql = "SELECT * FROM blogimage";
      if ($limit != null) {
        $sql += 'LIMIT' . $limit;
      };
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
  private function getAllBlogComment(int $limit = null)
  {
    try {
      $sql = "SELECT * FROM blogcomment";
      if ($limit != null) {
        $sql += 'LIMIT' . $limit;
      };
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
}
