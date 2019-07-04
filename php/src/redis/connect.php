<?php

function connect_redis() {
	$ip = '127.0.0.1';
	$port = 6379;
	$redis = new Redis();
	$redis->connect($ip, $port);
	return $redis;
}

