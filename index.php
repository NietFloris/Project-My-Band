<?php

session_start();

 require ('../private/smarty/Smarty.class.php');
 require ('../private/modal.php');
 require ('../private/controller.php');

 $smarty = new Smarty();
 $smarty->setCompileDir('../private/tmp');
 $smarty->setTemplateDir('../private/views');

define('ARTICLES_PER_PAGE',5);

// TERNARY OPERATOR
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$pageno = isset($_GET['pageno']) ? $_GET['pageno'] : '1';
$searchterm = isset($_GET['searchterm']) ? '%'. $_GET['searchterm'] . '%' : '%';

if (isset($_POST['submit_login'])) {
    login_action();
}

//if (isser($_SESSION['loggedin'])) {
//    cms_action();
//    exit();
//}

switch ($page) {
    case 'home': homepage_action($smarty); break;
    case 'news': news_action(); break;
    case 'contact': contact_action(); break;
    case 'albums': albums_action($smarty); break;
    case 'admin' : beheerder_action(); break;
    default: page_not_found_action(); break;
}
