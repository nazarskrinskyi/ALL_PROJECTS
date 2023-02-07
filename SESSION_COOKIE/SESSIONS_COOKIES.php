<?php

use OOP\SESSION_COOKIE\CookieShell;
use OOP\SESSION_COOKIE\SessionShell;

require "../../composer/vendor/autoload.php";
/** cookies on the client side
 * COOKIE => TEXT FILES CREATED BY SITE
 * AND STORED ON USER'S PC
 * - COOKIES STORAGE IN BROWSERS MEMORY HOLDERS
 * COOKIE USES FOR:
 * 1)AUTHENTICATION ON SITE
 * 2)FOR STORAGE PERSONAL USER'S SETTINGS
 * 3)TO CHECK STATE OF USER'S SESSION
 * 4)FOR MAKING SOME STATISTIC ABOUT USER
 */
/**
 * SESSIONS MAIN AIM =>
 * 1.(TO TRANSPORT DATA FROM PAGE TO PAGE)
 * 2.(STORE VALUE OF VARIABLE DURING TRAVEL
 * TO ANOTHER PAGE)
 */
/*setcookie("name",'Alex',time() - 3600,'../ADD_TO_WEB.php');
var_dump($_COOKIE);*/
#  $_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;
$cookie = new CookieShell();
//$cookie->setCookie('counter', 0, time() + 3600);
#$cookie->delCookie('counter');
/*echo 'counter = ' . $cookie->counter();
print_r($_COOKIE);*/


/**SESSION*/

$session = new SessionShell();
#$session->SetSession('name','Nazar');
#echo $session->GetSession('name') . "<br>";
#$session->DelSession('name');
$session->destroy();
var_dump($_SESSION);
