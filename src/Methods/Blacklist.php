<?php

namespace CleverMonitor\SmtpApi\Methods;

use CleverMonitor\SmtpApi\Exceptions\NotImplementedException;

/**
 * CleverMonitor Developers
 *
 * Blacklist Overview
 * @author CleverMonitor <support@clevermonitor.com>
 */
class Blacklist extends Base {

	/**
	 * Blacklist overview
	 * @param int $count
	 * @param int $offset
	 * @return \CleverMonitor\SmtpApi\Connection\Response
	 * @deprecated Not Implemented
	 * @throws NotImplementedException
	 */
	public function getOverview($count = 100, $offset = 0) {
		throw new NotImplementedException();
	}

	/**
	 * Blacklist detail
	 * @param string $email
	 * @param int $offset
	 * @return \CleverMonitor\SmtpApi\Connection\Response
	 * @deprecated Not Implemented
	 * @throws NotImplementedException
	 */
	public function getDetail($email) {
		throw new NotImplementedException();
	}

	/**
	 * Remove email from Blacklist
	 * @param string $email
	 * @return \CleverMonitor\SmtpApi\Connection\Response
	 * @deprecated Not Implemented
	 * @throws NotImplementedException
	 */
	public function deleteBlacklist($email) {
		throw new NotImplementedException();
	}

}
