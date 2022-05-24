<?php
require 'db/config.php';
require 'db/admin.php';
require 'db/info.php';
require 'db/course.php';
require 'db/student.php';
require 'lib/data.php';
require 'lib/url.php';
require 'lib/template.php';
require 'lib/info.php';
require 'lib/admin.php';

session_start();
ob_start();


$list_info = list_info();
$list_student = list_student();
$list_course = list_course();

$page = !empty($_GET['page']) ? $_GET['page'] : 'homeadmin';

$path = "page/{$page}.php";

if (!is_login_admin() && $page != 'loginadmin') {
    redict_to("?page=loginadmin");
}

if (file_exists($path)) {
    require $path;
} else {

    require 'inc/404.php';
}
