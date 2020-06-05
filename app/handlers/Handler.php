<?php
namespace App\Handlers;

interface Handler {
    function setNext(Handler $handler);
    function handle($request);
}