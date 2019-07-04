<?php
require(dirname(__FILE__) . '/connect.php');
define("KEY_MESSAGES", "messages");
function add_message($time, $author, $content) {
	$redis = connect_redis();
	$data = array(
		"time" => $time,
		"author" => $author,
		"content" => $content
	);
	$data_str = json_encode($data);
	$redis->lPush(KEY_MESSAGES, $data_str);
}

function get_messages($start, $end) {
	$redis = connect_redis();
	$messages = $redis->lRange(KEY_MESSAGES, $start, $end);
	return $messages;
}

function count_messages() {
	$redis = connect_redis();
	return $redis->lLen(KEY_MESSAGES);
}
