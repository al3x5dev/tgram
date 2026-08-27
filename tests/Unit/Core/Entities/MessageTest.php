<?php

namespace Tests\Unit\Core\Entities;

use Mk4U\TGram\Core\Entities\Chat;
use Mk4U\TGram\Core\Entities\MaybeInaccessibleMessage;
use Mk4U\TGram\Core\Entities\Message;
use Mk4U\TGram\Core\Entities\MessageEntity;
use Mk4U\TGram\Core\Entities\PhotoSize;
use Mk4U\TGram\Core\Entities\User;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
    private static array $minimalData;

    public static function setUpBeforeClass(): void
    {
        self::$minimalData = [
            'message_id' => 100,
            'date' => 1700000000,
            'text' => 'Hello world',
            'from' => [
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Alice',
            ],
            'chat' => [
                'id' => 1,
                'type' => 'private',
            ],
        ];
    }

    public function testMinimalMessage(): void
    {
        $msg = new Message(self::$minimalData);

        $this->assertSame(100, $msg->message_id);
        $this->assertSame(1700000000, $msg->date);
        $this->assertSame('Hello world', $msg->text);
    }

    public function testFromIsHydratedAsUser(): void
    {
        $msg = new Message(self::$minimalData);

        $this->assertInstanceOf(User::class, $msg->from);
        $this->assertSame(1, $msg->from->id);
        $this->assertSame('Alice', $msg->from->first_name);
    }

    public function testChatIsHydratedAsChat(): void
    {
        $msg = new Message(self::$minimalData);

        $this->assertInstanceOf(Chat::class, $msg->chat);
        $this->assertSame(1, $msg->chat->id);
        $this->assertSame('private', $msg->chat->type);
    }

    public function testIsCommandWithBotCommand(): void
    {
        $msg = new Message([
            'message_id' => 1,
            'date' => 1700000000,
            'text' => '/start',
            'from' => ['id' => 1, 'first_name' => 'A'],
            'chat' => ['id' => 1, 'type' => 'private'],
            'entities' => [
                ['type' => 'bot_command', 'offset' => 0, 'length' => 6],
            ],
        ]);

        $this->assertTrue($msg->isCommand());
    }

    public function testIsCommandWithoutEntities(): void
    {
        $msg = new Message(self::$minimalData);

        $this->assertFalse($msg->isCommand());
    }

    public function testIsCommandWithNonCommandEntity(): void
    {
        $msg = new Message([
            'message_id' => 1,
            'date' => 1700000000,
            'text' => 'Hello @bot',
            'from' => ['id' => 1, 'first_name' => 'A'],
            'chat' => ['id' => 1, 'type' => 'private'],
            'entities' => [
                ['type' => 'mention', 'offset' => 6, 'length' => 4],
            ],
        ]);

        $this->assertFalse($msg->isCommand());
    }

    public function testEntitiesAreHydratedAsMessageEntityArray(): void
    {
        $msg = new Message([
            'message_id' => 1,
            'date' => 1700000000,
            'text' => '/start',
            'from' => ['id' => 1, 'first_name' => 'A'],
            'chat' => ['id' => 1, 'type' => 'private'],
            'entities' => [
                ['type' => 'bot_command', 'offset' => 0, 'length' => 6],
            ],
        ]);

        $this->assertIsArray($msg->entities);
        $this->assertCount(1, $msg->entities);
        $this->assertInstanceOf(MessageEntity::class, $msg->entities[0]);
        $this->assertSame('bot_command', $msg->entities[0]->type);
    }

    public function testPhotoArrayHydratedAsPhotoSizeArray(): void
    {
        $msg = new Message([
            'message_id' => 1,
            'date' => 1700000000,
            'from' => ['id' => 1, 'first_name' => 'A'],
            'chat' => ['id' => 1, 'type' => 'private'],
            'photo' => [
                ['file_id' => 'small', 'file_unique_id' => 's', 'width' => 90, 'height' => 90, 'file_size' => 100],
                ['file_id' => 'large', 'file_unique_id' => 'l', 'width' => 800, 'height' => 600, 'file_size' => 50000],
            ],
        ]);

        $this->assertIsArray($msg->photo);
        $this->assertCount(2, $msg->photo);
        $this->assertInstanceOf(PhotoSize::class, $msg->photo[0]);
        $this->assertSame('small', $msg->photo[0]->file_id);
        $this->assertSame(800, $msg->photo[1]->width);
    }

    public function testOptionalScalarProperties(): void
    {
        $msg = new Message([
            'message_id' => 1,
            'date' => 1700000000,
            'from' => ['id' => 1, 'first_name' => 'A'],
            'chat' => ['id' => 1, 'type' => 'private'],
            'message_thread_id' => 42,
            'edit_date' => 1700001000,
            'media_group_id' => 'media123',
            'author_signature' => 'Admin',
            'caption' => 'Photo caption',
            'is_topic_message' => true,
            'has_protected_content' => true,
            'is_from_offline' => false,
            'sender_boost_count' => 5,
        ]);

        $this->assertSame(42, $msg->message_thread_id);
        $this->assertSame(1700001000, $msg->edit_date);
        $this->assertSame('media123', $msg->media_group_id);
        $this->assertSame('Admin', $msg->author_signature);
        $this->assertSame('Photo caption', $msg->caption);
        $this->assertTrue($msg->is_topic_message);
        $this->assertTrue($msg->has_protected_content);
        $this->assertFalse($msg->is_from_offline);
        $this->assertSame(5, $msg->sender_boost_count);
    }

    public function testReplyToMessageIsHydrated(): void
    {
        $msg = new Message([
            'message_id' => 2,
            'date' => 1700000000,
            'text' => 'Reply',
            'from' => ['id' => 1, 'first_name' => 'A'],
            'chat' => ['id' => 1, 'type' => 'private'],
            'reply_to_message' => [
                'message_id' => 1,
                'date' => 1700000000,
                'text' => 'Original',
                'from' => ['id' => 2, 'first_name' => 'B'],
                'chat' => ['id' => 1, 'type' => 'private'],
            ],
        ]);

        $this->assertInstanceOf(Message::class, $msg->reply_to_message);
        $this->assertSame(1, $msg->reply_to_message->message_id);
        $this->assertSame('Original', $msg->reply_to_message->text);
    }

    public function testSenderChatIsHydrated(): void
    {
        $msg = new Message([
            'message_id' => 1,
            'date' => 1700000000,
            'text' => 'Channel post',
            'from' => ['id' => 1, 'first_name' => 'A'],
            'chat' => ['id' => -100123, 'type' => 'channel'],
            'sender_chat' => ['id' => -100123, 'type' => 'channel', 'title' => 'My Channel'],
        ]);

        $this->assertInstanceOf(Chat::class, $msg->sender_chat);
        $this->assertSame('My Channel', $msg->sender_chat->title);
    }

    public function testNewChatMembersAreHydrated(): void
    {
        $msg = new Message([
            'message_id' => 1,
            'date' => 1700000000,
            'from' => ['id' => 1, 'first_name' => 'A'],
            'chat' => ['id' => 1, 'type' => 'private'],
            'new_chat_members' => [
                ['id' => 10, 'first_name' => 'New1', 'is_bot' => false],
                ['id' => 20, 'first_name' => 'New2', 'is_bot' => true],
            ],
        ]);

        $this->assertIsArray($msg->new_chat_members);
        $this->assertCount(2, $msg->new_chat_members);
        $this->assertInstanceOf(User::class, $msg->new_chat_members[0]);
        $this->assertSame('New1', $msg->new_chat_members[0]->first_name);
        $this->assertTrue($msg->new_chat_members[1]->is_bot);
    }

    public function testMaybeInaccessibleMessageResolve(): void
    {
        $minMsg = new MaybeInaccessibleMessage([
            'from' => ['id' => 1, 'first_name' => 'A'],
            'message_id' => 1,
            'date' => 1700000000,
        ]);

        $resolved = $minMsg->resolve();
        $this->assertInstanceOf(Message::class, $resolved);
    }

    public function testMaybeInaccessibleMessageCreateWithFrom(): void
    {
        $resolved = MaybeInaccessibleMessage::create([
            'from' => ['id' => 1, 'first_name' => 'A'],
            'message_id' => 1,
            'date' => 1700000000,
        ]);

        $this->assertInstanceOf(Message::class, $resolved);
    }

    public function testMaybeInaccessibleMessageCreateWithoutFrom(): void
    {
        $resolved = MaybeInaccessibleMessage::create([
            'message_id' => 1,
            'date' => 1700000000,
        ]);

        $this->assertInstanceOf(MaybeInaccessibleMessage::class, $resolved);
        $this->assertNotInstanceOf(Message::class, $resolved);
    }

    public function testCaptionEntitiesAreHydrated(): void
    {
        $msg = new Message([
            'message_id' => 1,
            'date' => 1700000000,
            'from' => ['id' => 1, 'first_name' => 'A'],
            'chat' => ['id' => 1, 'type' => 'private'],
            'caption' => 'Check /help',
            'caption_entities' => [
                ['type' => 'bot_command', 'offset' => 6, 'length' => 5],
            ],
        ]);

        $this->assertIsArray($msg->caption_entities);
        $this->assertCount(1, $msg->caption_entities);
        $this->assertInstanceOf(MessageEntity::class, $msg->caption_entities[0]);
        $this->assertSame('bot_command', $msg->caption_entities[0]->type);
    }

    public function testJsonSerialize(): void
    {
        $msg = new Message(self::$minimalData);

        $data = json_decode(json_encode($msg), true);
        $this->assertSame(100, $data['message_id']);
        $this->assertSame('Hello world', $data['text']);
        $this->assertSame('Alice', $data['from']['first_name']);
    }

    public function testMissingOptionalPropertiesAreNull(): void
    {
        $msg = new Message(self::$minimalData);

        $this->assertNull($msg->message_thread_id);
        $this->assertNull($msg->edit_date);
        $this->assertNull($msg->media_group_id);
        $this->assertNull($msg->sticker);
        $this->assertNull($msg->photo);
        $this->assertNull($msg->reply_to_message);
    }
}
