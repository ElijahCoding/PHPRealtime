<?php

namespace App;

use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class Chat implements MessageComponentInterface
{
    protected $clients;

    public function onOpen(ConnectionInterface $connection)
    {
      $this->clients[$connection->resourceId] = $connection;
    }

    public function onMessage(ConnectionInterface $connection, $message)
    {

    }

    public function onClose(ConnectionInterface $connection)
    {
      unset($this->client[$connection->resourceId]);
    }

    public function onError(ConnectionInterface $connection, Exception $e)
    {
      $connection->close();
    }
}
