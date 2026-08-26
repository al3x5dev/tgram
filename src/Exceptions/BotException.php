<?php

namespace Mk4U\TGram\Exceptions;

/**
 * BotException Class
 */
class BotException extends \ErrorException
{
    public ?int $retryAfter = null;
}
