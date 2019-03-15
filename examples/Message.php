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

/** @todo Warning! Change the implementation! CleverAIM has only Authorization Token! */
$cmApi = new \CleverMonitor\SmtpApi\Methods\Message('Your Token');


/**
 * Send transactional message
 */
$object = new \CleverMonitor\SmtpApi\Objects\Message('My Transaction Message', 'my-group');

$object->setSender('sender@my-company.com', 'MyCompany');

$object->setContent('test mail content');

$object->addRecipient('john.doe@example.com');

$message = $cmApi->sendMessage($object);

$httpResponseCode = $message->getStatusCode();
/** @todo Warning! Do not return the entire response, just id! */
$httpResponseData = $message->getData();

print_r($httpResponseCode);
print_r($httpResponseData);

/**
 * List of transactional messages in client's profile
 * @todo Warning! Returns a different response.
 */
$message = $cmApi->getOverview(10,0, \CleverMonitor\SmtpApi\Enums\TransactionMailStatusEnum::SENT);

$httpResponseCode = $message->getStatusCode();
$httpResponseData = $message->getData();

print_r($httpResponseCode);
print_r($httpResponseData);

/**
 * Detail of transactional message
 * @todo Warning! Returns a different response.
 */
$message = $cmApi->getDetail('c5dde719-c196-45b4-85b5-0aa7f9b03e5c');

$httpResponseCode = $message->getStatusCode();
$httpResponseData = $message->getData();

print_r($httpResponseCode);
print_r($httpResponseData);
//
///**
// * Message content
// * @deprecated NOT IMPLEMENTED!!!
// */
//$message = $cmApi->getContent('58db989af342cb3124002047');
//
//$httpResponseCode = $message->getStatusCode();
//$httpResponseData = $message->getData();
//
//print_r($httpResponseCode);
//print_r($httpResponseData);
//
///**
// * Delete transactional message
// * @deprecated NOT IMPLEMENTED!!!
// */
//$message = $cmApi->deleteMessage('58db989af342cb3124002047');
//
//$httpResponseCode = $message->getStatusCode();
//$httpResponseData = $message->getData();
//
//print_r($httpResponseCode);
//print_r($httpResponseData);

