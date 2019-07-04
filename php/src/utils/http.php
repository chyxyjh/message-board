<?php
class HttpResponse {
	var $code;
	var $msg;
	var $data;
	
	function __construct($data) {
		$this->code = 200;
		$this->msg = "ok";
		$this->data = $data; 
	}

	function toArray() {
		return array(
			"code" => $this->code,
			"msg" => $this->msg,
			"data" => $this->data
		);
	}
}
