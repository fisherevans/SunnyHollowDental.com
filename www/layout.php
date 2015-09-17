<!DOCTYPE html>
<html>
<head>
    <!-- Meta-Data -->
    <title><?=(isset($title) ? $title . ' | ' : '') . 'Sunny Hollow Dental'?></title>
    <!-- Styling -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:100,300,400,700">
    <link rel="stylesheet" type="text/css" href="/lib/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="/style.php/combined.scss" />
</head>
<body>
<div class="wrapper">
    <div class="header">
        <img class="browser-banner" src="/img/banner.png" alt="Sunny Hollow Dental Banner" />
        <div class="mobile-banner">
            <img class="mobile-logo" src="/img/mobile-logo.png" alt="SHD Logo" />
            <img class="mobile-text" src="/img/mobile-text.png" alt="Sunny Hollow Dental" />
            <div class="mobile-nav-toggle fade-colors no-user-select">
                <div class="show-nav flaticon-menu48 fade-colors"></div>
                <div class="hide-nav flaticon-delete30 fade-colors"></div>
            </div>
        </div>
    </div>
    <div class="navigation">
        <div class="element first"><a href="/">Home</a></div>
        <div class="element"><a href="/news">News</a></div>
        <div class="element">
            <a href="/our-office">Our Office</a>
            <div class="sub-tree sub-tree-3">
                <a href="/meet-the-staff">Meet the Staff</a>
                <a href="/meet-the-dr">Meet the Doctor</a>
                <a href="/photo-gallery">Photo Gallery</a>
            </div>
        </div>
        <div class="element"><a href="/the-practice">The Practice</a></div>
        <div class="element"><a href="/patient-info">Patient Info</a></div>
        <div class="element last"><a href="/contact-us">Contact Us</a></div>
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
