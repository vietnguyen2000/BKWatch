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
      bkwatch.blogcomment.id AS id, 
      bkwatch.blog.title AS blogTitle,
      bkwatch.user.fullname AS userCmtFullname,
      bkwatch.blogcomment.content AS userCmtContent,
      bkwatch.blogcomment.rating AS userCmtRating,
      bkwatch.blogcomment.updatedAt AS userCmtTime
      FROM bkwatch.blogcomment
      LEFT JOIN bkwatch.blog ON bkwatch.blog.id = bkwatch.blogcomment.blogId
      LEFT JOIN bkwatch.user ON bkwatch.user.id = bkwatch.blogcomment.userId
      ORDER BY bkwatch.blog.id
      ";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
}
