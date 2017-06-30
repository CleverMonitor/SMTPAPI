<?php

/**
 * CleverMonitor Developers
 *
 * CleverMonitor REST API Example
 * Recipient
 *
 * @author CleverMonitor <support@clevermonitor.com>
 */

require __DIR__ . '/../vendor/autoload.php';

$cmApi = new \CleverMonitor\SmtpApi\Methods\Recipient('Your ID', 'Your Token');

/**
 * Statistics of selected recipient
 */
$group = $cmApi->getStats('john.doe@example.com');

$httpResponseCode = $group->getStatusCode();
$httpResponseData = $group->getData();

print_r($httpResponseCode);
print_r($httpResponseData);
