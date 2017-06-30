<?php

	namespace CleverMonitor\SmtpApi\Methods;

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
		 */
		public function createGroup($name, $description = NULL) {
			$data = [
				'name' => $name,
				'description' => $description
			];
			$curl = $this->connection->post('group', $data);
			return $curl;
		}
		
		/**
		 * Overview of groups
		 * @param int $count
		 * @param int $offset
		 * @return \CleverMonitor\SmtpApi\Connection\Response
		 */
		public function getOverview($count = 100, $offset = 0) {
			$query = [
				'count' => $count,
				'offset' => $offset
			];
			$curl = $this->connection->get('group', $query);
			return $curl;
		}
		
		/**
		 * Delete group
		 * @param string $code
		 * @param string $move 
		 * @return \CleverMonitor\SmtpApi\Connection\Response
		 */
		public function deleteGroup($code, $move = NULL) {
			$curl = $this->connection->delete('group/'.$code, ['move' => $move]);
			return $curl;
		}
		
	}
