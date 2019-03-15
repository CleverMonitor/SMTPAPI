<?php namespace CleverMonitor\SmtpApi\Objects;

use CleverMonitor\SmtpApi\Exceptions\NotImplementedException;

/**
 * CleverMonitor Developers
 *
 * Transaction message object
 * @author CleverMonitor <support@clevermonitor.com>
 */
class Message {

	const        CONTENT_HTML = 'html',
		CONTENT_PLAINTEXT = 'plaintext';

	/**
	 * Subject
	 * @var string
	 */
	protected $subject;

	/**
	 * Content
	 * @var array
	 */
	protected $content = [];

	/**
	 * Sender
	 * @var array
	 */
	protected $sender;

	/**
	 * Recipients
	 * @var array
	 */
	protected $recipients = null;

	/**
	 * Attachments
	 * @var array
	 */
	protected $attachments;

	/**
	 * Group
	 * @var string
	 */
	protected $group;

	public function __construct($subject, $group = NULL) {
		$this->subject = $subject;
		$this->group = $group;
	}

	/**
	 * Set content
	 * @param string $body
	 * @param string $text
	 * @param string $type NOT SUPPORTED
	 * @return Message
	 */
	public function setContent($body, $text = NULL, $type = self::CONTENT_HTML) {
		$this->content = [
			//'type' => $type,
			'htmlBody' => $body,
			'plainTextBody' => $text
		];

		return $this;
	}

	/**
	 * Set sender
	 * @param string $email
	 * @param string $name
	 * @return Message
	 */
	public function setSender($email, $name = NULL) {
		$this->sender = [
			'email' => $email,
		];
		if ($name)
			$this->sender['name'] = $name;

		return $this;
	}

	/**
	 * Add Recipient
	 * @param string $email
	 * @param array $fields NOT SUPPORTED
	 * @param bool $create NOT SUPPORTED
	 * @return Message
	 * @throws NotImplementedException
	 */
	public function addRecipient($email, $fields = [], $create = FALSE) {
		if ($this->recipients != null) {
			throw new NotImplementedException('It is possible to enter only one recipient.');
		}
		$this->recipients = $email;
//			$this->recipients[] = [
//				'email' => $email,
//				'fields' => $fields,
//				'create' => $create
//			];

		return $this;
	}

	/**
	 * Add attachment
	 * @param string $name
	 * @param string $content
	 * @param string $content_type
	 * @return Message
	 */
	public function addAttachment($name, $content, $content_type = null) {
		$this->attachments[] = [
			//'type' => 'file',
			'filename' => $name,
			//'crc' => md5($content),
			'content' => base64_encode($content),
			//'content_type' => $content_type
		];

		return $this;
	}

	/**
	 * Get data array
	 * @return array
	 */
	public function getData() {
		$object = [
			'subject' => $this->subject,
			'from' => $this->sender,
			'to' => $this->recipients,
			'htmlBody' => isset($this->content['htmlBody']) ? $this->content['htmlBody'] : null,
			'plainTextBody' => isset($this->content['plainTextBody']) ? $this->content['plainTextBody'] : null,
		];

		if ($this->group)
			$object['messageId'] = $this->group;

		if (!empty($this->attachments))
			$object['attachments'] = $this->attachments;

		return $object;
	}
}
