<?php

namespace App;

use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class Chat implements MessageComponentInterface
{
    public function onOpen(ConnectionInterface $connection)
    {

    }

    public function onMessage(ConnectionInterface $connection, $message)
    {

    }

    public function onClose(ConnectionInterface $connection)
    {

    }

    public function onError(ConnectionInterface $connection, Exception $e)
    {
      $connection->close();
    }
}
