<?php

require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('message_queue', false, false, false, false);

$messageBody = json_encode(['data' => 'Hello, RabbitMQ!']);
$message = new AMQPMessage($messageBody);

$channel->basic_publish($message, '', 'message_queue');

echo " [x] Sent '{$messageBody}'\n";

$channel->close();
$connection->close();
