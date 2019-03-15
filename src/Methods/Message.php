<?php

namespace CleverMonitor\SmtpApi\Methods;

use CleverMonitor\SmtpApi\Exceptions\NotImplementedException;

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
		$connection = $this->connection->createForTM();
		$curl = $connection->post('tm', $object->getData());
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
		$data = [
			"paginator" => [
				'length' => $count,
				'offset' => $offset
			]
		];

		$filter = [
			"and" => []
		];

		if ($status !== null) {
			$filter['and'][] = [
				'or' => [
					[
						"field" => [
							"status" => [
								"EQ" => $status
							]
						]
					]
				]
			];
		}

		if ($group !== null) {
			$filter['and'][] = [
				'or' => [
					[
						"field" => [
							"messageId" => [
								"EQ" => $group
							]
						]
					]
				]
			];
		}

		if ($status !== null || $group !== null) {
			$data['filter'] = $filter;
		}

		$curl = $this->connection->post('tm/overview', $data);
		return $curl;
	}

	/**
	 * Detail of transactional message
	 * @param string $id
	 * @return \CleverMonitor\SmtpApi\Connection\Response
	 */
	public function getDetail($id) {
		$curl = $this->connection->get(sprintf('tm/%s/detail', $id));
		return $curl;
	}

	/**
	 * Message content
	 * @param string $id
	 * @return \CleverMonitor\SmtpApi\Connection\Response
	 * @deprecated Not Implemented
	 * @throws NotImplementedException
	 */
	public function getContent($id) {
		throw new NotImplementedException();
	}

	/**
	 * Delete transactional message
	 * @param string $id
	 * @return \CleverMonitor\SmtpApi\Connection\Response
	 * @deprecated Not Implemented
	 * @throws NotImplementedException
	 */
	public function deleteMessage($id) {
		throw new NotImplementedException();
	}

}
