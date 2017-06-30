<?php	namespace CleverMonitor\SmtpApi\Objects;

	/**
	 * CleverMonitor Developers
	 *
	 * Transaction message object
	 * @author CleverMonitor <support@clevermonitor.com>
	 */
	class Message {
		
		const	CONTENT_HTML = 'html',
			CONTENT_PLAINTEXT = 'plaintext';

		/**
		 * Subject
		 * @var string
		 */
		protected $subject;

		/**
		 * Content
		 * @var string 
		 */
		protected $content;

		/**
		 * Sender
		 * @var array
		 */
		protected $sender;

		/**
		 * Recipients
		 * @var array
		 */
		protected $recipients = [];

		/**
		 * Attachments
		 * @var type 
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
		 * @param string $type
		 * @return Message
		 */
		public function setContent($body, $text = NULL, $type = self::CONTENT_HTML) {
			$this->content = [
				'type' => $type,
				'body' => $body,
				'text' => $text
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
				$this->content['name'] = $name;

			return $this;
		}

		/**
		 * Add Recipient
		 * @param string $email
		 * @param array $fields
		 * @param bool $create
		 * @return Message
		 */
		public function addRecipient($email, $fields = [], $create = FALSE) {
			$this->recipients[] = [
				'email' => $email,
				'fields' => $fields,
				'create' => $create
			];

			return $this;
		}

		/**
		 * Add attachment
		 * @param string $name
		 * @param string $content
		 * @param string $content_type
		 * @return Message
		 */
		public function addAttachment($name, $content, $content_type) {
			$this->attachments[] = [
				'type' => 'file',
				'name' => $name,
				'crc' => md5($content),
				'content' => base64_encode($content),
				'content_type' => $content_type
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
				'sender' => $this->sender,
				'recipients' => $this->recipients,
				'content' => $this->content,
			];

			if ($this->group)
				$object['group'] = $this->group;

			if (!empty($this->attachments))
				$object['attachments'] = $this->attachments;

			return $object;
		}
	}