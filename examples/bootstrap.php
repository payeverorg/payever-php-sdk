<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/functions.php';

/**
* Initialize the payever API library with your API keys.
* See: https://docs.payever.org/api/payments/v3/getting-started-v3/authentication
*/

$clientId = '2746_6abnuat5q10kswsk4ckk4ssokw4kgk8wow08sg0c8csggk4o00';
$clientSecret = '2fjpkglmyeckg008oowckco4gscc4og4s0kogskk48k8o8wgsc';
$businessUuid = '815c5953-6881-11e7-9835-52540073a0b6';

$clientConfiguration = new \Payever\Sdk\Core\ClientConfiguration();
$clientConfiguration
    ->setChannelSet(\Payever\Sdk\Core\Enum\ChannelSet::CHANNEL_SHOPWARE)
    ->setApiMode(\Payever\Sdk\Core\ClientConfiguration::API_MODE_SANDBOX)
    ->setClientId($clientId)
    ->setClientSecret($clientSecret)
    ->setBusinessUuid($businessUuid);

$paymentsApiClients = new \Payever\Sdk\Payments\PaymentsApiClient($clientConfiguration);
