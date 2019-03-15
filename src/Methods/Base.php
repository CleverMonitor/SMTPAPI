<?php namespace CleverMonitor\SmtpApi\Methods;

use CleverMonitor\SmtpApi\Connection\Connection;

/**
 * CleverMonitor Developers
 *
 * BASE
 * @author CleverMonitor <support@clevermonitor.com>
 */
abstract class Base {

	/**
	 * Connection
	 * @var Connection
	 */
	protected $connection;

	public function __construct($token) {
		$this->connection = new Connection($token);
	}

	public function getConnection() {
		return $this->connection;
	}
}
