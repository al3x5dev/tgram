<?php

namespace Mk4U\TGram\Core\Factories\Keyboard;

use Mk4U\TGram\Core\Entities\KeyboardButton;
use Mk4U\TGram\Core\Entities\KeyboardButtonPollType;
use Mk4U\TGram\Core\Entities\KeyboardButtonRequestChat;
use Mk4U\TGram\Core\Entities\KeyboardButtonRequestUsers;
use Mk4U\TGram\Core\Entities\WebAppInfo;
use Mk4U\TGram\Exceptions\BotException;

class ReplyButton implements ButtonInterface
{
    private string $text;
    private array $options = [];

    use StyleTrait;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public static function make(string $text): self
    {
        return new self($text);
    }

    public function requestUsers(KeyboardButtonRequestUsers $request): self
    {
        $this->options['request_users'] = $request;
        return $this;
    }

    public function requestChat(KeyboardButtonRequestChat $request): self
    {
        $this->options['request_chat'] = $request;
        return $this;
    }

    public function requestContact(bool $value = true): self
    {
        $this->options['request_contact'] = $value;
        return $this;
    }

    public function requestLocation(bool $value = true): self
    {
        $this->options['request_location'] = $value;
        return $this;
    }

    public function requestPoll(string $type): self
    {
        if (empty($type)) {
            throw new BotException('Poll type cannot be empty.');
        }
        $this->options['request_poll'] = new KeyboardButtonPollType(['type' => $type]);
        return $this;
    }

    public function webApp(string $url): self
    {
        if (empty($url)) {
            throw new BotException('Url cannot be empty.');
        }
        $this->options['web_app'] = new WebAppInfo(['url' => $url]);
        return $this;
    }

    public function build(): KeyboardButton
    {
        $data = ['text' => $this->text] + $this->options;
        return new KeyboardButton($data);
    }
}
