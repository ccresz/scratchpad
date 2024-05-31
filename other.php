<?php

	use Database\DBConnection;
	use Email\EmailDataAdapter;

	class User {
		public $name;
		public $email;
		public $messages = [];

		function __construct($name, $email) {
			$this->name = $name;
			$this->email = $email;
		}

		function addMessage($message) {
			$this->messages[] = $message;
		}

		function sendEmail($message) {
			mail($this->email, "Notification", $message);
		}

		function sendAllEmails() {
			global $db_master, $db_slave;
			$db_connection = new DBConnection($db_master, $db_slave);

			foreach ($this->messages as $message) {
				$sent = $this->sendEmail($message);
				if($sent ==  true) {
					$email_db_adapter = new EmailDataAdapter();
					$email_db_adapter->emailSent($this->email, $message);
				}
			}
		}
	}
