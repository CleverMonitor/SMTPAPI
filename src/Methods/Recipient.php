<?php

	namespace CleverMonitor\SmtpApi\Methods;

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
			$curl = $this->connection->get('recipient/'.$email.'/stats');
			return $curl;
		}
		
	}
