<?php

namespace CleverMonitor\SmtpApi\Methods;

use CleverMonitor\SmtpApi\Exceptions\NotImplementedException;

/**
 * CleverMonitor Developers
 *
 * Transaction Message Groups
 * @author CleverMonitor <support@clevermonitor.com>
 */
class Groups extends Base {

	/**
	 * Create group
	 * @param string $name
	 * @param string $description
	 * @return \CleverMonitor\SmtpApi\Connection\Response
	 * @deprecated Not Implemented
	 * @throws NotImplementedException
	 */
	public function createGroup($name, $description = NULL) {
		throw new NotImplementedException();
	}

	/**
	 * Overview of groups
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
	 * Delete group
	 * @param string $code
	 * @param string $move
	 * @return \CleverMonitor\SmtpApi\Connection\Response
	 * @deprecated Not Implemented
	 * @throws NotImplementedException
	 */
	public function deleteGroup($code, $move = NULL) {
		throw new NotImplementedException();
	}

}
