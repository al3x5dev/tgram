<?php

namespace Tests\Unit\Core;

use Mk4U\TGram\Config;
use Mk4U\TGram\Core\Entities\Update;
use PHPUnit\Framework\TestCase;

class UpdateTest extends TestCase
{
    protected function setUp(): void
    {
        $reflection = new \ReflectionClass(Config::class);
        $reflection->setStaticPropertyValue('init', null);
        $reflection->setStaticPropertyValue('cfg', []);

        Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'abs_path' => '/tmp',
        ]);
    }

    public function testTypeReturnsMessage(): void
    {
        $update = new Update([
            'update_id' => 1,
            'message' => [
                'message_id' => 1,
                'from' => ['id' => 123, 'is_bot' => false, 'first_name' => 'Test'],
                'chat' => ['id' => 123, 'type' => 'private'],
                'date' => time(),
                'text' => '/start',
            ],
        ]);

        $this->assertSame('message', $update->type());
    }

    public function testTypeReturnsCallbackQuery(): void
    {
        $update = new Update([
            'update_id' => 1,
            'callback_query' => [
                'id' => 'cb1',
                'from' => ['id' => 123, 'is_bot' => false, 'first_name' => 'Test'],
                'message' => [
                    'message_id' => 1,
                    'from' => ['id' => 456, 'is_bot' => true, 'first_name' => 'Bot'],
                    'chat' => ['id' => 123, 'type' => 'private'],
                    'date' => time(),
                    'text' => 'test',
                ],
                'data' => 'action',
            ],
        ]);

        $this->assertSame('callback_query', $update->type());
    }

    public function testTypeReturnsNullForUnknown(): void
    {
        $update = new Update([
            'update_id' => 1,
        ]);

        $this->assertNull($update->type());
    }

    public function testFromIdReturnsUserId(): void
    {
        $update = new Update([
            'update_id' => 1,
            'message' => [
                'message_id' => 1,
                'from' => ['id' => 123, 'is_bot' => false, 'first_name' => 'Test'],
                'chat' => ['id' => 123, 'type' => 'private'],
                'date' => time(),
                'text' => 'hello',
            ],
        ]);

        $this->assertSame(123, $update->fromId());
    }

    public function testFromIdReturnsNullForUnknownType(): void
    {
        $update = new Update(['update_id' => 1]);

        $this->assertNull($update->fromId());
    }

    public function testChatIdReturnsChatId(): void
    {
        $update = new Update([
            'update_id' => 1,
            'message' => [
                'message_id' => 1,
                'from' => ['id' => 123, 'is_bot' => false, 'first_name' => 'Test'],
                'chat' => ['id' => 456, 'type' => 'group'],
                'date' => time(),
                'text' => 'hello',
            ],
        ]);

        $this->assertSame(456, $update->chatId());
    }

    public function testChatIdReturnsNullForUnknownType(): void
    {
        $update = new Update(['update_id' => 1]);

        $this->assertNull($update->chatId());
    }
}
