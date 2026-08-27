<?php

namespace Tests\Unit\Core\Entities;

use Mk4U\TGram\Core\Entities\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testBasicProperties(): void
    {
        $user = new User([
            'id' => 123456,
            'is_bot' => false,
            'first_name' => 'Alice',
        ]);

        $this->assertSame(123456, $user->id);
        $this->assertFalse($user->is_bot);
        $this->assertSame('Alice', $user->first_name);
    }

    public function testOptionalStringProperties(): void
    {
        $user = new User([
            'id' => 1,
            'first_name' => 'Bob',
            'last_name' => 'Smith',
            'username' => 'bobsmith',
            'language_code' => 'en',
        ]);

        $this->assertSame('Smith', $user->last_name);
        $this->assertSame('bobsmith', $user->username);
        $this->assertSame('en', $user->language_code);
    }

    public function testBooleanProperties(): void
    {
        $user = new User([
            'id' => 1,
            'first_name' => 'Premium',
            'is_premium' => true,
            'added_to_attachment_menu' => true,
            'can_join_groups' => true,
            'can_read_all_group_messages' => false,
            'supports_guest_queries' => true,
            'supports_inline_queries' => true,
            'can_connect_to_business' => false,
            'has_main_web_app' => false,
        ]);

        $this->assertTrue($user->is_premium);
        $this->assertTrue($user->added_to_attachment_menu);
        $this->assertTrue($user->can_join_groups);
        $this->assertFalse($user->can_read_all_group_messages);
        $this->assertTrue($user->supports_guest_queries);
        $this->assertTrue($user->supports_inline_queries);
        $this->assertFalse($user->can_connect_to_business);
        $this->assertFalse($user->has_main_web_app);
    }

    public function testMissingOptionalPropertiesAreNull(): void
    {
        $user = new User(['id' => 1, 'first_name' => 'Minimal']);

        $this->assertNull($user->last_name);
        $this->assertNull($user->username);
        $this->assertNull($user->language_code);
        $this->assertNull($user->is_premium);
    }

    public function testJsonSerialize(): void
    {
        $user = new User([
            'id' => 42,
            'is_bot' => false,
            'first_name' => 'Test',
        ]);

        $data = json_decode(json_encode($user), true);
        $this->assertSame(42, $data['id']);
        $this->assertSame('Test', $data['first_name']);
    }

    public function testHasProperty(): void
    {
        $user = new User(['id' => 1, 'first_name' => 'X']);

        $this->assertTrue($user->hasProperty('id'));
        $this->assertTrue($user->hasProperty('first_name'));
        $this->assertFalse($user->hasProperty('nonexistent'));
    }

    public function testBotUser(): void
    {
        $user = new User([
            'id' => 999,
            'is_bot' => true,
            'first_name' => 'MyBot',
            'can_join_groups' => false,
            'can_read_all_group_messages' => true,
        ]);

        $this->assertTrue($user->is_bot);
        $this->assertSame('MyBot', $user->first_name);
        $this->assertFalse($user->can_join_groups);
        $this->assertTrue($user->can_read_all_group_messages);
    }

    public function testAdditionalBooleanProperties(): void
    {
        $user = new User([
            'id' => 1,
            'first_name' => 'Test',
            'has_topics_enabled' => true,
            'allows_users_to_create_topics' => true,
            'can_manage_bots' => false,
            'supports_join_request_queries' => true,
        ]);

        $this->assertTrue($user->has_topics_enabled);
        $this->assertTrue($user->allows_users_to_create_topics);
        $this->assertFalse($user->can_manage_bots);
        $this->assertTrue($user->supports_join_request_queries);
    }
}
