<?php

namespace Views;

class UserView extends BaseView
{
  protected function processRenderBody(array $data = [])
  {
    if (isset($data['alert'])) {
      $alert = $data['alert'];
      $this->renderStaticAlert($alert['title'], $alert['text'], $alert['type']);
    }
    require 'components/loginForm/loginForm.php';
  }

  protected function processRenderProfile(array $data = [])
  {
    if (isset($data['user'])) {
      $user = $data['user'];
      require('pages/users/userProfile.php');
    }
  }

  protected function processRenderUpdateProfile(array $data = [])
  {
    if (isset($data['user'])) {
      $user = $data['user'];
      require('pages/users/userUpdateProfile.php');
    }
  }

  protected function processRenderChangespw(array $data = [])
  {
    if (isset($data['alert'])) {
      $alert = $data['alert'];
      $this->renderStaticAlert($alert['title'], $alert['text'], $alert['type']);
    }
    require('components/users/changePassword.php');
  }
  public function renderChangepw(array $data = [])
  {
    $this->processRenderHeaderHTML();
    $this->processRenderHeader($data);
    $this->processRenderChangespw($data);
    $this->processRenderFooter($data);
    $this->processRenderFooterHTML();
  }

  public function renderProfile(array $data = [])
  {
    $this->processRenderHeaderHTML();
    $this->processRenderHeader($data);
    $this->processRenderProfile($data);
    $this->processRenderFooter($data);
    $this->processRenderFooterHTML();
  }

  public function renderUpdateProfile(array $data = [])
  {
    $this->processRenderHeaderHTML();
    $this->processRenderHeader($data);
    $this->processRenderUpdateProfile($data);
    $this->processRenderFooter($data);
    $this->processRenderFooterHTML();
  }
}
