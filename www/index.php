<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

if (isset($_SERVER['HTTPS']))
    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
else
    $protocol = 'http';
$url = $protocol . "://" . $_SERVER['HTTP_HOST'];

//include cockpit
include_once('cockpit/vendor/Parsedown.php');
include_once('cockpit/bootstrap.php');

$app = new Lime\App();

$parseDown = new ParsedownExtra();

function get404() {
    global $app, $parseDown;
    $content404 = collection('Static Content')->findOne(['name_slug' => 'page-not-found']);
    $app->response->status = "404";
    $data = [
        'title' => '404 Not Found',
        'staticContent' => fixRelativeLinks($parseDown->text($content404['content'])),
        'currentPage' => '404'
    ];
    return $app->render('views/404.php with layout.php', $data);
}

function getStaticContent($name) {
  global $app, $parseDown;
  $content = collection('Static Content')->findOne(['name_slug' => $name]);
  return $parseDown->text($content['content']);
}

function fixRelativeLinks($content)
{
    global $url;
    return preg_replace('/(href|src)="\/([a-zA-Z0-9])/', '${1}="' . $url . '/${2}', $content);
}

$app->bind("/", function () use ($app) {
  return $app->render('views/util/region_content.php with layout.php', [
      'title' => 'Home',
      'regionName' => 'Home Page'
  ]);
});

$app->bind("/patient-info/forms", function () use ($app) {
  return $app->render('views/util/static_content.php with layout.php', [
      'title' => 'Forms',
      'staticContent' => fixRelativeLinks(getStaticContent('patient-info-forms'))
  ]);
});

$app->bind("/patient-info/education", function () use ($app) {
  return $app->render('views/util/static_content.php with layout.php', [
      'title' => 'Education',
      'staticContent' => fixRelativeLinks(getStaticContent('patient-info-education'))
  ]);
});

$app->bind("/patient-info", function () use ($app) {
  return $app->render('views/util/static_content.php with layout.php', [
      'title' => 'Patient Info',
      'staticContent' => fixRelativeLinks(getStaticContent('patient-info'))
  ]);
});

$app->bind("/our-office/gallery", function () use ($app) {
  return $app->render('views/util/static_content.php with layout.php', [
      'title' => 'Gallery',
      'staticContent' => fixRelativeLinks(getStaticContent('our-office-gallery'))
  ]);
});

$app->bind("/our-office/meet-the-dr", function () use ($app) {
  return $app->render('views/util/static_content.php with layout.php', [
      'title' => 'Meet the Doctor',
      'staticContent' => fixRelativeLinks(getStaticContent('our-office-meet-the-doctor'))
  ]);
});

$app->bind("/our-office/meet-the-staff", function () use ($app) {
  return $app->render('views/util/static_content.php with layout.php', [
      'title' => 'Meet the Staff',
      'staticContent' => fixRelativeLinks(getStaticContent('our-office-meet-the-staff'))
  ]);
});

$app->bind("/our-office", function () use ($app) {
  return $app->render('views/util/static_content.php with layout.php', [
      'title' => 'Our Office',
      'staticContent' => fixRelativeLinks(getStaticContent('our-office'))
  ]);
});

$app->bind("/the-practice/products", function () use ($app) {
  return $app->render('views/util/static_content.php with layout.php', [
      'title' => 'Products',
      'staticContent' => fixRelativeLinks(getStaticContent('the-practice-products'))
  ]);
});

$app->bind("/the-practice/services", function () use ($app) {
  return $app->render('views/util/static_content.php with layout.php', [
      'title' => 'Services',
      'staticContent' => fixRelativeLinks(getStaticContent('the-practice-services'))
  ]);
});

$app->bind("/the-practice", function () use ($app) {
  return $app->render('views/util/static_content.php with layout.php', [
      'title' => 'The Practice',
      'staticContent' => fixRelativeLinks(getStaticContent('the-practice'))
  ]);
});

$app->bind("/contact-us", function () use ($app) {
  return $app->render('views/util/region_content.php with layout.php', [
      'title' => 'Contact Us',
      'regionName' => 'Contact Us'
  ]);
});

$app->bind("*", function () use ($app) {
    return get404();
});

if (isset($_SERVER['ORIG_PATH_INFO']))
    $app->run($_SERVER['ORIG_PATH_INFO']);
else if (isset($_SERVER['REQUEST_URI']))
    $app->run($_SERVER['REQUEST_URI']);
else
    $app->run('/');