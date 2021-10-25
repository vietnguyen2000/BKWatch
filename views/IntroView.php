<?php

namespace Views;

class IntroView extends BaseView
{
  protected function processRenderBody(array $data = [])
  {
    require 'components/introduction/introPage.php';
  }
}
