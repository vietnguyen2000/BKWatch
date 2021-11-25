<?php

namespace Models;

class BlogModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'blog';
  }
  public function getBlogDefault()
  {
    try {
      $sql = "SELECT 
      bkwatch.blog.id AS blogId,
      bkwatch.blog.userId AS userId,
      bkwatch.user.fullname AS userFullname,
      bkwatch.blog.title AS title,
      bkwatch.blog.content AS content,
      bkwatch.blog.isHot AS isHot,
      bkwatch.blog.countLike AS countLike,
      bkwatch.blog.countView AS countView,
      bkwatch.blog.createdAt AS createdAt,
      bkwatch.blog.updatedAt AS updatedAt,
      bkwatch.blogimage.imageURL AS blogImgURL,
      bkwatch.blogcomment.userId AS userCmtId,
      bkwatch.blogcomment.content AS userCmtContent,
      bkwatch.blogcomment.rating AS userCmtRating,
      bkwatch.blogcomment.updatedAt AS userCmtTime
      FROM bkwatch.blog
      LEFT JOIN bkwatch.user ON bkwatch.blog.userId = bkwatch.user.id
      LEFT JOIN bkwatch.blogimage ON bkwatch.blog.id = bkwatch.blogimage.blogId
      LEFT JOIN bkwatch.blogcomment ON bkwatch.blog.id = bkwatch.blogcomment.blogId
      ";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
  public function getAllBlog()
  {
    try {
      $sql = "SELECT 
      bkwatch.blog.id AS blogId,
      bkwatch.blog.userId AS userId,
      bkwatch.user.fullname AS userFullname,
      bkwatch.blog.title AS title,
      bkwatch.blog.content AS content,
      bkwatch.blog.isHot AS isHot,
      bkwatch.blog.countLike AS countLike,
      bkwatch.blog.countView AS countView,
      bkwatch.blog.createdAt AS createdAt,
      bkwatch.blog.updatedAt AS updatedAt
      FROM bkwatch.blog
      LEFT JOIN bkwatch.user ON bkwatch.blog.userId = bkwatch.user.id
      WHERE bkwatch.blog.id > 1
      ";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      $ret = [];
      $ret = $data;
      $count = 0;
      foreach ($data as $record) {
        $temp = $this->getCmtsByBlogId($record['blogId']);
        $ret[$count]['cmt'] = $temp;
        $count += 1;
      }
      $count = 0;
      foreach ($data as $record) {
        $temp = $this->getImgsByBlogId($record['blogId']);
        $ret[$count]['img'] = $temp;
        $count += 1;
      }
      return $ret;
    } catch (\Exception $e) {
      return [];
    }
  }
  public function getBlogById(int $id)
  {
    try {
      $sql = "SELECT 
      bkwatch.blog.id AS blogId,
      bkwatch.blog.userId AS userId,
      bkwatch.user.fullname AS userFullname,
      bkwatch.blog.title AS title,
      bkwatch.blog.content AS content,
      bkwatch.blog.isHot AS isHot,
      bkwatch.blog.countLike AS countLike,
      bkwatch.blog.countView AS countView,
      bkwatch.blog.createdAt AS createdAt,
      bkwatch.blog.updatedAt AS updatedAt
      FROM bkwatch.blog
      LEFT JOIN bkwatch.user ON bkwatch.blog.userId = bkwatch.user.id
      WHERE bkwatch.blog.id = $id
      ";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      $ret = [];
      $ret = $data;
      $count = 0;
      foreach ($data as $record) {
        $temp = $this->getCmtsByBlogId($record['blogId']);
        $ret[$count]['cmt'] = $temp;
        $count += 1;
      }
      $count = 0;
      foreach ($data as $record) {
        $temp = $this->getImgsByBlogId($record['blogId']);
        $ret[$count]['img'] = $temp;
        $count += 1;
      }
      return $ret[0];
    } catch (\Exception $e) {
      return [];
    }
  }
  public function getCmtsByBlogId(int $id)
  {
    try {
      $sql = "SELECT 
      bkwatch.blog.id AS blogId,
      bkwatch.blogcomment.userId AS userCmtId,
      bkwatch.user.fullname AS userCmtFullname,
      bkwatch.user.avatarURL AS userCmtAvt,
      bkwatch.blogcomment.content AS userCmtContent,
      bkwatch.blogcomment.rating AS userCmtRating,
      bkwatch.blogcomment.updatedAt AS userCmtTime,
      bkwatch.blogcomment.id AS cmtId
      FROM bkwatch.blogcomment
      LEFT JOIN bkwatch.blog ON bkwatch.blog.id = bkwatch.blogcomment.blogId
      LEFT JOIN bkwatch.user ON bkwatch.user.id = bkwatch.blogcomment.userId
      WHERE bkwatch.blog.id = $id
      ";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
  public function getImgsByBlogId(int $id)
  {
    try {
      $sql = "SELECT 
      bkwatch.blog.id AS blogId,
      bkwatch.blogimage.imageURL AS blogImgURL
      FROM bkwatch.blog
      LEFT JOIN bkwatch.blogimage ON bkwatch.blog.id = bkwatch.blogimage.blogId
      WHERE bkwatch.blog.id = $id
      ";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
  public function getHotBlog()
  {
    try {
      $sql = "SELECT 
      bkwatch.blog.id AS blogId,
      bkwatch.blog.userId AS userId,
      bkwatch.user.fullname AS userFullname,
      bkwatch.blog.title AS title,
      bkwatch.blog.content AS content,
      bkwatch.blog.isHot AS isHot,
      bkwatch.blog.countLike AS countLike,
      bkwatch.blog.countView AS countView,
      bkwatch.blog.createdAt AS createdAt,
      bkwatch.blog.updatedAt AS updatedAt
      FROM bkwatch.blog
      LEFT JOIN bkwatch.user ON bkwatch.blog.userId = bkwatch.user.id
      WHERE bkwatch.blog.updatedAt > date_sub(now(), interval 1 week) 
      AND bkwatch.blog.isHot = 1 
      AND bkwatch.blog.id > 1
      AND bkwatch.blog.countLike = (SELECT MAX(bkwatch.blog.countLike) FROM bkwatch.blog)
      ";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      $ret = [];
      $ret = $data;
      $count = 0;
      foreach ($data as $record) {
        $temp = $this->getCmtsByBlogId($record['blogId']);
        $ret[$count]['cmt'] = $temp;
        $count += 1;
      }
      $count = 0;
      foreach ($data as $record) {
        $temp = $this->getImgsByBlogId($record['blogId']);
        $ret[$count]['img'] = $temp;
        $count += 1;
      }
      // print_r($ret);
      return $ret;
    } catch (\Exception $e) {
      return [];
    }
  }
  public function getBlogHeader()
  {
    try {
      $sql = "SELECT blog.title AS title, blogimage.imageURl AS img
      FROM blogimage  
      INNER JOIN bkwatch.blog ON blogimage.blogId = blog.id
      WHERE blogimage.blogID = 1";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
}
