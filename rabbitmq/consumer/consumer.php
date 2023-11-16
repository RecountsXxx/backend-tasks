<?php

require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('message_queue', false, false, false, false);

echo " [*] Waiting for messages. To exit press Ctrl+C\n";

$callback = function ($message) {
    $data = json_decode($message->body, true);
    echo " [x] Received Data: {$data['data']}\n";
};

$channel->basic_consume('message_queue', '', false, true, false, false, $callback);

while ($channel->is_consuming()) {
    $channel->wait();
}

$channel->close();
$connection->close();
