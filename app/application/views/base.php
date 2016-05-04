<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no, maximum-scale=1, user-scalable=no">
    <title><?php if(isset($title)){ echo $title;}else{ echo "untitle";} ?></title>
    <link type="text/css" rel="stylesheet" href="/public/lib/bootstrap-3.3.5/dist/css/bootstrap.min.css">
    <?php foreach($css as $value) { ?> <link type="text/css" rel="stylesheet" href="<?php echo $value; ?>"><?php } ?>
</head>
<body>

<div class="container">
    <h1><?php echo $message;?></h1>
</div>

<script src="/public/lib/js/jquery-1.12.0.min.js"></script>
<script src="/public/lib/bootstrap-3.3.5/dist/js/bootstrap.min.js"></script>
<?php foreach($js as $value) { ?> <script src="<?php echo $value;?>"></script> <?php } ?>
</body>
</html>