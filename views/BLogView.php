<?php

namespace Views;

class BlogView extends BaseView
{
  protected function processRenderBody(array $data = [])
  {
    require("pages/blog/blogPage.php");
  }
  public function renderBody(array $data = [])
  {
    $this->processRenderHeader($data);
    $this->processRenderBody($data);
    $this->processRenderFooter($data);
  }
  public function renderDetails(array $data = [])
  {
    $this->processRenderHeader($data);
    $this->processRenderDetails($data);
    $this->processRenderFooter($data);
  }
  public function processRenderDetails(array $data = [])
  {
    require("pages/blog/blogDetailsPage.php");
  }
}
