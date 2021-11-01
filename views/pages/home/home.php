<h1>HOME PAGE</h1>
<h2>Data: <?php print_r($data) ?></h2>
<h2>GET Param: <?php print_r($_GET) ?> </h2>
<?php
require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/home/bannerscroll.php');
?>