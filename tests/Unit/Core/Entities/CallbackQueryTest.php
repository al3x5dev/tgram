<?php

namespace Tests\Unit\Core\Entities;

use Mk4U\TGram\Core\Entities\CallbackQuery;
use Mk4U\TGram\Core\Entities\MaybeInaccessibleMessage;
use Mk4U\TGram\Core\Entities\Message;
use Mk4U\TGram\Core\Entities\User;
use PHPUnit\Framework\TestCase;

class CallbackQueryTest extends TestCase
{
    public function testBasicProperties(): void
    {
        $cb = new CallbackQuery([
            'id' => 'cb123',
            'from' => [
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Alice',
            ],
            'data' => 'button_click',
            'chat_instance' => 'instance1',
        ]);

        $this->assertSame('cb123', $cb->id);
        $this->assertSame('button_click', $cb->data);
        $this->assertSame('instance1', $cb->chat_instance);
    }

    public function testFromIsHydratedAsUser(): void
    {
        $cb = new CallbackQuery([
            'id' => 'cb1',
            'from' => [
                'id' => 42,
                'is_bot' => false,
                'first_name' => 'Bob',
                'username' => 'bob',
            ],
        ]);

        $this->assertInstanceOf(User::class, $cb->from);
        $this->assertSame(42, $cb->from->id);
        $this->assertSame('Bob', $cb->from->first_name);
        $this->assertSame('bob', $cb->from->username);
    }

    public function testMessageIsHydratedAsMaybeInaccessibleMessage(): void
    {
        $cb = new CallbackQuery([
            'id' => 'cb1',
            'from' => ['id' => 1, 'first_name' => 'A'],
            'message' => [
                'message_id' => 100,
                'date' => 1700000000,
                'text' => 'Original message',
                'from' => ['id' => 1, 'first_name' => 'A'],
                'chat' => ['id' => 1, 'type' => 'private'],
            ],
        ]);

        $this->assertInstanceOf(MaybeInaccessibleMessage::class, $cb->message);
        $resolved = $cb->message->resolve();
        $this->assertInstanceOf(Message::class, $resolved);
        $this->assertSame(100, $resolved->message_id);
        $this->assertSame('Original message', $resolved->text);
    }

    public function testInlineMessageId(): void
    {
        $cb = new CallbackQuery([
            'id' => 'cb1',
            'from' => ['id' => 1, 'first_name' => 'A'],
            'inline_message_id' => 'inline_123',
        ]);

        $this->assertSame('inline_123', $cb->inline_message_id);
    }

    public function testGameShortName(): void
    {
        $cb = new CallbackQuery([
            'id' => 'cb1',
            'from' => ['id' => 1, 'first_name' => 'A'],
            'game_short_name' => 'chess',
        ]);

        $this->assertSame('chess', $cb->game_short_name);
    }

    public function testOptionalPropertiesAreNull(): void
    {
        $cb = new CallbackQuery([
            'id' => 'cb1',
            'from' => ['id' => 1, 'first_name' => 'A'],
        ]);

        $this->assertNull($cb->data);
        $this->assertNull($cb->inline_message_id);
        $this->assertNull($cb->chat_instance);
        $this->assertNull($cb->game_short_name);
        $this->assertNull($cb->message);
    }

    public function testJsonSerialize(): void
    {
        $cb = new CallbackQuery([
            'id' => 'cb1',
            'from' => ['id' => 1, 'first_name' => 'A'],
            'data' => 'test_data',
        ]);

        $data = json_decode(json_encode($cb), true);
        $this->assertSame('cb1', $data['id']);
        $this->assertSame('test_data', $data['data']);
        $this->assertSame('A', $data['from']['first_name']);
    }

    public function testHasProperty(): void
    {
        $cb = new CallbackQuery([
            'id' => 'cb1',
            'from' => ['id' => 1, 'first_name' => 'A'],
        ]);

        $this->assertTrue($cb->hasProperty('id'));
        $this->assertTrue($cb->hasProperty('from'));
        $this->assertFalse($cb->hasProperty('nonexistent'));
    }
}
