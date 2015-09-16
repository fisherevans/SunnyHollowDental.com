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



function fixRelativeLinks($content)
{
    global $url;
    return preg_replace('/(href|src)="\/([a-zA-Z0-9])/', '${1}="' . $url . '/${2}', $content);
}

$app->bind("/", function () use ($app) {
    return $app->render('views/util/region_content.php with layout.php', [
        'title' => 'Home',
        'regionName' => 'Home Page',
        'currentPage' => ''
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