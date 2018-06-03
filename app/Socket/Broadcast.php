<?php

namespace App\Socket;

use App\Events\Event;

class Broadcast
{
  protected $event;

  protected $clients;

  public function __construct(Event $event, array $clients)
  {
    $this->event = $event;
    $this->clients = $clients;
  }

  public function toAll()
  {
    echo 'broadcast to all';
  }
}
