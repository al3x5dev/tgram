<?php

namespace Mk4U\TGram\Core\Factories\Keyboard;

use Mk4U\TGram\Core\Entities\ReplyKeyboardMarkup;

class Reply
{
    private array $rows = [];
    private array $options = [];

    use AddRowTrait;

    public function persistent(bool $value = true): self
    {
        $this->options['is_persistent'] = $value;
        return $this;
    }

    public function resize(bool $value = true): self
    {
        $this->options['resize_keyboard'] = $value;
        return $this;
    }

    public function oneTime(bool $value = true): self
    {
        $this->options['one_time_keyboard'] = $value;
        return $this;
    }

    public function placeholder(string $text): self
    {
        $this->options['input_field_placeholder'] = $text;
        return $this;
    }

    public function selective(bool $value = true): self
    {
        $this->options['selective'] = $value;
        return $this;
    }

    public function build(): ReplyKeyboardMarkup
    {
        $data = ['keyboard' => $this->rows] + $this->options;
        return new ReplyKeyboardMarkup($data);
    }
}
