<?php
/**
 * TransactionMailStatusEnum
 * @package CleverMonitor\SmtpApi\Enums
 * @author Jan Žahourek <jan.zahourek@clevermonitor.com>
 * @created 22.02.2019 10:54
 */

namespace CleverMonitor\SmtpApi\Enums;


class TransactionMailStatusEnum {

	/** TM received from client */
	const RECEIVED = 'RECEIVED';
	/** TM was sent */
	const SENT = 'SENT';
	/** TM was opened */
	const OPENED = 'OPENED';
	/** TM was clicked through */
	const CLICKED = 'CLICKED';
	/** TM was bounced */
	const BOUNCED = 'BOUNCED';
	/** TM resulted in error */
	const ERROR = 'ERROR';
}
