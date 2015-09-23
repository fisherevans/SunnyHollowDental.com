<?php
    function startsWith($haystack, $needle) {
      $result = substr($haystack, 0, strlen($needle)) === $needle;
      return $result;
    }
    function createNavLink($link, $text) {
      $class = startsWith($_SERVER['REQUEST_URI'], $link) ? "current" : "";
      return "<a class='" . $class . "' href='" . $link . "'>" . $text . "</a>";
    }
?><!DOCTYPE html>
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
      <img class="mobile-text" src="/img/mobile-text.png" alt="Sunny Hollow Dental Text" />
      <img class="mobile-hills" src="/img/mobile-hills.png" alt="Sunny Hollow Dental Hills" />
      <div class="mobile-nav-toggle fade-colors no-user-select">
        <div class="show-nav flaticon-menu48 fade-colors"></div>
        <div class="hide-nav flaticon-delete30 fade-colors"></div>
      </div>
    </div>
  </div>
  <div class="navigation">
    <div class="element first"><?=createNavLink("/home", "Home")?></div>
    <div class="element"><?=createNavLink("/news", "News")?></div>
    <div class="element">
      <?=createNavLink("/our-office", "Our Office")?>
      <div class="sub-tree sub-tree-3">
        <?=createNavLink("/our-office/meet-the-staff", "Meet the Staff")?>
        <?=createNavLink("/our-office/photo-gallery", "Photo Gallery")?>
      </div>
    </div>
    <div class="element">
      <?=createNavLink("/the-practice", "The Practice")?>
      <div class="sub-tree sub-tree-2">
        <?=createNavLink("/the-practice/services", "Services")?>
        <?=createNavLink("/the-practice/products", "Products")?>
      </div>
    </div>
    <div class="element">
      <?=createNavLink("/patient-info", "Patient Info")?>
      <div class="sub-tree sub-tree-2">
        <?=createNavLink("/patient-info/education", "Education")?>
        <?=createNavLink("/patient-info/forms", "Forms")?>
      </div>
    </div>
    <div class="element last"><?=createNavLink("/contact-us", "Contact Us")?></div>
  </div>
  <div class="page">
    <div class="content">
      <?=$content_for_layout?>
    </div>
    <div class="footer">
      <?php region('Footer') ?>
    </div>
  </div>
</div>
<!-- External Script Resources -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- Internal Script Resources -->
<script src="/js/script.js"></script>
</body>
</html>
