<?php

$site['structure']      = 'PopojiCMS';
$site['ver']            = '1.3';
$site['build']          = '0';
$site['release']        = '09 Februari 2015';

$site['title']          = "Merah Putih";
$site['url']            = "http://defik.tpl/";
$site['adm']            = "{$site['url']}po-admin/";
$site['con']            = "{$site['url']}po-content/";
$site['lib']            = "{$site['url']}po-library/";

$dir['root']            = "E:/ex/migiriloyo/"; 
$dir['adm']             = "{$dir['root']}po-admin/";
$dir['con']             = "{$dir['root']}po-content/";
$dir['lib']             = "{$dir['root']}po-library/";

define('PO_DIRECTORY_PATH_ADM', $dir['adm']);
define('PO_DIRECTORY_PATH_CON', $dir['con']);
define('PO_DIRECTORY_PATH_LIB', $dir['lib']);

$db['host']             = "localhost";
$db['sock']             = "";
$db['port']             = "";
$db['user']             = "root";
$db['passwd']           = "";
$db['db']               = "defik";

define('DATABASE_HOST', $db['host']);
define('DATABASE_SOCK', $db['sock']);
define('DATABASE_PORT', $db['port']);
define('DATABASE_USER', $db['user']);
define('DATABASE_PASS', $db['passwd']);
define('DATABASE_NAME', $db['db']);

if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
    error_reporting(E_ALL & ~E_NOTICE);
?>