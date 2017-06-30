<?php

/**
 * CleverMonitor Developers
 *
 * CleverMonitor REST API Example
 * Message
 *
 * @author CleverMonitor <support@clevermonitor.com>
 */

require __DIR__ . '/../vendor/autoload.php';

$cmApi = new \CleverMonitor\SmtpApi\Methods\Message('Your ID', 'Your Token');


/**
 * Send transactional message
 */
$object = new \CleverMonitor\SmtpApi\Objects\Message('My Transaction Message', 'my-group');

$object->setSender('sender@my-company.com', 'MyCompany');

$object->setContent('<html>{{ socks_size }}</html>');

$object->addRecipient('john.doe@example.com', ['socks_size' => 42]);

$message = $cmApi->sendMessage($object);

$httpResponseCode = $message->getStatusCode();
$httpResponseData = $message->getData();

print_r($httpResponseCode);
print_r($httpResponseData);

/**
 * List of transactional messages in client's profile
 */
$message = $cmApi->getOverview();

$httpResponseCode = $message->getStatusCode();
$httpResponseData = $message->getData();

print_r($httpResponseCode);
print_r($httpResponseData);

/**
 * Detail of transactional message
 */
$message = $cmApi->getDetail('58db989af342cb3124002047');

$httpResponseCode = $message->getStatusCode();
$httpResponseData = $message->getData();

print_r($httpResponseCode);
print_r($httpResponseData);

/**
 * Message content
 */
$message = $cmApi->getContent('58db989af342cb3124002047');

$httpResponseCode = $message->getStatusCode();
$httpResponseData = $message->getData();

print_r($httpResponseCode);
print_r($httpResponseData);

/**
 * Delete transactional message
 */
$message = $cmApi->deleteMessage('58db989af342cb3124002047');

$httpResponseCode = $message->getStatusCode();
$httpResponseData = $message->getData();

print_r($httpResponseCode);
print_r($httpResponseData);

