<?php

class PHP_Email_Form {
  public $to;
  public $from_name;
  public $from_email;
  public $subject;
  public $ajax;
  private $messages = [];

  public function add_message($content, $label, $length_check = 0) {
    if (!empty($content) && strlen($content) >= $length_check) {
      $this->messages[] = "$label: $content";
    }
  }

  public function send() {
    $headers = "From: " . $this->from_name . " <" . $this->from_email . ">\r\n";
    $headers .= "Reply-To: " . $this->from_email . "\r\n";
    $message_body = implode("\n", $this->messages);

    if (mail($this->to, $this->subject, $message_body, $headers)) {
      return 'OK';
    } else {
      return 'Failed to send email.';
    }
  }
}