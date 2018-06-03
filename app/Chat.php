<?php

namespace App;

use Exception;
use App\ChatEventsTrait;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class Chat implements MessageComponentInterface
{
    use ChatEventsTrait;
    
    protected $clients;

    protected $users;

    public function onOpen(ConnectionInterface $connection)
    {
      $this->clients[$connection->resourceId] = $connection;
    }

    public function onMessage(ConnectionInterface $connection, $message)
    {
      $payload = json_decode($message);

      if (method_exists($this, $method = 'handle' . ucfirst($payload->event))) {
        $this->{$method}($connection, $payload);
      }
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
