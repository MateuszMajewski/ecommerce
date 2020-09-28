<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

include "vendor/autoload.php";
    //set Sandbox Environment
    OpenPayU_Configuration::setEnvironment('sandbox');

    //set POS ID and Second MD5 Key (from merchant admin panel)
    OpenPayU_Configuration::setMerchantPosId('300046');
    OpenPayU_Configuration::setSignatureKey('0c017495773278c50c7b35434017b2ca');

    //set Oauth Client Id and Oauth Client Secret (from merchant admin panel)
    OpenPayU_Configuration::setOauthClientId('300046');
    OpenPayU_Configuration::setOauthClientSecret('c8d4b7ac61758704f38ed5564d8c0ae0');

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';
