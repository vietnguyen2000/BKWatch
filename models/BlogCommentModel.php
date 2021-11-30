<?php

namespace Models;

class BlogCommentModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'blogcomment';
  }
  public function getAllComment()
  {
    try {
      $sql = "SELECT
      blogcomment.id AS id, 
      blog.title AS blogTitle,
      user.fullname AS userCmtFullname,
      blogcomment.content AS userCmtContent,
      blogcomment.rating AS userCmtRating,
      blogcomment.updatedAt AS userCmtTime
      FROM blogcomment
      LEFT JOIN blog ON blog.id = blogcomment.blogId
      LEFT JOIN user ON user.id = blogcomment.userId
      ORDER BY blog.id
      ";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
}
