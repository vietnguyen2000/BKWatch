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
      blog.id AS blogId,
      blog.userId AS userId,
      user.fullname AS userFullname,
      blog.title AS title,
      blog.content AS content,
      blog.isHot AS isHot,
      blog.countLike AS countLike,
      blog.countView AS countView,
      blog.createdAt AS createdAt,
      blog.updatedAt AS updatedAt,
      blogimage.imageURL AS blogImgURL,
      blogcomment.userId AS userCmtId,
      blogcomment.content AS userCmtContent,
      blogcomment.rating AS userCmtRating,
      blogcomment.updatedAt AS userCmtTime
      FROM blog
      LEFT JOIN user ON blog.userId = user.id
      LEFT JOIN blogimage ON blog.id = blogimage.blogId
      LEFT JOIN blogcomment ON blog.id = blogcomment.blogId
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
      blog.id AS blogId,
      blog.userId AS userId,
      user.fullname AS userFullname,
      blog.title AS title,
      blog.content AS content,
      blog.isHot AS isHot,
      blog.countLike AS countLike,
      blog.countView AS countView,
      blog.createdAt AS createdAt,
      blog.updatedAt AS updatedAt
      FROM blog
      LEFT JOIN user ON blog.userId = user.id
      WHERE blog.id > 1
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
      blog.id AS blogId,
      blog.userId AS userId,
      user.fullname AS userFullname,
      blog.title AS title,
      blog.content AS content,
      blog.isHot AS isHot,
      blog.countLike AS countLike,
      blog.countView AS countView,
      blog.createdAt AS createdAt,
      blog.updatedAt AS updatedAt
      FROM blog
      LEFT JOIN user ON blog.userId = user.id
      WHERE blog.id = $id
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
      blog.id AS blogId,
      blogcomment.userId AS userCmtId,
      user.fullname AS userCmtFullname,
      user.avatarURL AS userCmtAvt,
      blogcomment.content AS userCmtContent,
      blogcomment.rating AS userCmtRating,
      blogcomment.updatedAt AS userCmtTime,
      blogcomment.id AS cmtId
      FROM blogcomment
      LEFT JOIN blog ON blog.id = blogcomment.blogId
      LEFT JOIN user ON user.id = blogcomment.userId
      WHERE blog.id = $id
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
      blog.id AS blogId,
      blogimage.imageURL AS blogImgURL
      FROM blog
      LEFT JOIN blogimage ON blog.id = blogimage.blogId
      WHERE blog.id = $id
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
      blog.id AS blogId,
      blog.userId AS userId,
      user.fullname AS userFullname,
      blog.title AS title,
      blog.content AS content,
      blog.isHot AS isHot,
      blog.countLike AS countLike,
      blog.countView AS countView,
      blog.createdAt AS createdAt,
      blog.updatedAt AS updatedAt
      FROM blog
      LEFT JOIN user ON blog.userId = user.id
      WHERE blog.updatedAt > date_sub(now(), interval 1 week) 
      AND blog.isHot = 1 
      AND blog.id > 1
      AND blog.countLike = (SELECT MAX(blog.countLike) FROM blog)
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
      INNER JOIN blog ON blogimage.blogId = blog.id
      WHERE blogimage.blogID = 1";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
  public function getImageHelpById(int $id)
  {
    try {
      $sql = "SELECT blogimage.id AS id, blogimage.imageURL AS imageURL FROM blogimage WHERE blogimage.blogId = $id";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
}
