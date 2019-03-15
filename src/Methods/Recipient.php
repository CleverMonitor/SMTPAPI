<?php

namespace CleverMonitor\SmtpApi\Methods;

use CleverMonitor\SmtpApi\Exceptions\NotImplementedException;

/**
 * CleverMonitor Developers
 *
 * Recipient
 * @author CleverMonitor <support@clevermonitor.com>
 */
class Recipient extends Base {

	/**
	 * Statistics of selected recipient
	 * @param string $email
	 * @return \CleverMonitor\SmtpApi\Connection\Response
	 */
	public function getStats($email) {
		throw new NotImplementedException();
	}

}
