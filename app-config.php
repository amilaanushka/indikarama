<?php

$config = array(
    'database' => array(
        'host' => 'localhost',
        'name' => 'indikarama',
        'user' => 'root',
        'pass' => '',
    ),
    'mail' => array(
        'provider' => 'smtp', //  smtp | sendmail | mail - PHP mail() function
        'smtp' => array(
            'debug'     => 0, // (0 = off (for production use) | 1 = client messages | 2 = client and server messages)
            'host'      => 'smtp.mailgun.org',
            'port'      => 465,
            'secure'    => 'ssl',
            'auth'      => true,
            'username'  => 'postmaster@mg.enfection.com',
            'password'  => '0a588dff2192f71a3e95cfdb8a2b3c0e',
        ),
        'from' => array(
            'noreply@enfection.com', 'Enfection'
        ),
        'to'   => array(
            // 'nilaksha@enfection.com'     => 'Nilaksha',
            // 'rashan@enfection.com'     => 'Rashan',
            'anushka@enfection.com'     => 'Anushka',
            'leads@enfection.com'     => 'Leads',
        ),
        'cc' => array(
            //'leads@enfection.com'
        ),
       
    ),
);

// DB Connection Settings

define("DB_HOST", $config['database']['host']);
define("DB_NAME", $config['database']['name']);
define("DB_USER", $config['database']['user']);
define("DB_PASS", $config['database']['pass']);

// SET Local Timezone

date_default_timezone_set('Asia/Colombo');

function cleanXSS($var){
    if(!is_string($var) && is_int($var)){
        return $var;
    }
    return htmlentities(strip_tags($var), ENT_QUOTES, "UTF-8");
}

if(isset($_POST) && count($_POST) > 0){
    $_POST = array_map("cleanXSS", $_POST);
}

if(isset($_GET) && count($_GET) > 0){
    $_GET = array_map("cleanXSS", $_GET);
}

?>