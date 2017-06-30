<?php

	namespace CleverMonitor\SmtpApi\Methods;

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
		 */
		public function getOverview($count = 100, $offset = 0) {
			$query = [
				'count' => $count,
				'offset' => $offset
			];
			$curl = $this->connection->get('blacklist', $query);
			return $curl;
		}
		
		/**
		 * Blacklist detail
		 * @param string $email
		 * @param int $offset
		 * @return \CleverMonitor\SmtpApi\Connection\Response
		 */
		public function getDetail($email) {
			$curl = $this->connection->get('blacklist/'.$email);
			return $curl;
		}
		
		/**
		 * Remove email from Blacklist
		 * @param string $email
		 * @return \CleverMonitor\SmtpApi\Connection\Response
		 */
		public function deleteBlacklist($email) {
			$curl = $this->connection->delete('blacklist/'.$email);
			return $curl;
		}
		
	}
