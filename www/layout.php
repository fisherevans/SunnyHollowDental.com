<?php
    global $url;
    $title = (isset($title) ? $title . ' | ' : '') . 'Sunny Hollow Dental';
?><!DOCTYPE html>
<html>
<head>
    <!-- Meta-Data -->
    <title><?=$title?></title>
    <!-- Styling -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:100,300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="lib/flaticon/flaticon.css">
    <link href="style.php/combined.scss" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="wrapper">
    <div class="header">
        <img class="browser-banner" src="img/banner.png" alt="Sunny Hollow Dental Banner" />
        <div class="mobile-banner">
            <img class="mobile-logo" src="img/mobile-logo.png" alt="SHD Logo" />
            <img class="mobile-text" src="img/mobile-text.png" alt="Sunny Hollow Dental" />
            <div class="mobile-nav-toggle fadeColors noUserSelect">
                <div class="show-nav flaticon-menu48 fadeColors"></div>
                <div class="hide-nav flaticon-delete30 fadeColors"></div>
            </div>
        </div>
    </div>
    <div class="navigation">
        <div class="element first"><a href="<?=$url?>/">Home</a></div>
        <div class="element"><a href="<?=$url?>/news">News</a></div>
        <div class="element">
            <a href="<?=$url?>/our-office">Our Office</a>
            <div class="sub-tree sub-tree-3">
                <a href="<?=$url?>/meet-the-staff">Meet the Staff</a>
                <a href="<?=$url?>/meet-the-dr">Meet the Doctor</a>
                <a href="<?=$url?>/photo-gallery">Photo Gallery</a>
            </div>
        </div>
        <div class="element"><a href="<?=$url?>/the-practice">The Practice</a></div>
        <div class="element"><a href="<?=$url?>/patient-info">Patient Info</a></div>
        <div class="element last"><a href="<?=$url?>/contact-us">Contact Us</a></div>
    </div>
    <div class="page">
        <div class="content">
            <?=$content_for_layout?>
        </div>
        <div class="footer">

        </div>
    </div>
</div>
<!-- External Script Resources -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- Internal Script Resources -->
<script src="js/script.js"></script>
</body>
</html>
