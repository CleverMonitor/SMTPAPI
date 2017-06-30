<?php

	namespace CleverMonitor\SmtpApi\Methods;

	/**
	 * CleverMonitor Developers
	 *
	 * Transaction Message
	 * @author CleverMonitor <support@clevermonitor.com>
	 */

	class Message extends Base {
		
		/**
		 * Send transactional message
		 * @param \CleverMonitor\SmtpApi\Objects\Message $object
		 * @return \CleverMonitor\SmtpApi\Connection\Response
		 */
		public function sendMessage(\CleverMonitor\SmtpApi\Objects\Message $object) {
			$curl = $this->connection->post('message', $object->getData());
			return $curl;
		}
		
		/**
		 * List of transactional messages in client's profile
		 * @param int $count Count of records on page
		 * @param int $offset Records offset
		 * @param string $status Reference: transaction_status
		 * @param string $group Group Code
		 * @return \CleverMonitor\SmtpApi\Connection\Response
		 */
		public function getOverview($count = 100, $offset = 0, $status = NULL, $group = NULL) {
			$query = [
				'count' => $count,
				'offset' => $offset,
				'status' => $status,
				'group' => $group
			];
			$curl = $this->connection->get('message/overview', $query);
			return $curl;
		}
		
		/**
		 * Detail of transactional message
		 * @param string $id
		 * @return \CleverMonitor\SmtpApi\Connection\Response
		 */
		public function getDetail($id) {
			$curl = $this->connection->get('message/'.$id);
			return $curl;
		}
		
		/**
		 * Message content
		 * @param string $id
		 * @return \CleverMonitor\SmtpApi\Connection\Response
		 */
		public function getContent($id) {
			$curl = $this->connection->get('message/'.$id.'/content');
			return $curl;
		}
		
		/**
		 * Delete transactional message
		 * @param string $id
		 * @return \CleverMonitor\SmtpApi\Connection\Response
		 */
		public function deleteMessage($id) {
			$curl = $this->connection->delete('message/'.$id);
			return $curl;
		}
		
	}
