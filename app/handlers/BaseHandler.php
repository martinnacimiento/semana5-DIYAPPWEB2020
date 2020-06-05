<?php

namespace App\Handlers;

use App\Handlers\Handler;

abstract class BaseHandler implements Handler
{
    private Handler $next;

    public function setNext(Handler $handler)
    {
        $this->next = $handler;
    }

    public function handle($request)
    {
        if ($this->next != null) {
            $this->next->handle($request);
        }
    }
}
