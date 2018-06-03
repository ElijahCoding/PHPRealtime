<?php

namespace App;

use Ratchet\ConnectionInterface;

trait ChatEventsTrait
{
  protected function handleJoined(ConnectionInterface $connection, $payload)
  {
    $user = $payload->data->user;

    $this->users[$connection->resourceId] = $user;

    foreach ($this->clients as $client) {
      $client->send(json_encode([
        'event' => 'joined',
        'data' => [
          'user' => $payload->data->user
        ]
      ]));
    }
  }
}
