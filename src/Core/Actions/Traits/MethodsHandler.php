<?php

namespace Mk4U\TGram\Core\Actions\Traits;

use Mk4U\TGram\Config;
use Mk4U\TGram\Core\Entities\CallbackQuery;
use Mk4U\TGram\Core\Entities\Message;
use Mk4U\TGram\Core\Methods;

trait MethodsHandler
{
    use Methods;

    protected static array $cachedCommands = [];

    public function reply(string $message, array $params = []): Message
    {
        if (!$active = $this->getActiveEntity()) {
            throw new \RuntimeException("No active entity found.");
        }

        $chat = match (true) {
            $active instanceof Message => $active->chat,
            $active instanceof CallbackQuery => $active->message->resolve()->chat,
            default => $active->chat
        };

        return $this->sender('sendMessage', array_merge([
            'chat_id' => $chat->id,
            'text' => $message,
        ], $params));
    }

    public function isAdmin(): bool
    {
        return in_array(
            $this->getActiveEntity()->from->id ?? null,
            Config::get('admins'),
            true
        );
    }

    public function getActiveEntity(): mixed
    {
        return $this->update->__get($this->update->type());
    }

    protected function getAllCommands(): array
    {
        if (empty(self::$cachedCommands)) {
            $json = json_decode(file_get_contents(base('storage/commands.json')), true);
            self::$cachedCommands = is_array($json) ? $json : throw new \RuntimeException("Error in commands.json: " . json_last_error_msg());
        }
        return self::$cachedCommands;
    }

    public function executeCommand(string $command, array $args = []): void
    {
        if (!key_exists($command, $this->getAllCommands())) {
            throw new \InvalidArgumentException("Error: Command '$command' does not exist.");
        }

        $cmd = new self::$cachedCommands[$command]($this->update);
        if (!empty($args)) $cmd->setArgs($args);
        $cmd->execute();
    }
}
