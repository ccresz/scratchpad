<?php

	namespace Email;
	class EmailDataAdapter {

		function emailSent( $email, $message ): void {
			// Save the email and message to the database
			//check if email is already in the database

			$email_query = "SELECT email FROM sent_email
             JOIN users ON sent_email.email = users.email
             WHERE email = :email";
			$stmt = $this->getSlave()->prepare($sql);
			$stmt->execute([
				'campaign_id' => $campaign_id,
				'rider_id'    => $rider_id
			]);

			$email =  $stmt->fetchAll();
			
			if ( $email == $email ) {
				//if email is in the database, update the message
			} else {
				//if email is not in the database, insert it
			}
			//if email is not in the database, insert it

		}
	}