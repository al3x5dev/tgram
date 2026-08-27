<?php

namespace Tests\Unit\Core\Entities;

use Mk4U\TGram\Core\Entities\Chat;
use PHPUnit\Framework\TestCase;

class ChatTest extends TestCase
{
    public function testPrivateChat(): void
    {
        $chat = new Chat([
            'id' => 123456,
            'type' => 'private',
        ]);

        $this->assertSame(123456, $chat->id);
        $this->assertSame('private', $chat->type);
    }

    public function testGroupChat(): void
    {
        $chat = new Chat([
            'id' => -100123456,
            'type' => 'group',
            'title' => 'My Group',
        ]);

        $this->assertSame(-100123456, $chat->id);
        $this->assertSame('group', $chat->type);
        $this->assertSame('My Group', $chat->title);
    }

    public function testSupergroupChat(): void
    {
        $chat = new Chat([
            'id' => -100999,
            'type' => 'supergroup',
            'title' => 'Supergroup',
            'username' => 'mygroup',
            'is_forum' => true,
        ]);

        $this->assertSame('supergroup', $chat->type);
        $this->assertSame('mygroup', $chat->username);
        $this->assertTrue($chat->is_forum);
    }

    public function testChannelChat(): void
    {
        $chat = new Chat([
            'id' => -100111,
            'type' => 'channel',
            'title' => 'My Channel',
        ]);

        $this->assertSame('channel', $chat->type);
        $this->assertSame('My Channel', $chat->title);
    }

    public function testOptionalPropertiesAreNull(): void
    {
        $chat = new Chat(['id' => 1, 'type' => 'private']);

        $this->assertNull($chat->title);
        $this->assertNull($chat->username);
        $this->assertNull($chat->first_name);
        $this->assertNull($chat->last_name);
        $this->assertNull($chat->is_forum);
        $this->assertNull($chat->is_direct_messages);
    }

    public function testNameProperties(): void
    {
        $chat = new Chat([
            'id' => 1,
            'type' => 'private',
            'first_name' => 'Alice',
            'last_name' => 'Smith',
        ]);

        $this->assertSame('Alice', $chat->first_name);
        $this->assertSame('Smith', $chat->last_name);
    }

    public function testIsDirectMessages(): void
    {
        $chat = new Chat([
            'id' => 1,
            'type' => 'private',
            'is_direct_messages' => true,
        ]);

        $this->assertTrue($chat->is_direct_messages);
    }

    public function testJsonSerialize(): void
    {
        $chat = new Chat([
            'id' => -100123,
            'type' => 'supergroup',
            'title' => 'Test Group',
        ]);

        $data = json_decode(json_encode($chat), true);
        $this->assertSame(-100123, $data['id']);
        $this->assertSame('supergroup', $data['type']);
        $this->assertSame('Test Group', $data['title']);
    }

    public function testHasProperty(): void
    {
        $chat = new Chat(['id' => 1, 'type' => 'private']);

        $this->assertTrue($chat->hasProperty('id'));
        $this->assertTrue($chat->hasProperty('type'));
        $this->assertFalse($chat->hasProperty('nonexistent'));
    }
}
