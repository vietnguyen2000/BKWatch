<?php

use Models\ContactModel;

$contactModel = new ContactModel();
$dataContact = $contactModel->getContact();
$addressData = [];
$phoneData = [];
$emailData = [];
$fbData = "";
$skypeData = "";
$twitterData = "";
$instagramData = "";
foreach ($dataContact as $key => $value) {
  array_push($addressData, $value["address"]);
  array_push($phoneData, $value["phone"]);
  array_push($emailData, $value["email"]);
  $fbData .= $value["facebook"];
  $skypeData .= $value["skype"];
  $twitterData .= $value["twitter"];
  $instagramData .= $value["instagram"];
}
?>
</div>
<footer>
  <style>
    <?php
    ob_start();
    include 'footer.css';
    $file_content = ob_get_contents();
    ob_end_clean();
    echo $file_content
    ?>
  </style>
  <div class=".container-xl">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6">
        <?php require 'footerInfo.php' ?>
      </div>
      <div class="col-12 col-sm-12 col-md-3">
        <?php require 'footerLink.php' ?>
      </div>
      <div class="col-12 col-sm-12 col-md-3">
        <?php require 'footerSupport.php' ?>
      </div>
    </div>
  </div>
</footer>