<?php

namespace Tests\Unit\Factories;

use Mk4U\TGram\Core\Entities\InlineKeyboardMarkup;
use Mk4U\TGram\Core\Entities\ReplyKeyboardMarkup;
use Mk4U\TGram\Core\Entities\ReplyKeyboardRemove;
use Mk4U\TGram\Core\Entities\ForceReply;
use Mk4U\TGram\Core\Factories\Keyboard;
use Mk4U\TGram\Core\Factories\Keyboard\Inline;
use Mk4U\TGram\Core\Factories\Keyboard\Reply;
use Mk4U\TGram\Core\Factories\Keyboard\InlineButton;
use Mk4U\TGram\Core\Factories\Keyboard\ReplyButton;
use PHPUnit\Framework\TestCase;

class KeyboardTest extends TestCase
{
    public function testInlineReturnsInlineInstance(): void
    {
        $this->assertInstanceOf(Inline::class, Keyboard::inline());
    }

    public function testReplyReturnsReplyInstance(): void
    {
        $this->assertInstanceOf(Reply::class, Keyboard::reply());
    }

    public function testRemoveReturnsReplyKeyboardRemove(): void
    {
        $result = Keyboard::remove();
        $this->assertInstanceOf(ReplyKeyboardRemove::class, $result);
        $this->assertTrue($result->remove_keyboard);
    }

    public function testForceReplyReturnsForceReply(): void
    {
        $result = Keyboard::forceReply();
        $this->assertInstanceOf(ForceReply::class, $result);
        $this->assertTrue($result->force_reply);
    }

    public function testForceReplyWithPlaceholder(): void
    {
        $result = Keyboard::forceReply(false, 'Type here...');
        $this->assertSame('Type here...', $result->input_field_placeholder);
    }

    public function testInlineBuildReturnsMarkup(): void
    {
        $keyboard = Keyboard::inline()
            ->row(
                InlineButton::make('Yes')->callback('yes'),
                InlineButton::make('No')->callback('no')
            )
            ->build();

        $this->assertInstanceOf(InlineKeyboardMarkup::class, $keyboard);
        $this->assertNotNull($keyboard->inline_keyboard);
        $this->assertIsArray($keyboard->inline_keyboard);
    }

    public function testInlineMultipleRows(): void
    {
        $keyboard = Keyboard::inline()
            ->row(InlineButton::make('Row1')->callback('r1'))
            ->row(InlineButton::make('Row2')->callback('r2'))
            ->build();

        $this->assertCount(2, $keyboard->inline_keyboard);
    }

    public function testReplyBuildReturnsMarkup(): void
    {
        $keyboard = Keyboard::reply()
            ->row(
                ReplyButton::make('Option 1'),
                ReplyButton::make('Option 2')
            )
            ->build();

        $this->assertInstanceOf(ReplyKeyboardMarkup::class, $keyboard);
        $this->assertNotNull($keyboard->keyboard);
    }

    public function testReplyWithOptions(): void
    {
        $keyboard = Keyboard::reply()
            ->persistent()
            ->resize()
            ->oneTime()
            ->placeholder('Choose...')
            ->selective()
            ->build();

        $this->assertTrue($keyboard->is_persistent);
        $this->assertTrue($keyboard->resize_keyboard);
        $this->assertTrue($keyboard->one_time_keyboard);
        $this->assertSame('Choose...', $keyboard->input_field_placeholder);
        $this->assertTrue($keyboard->selective);
    }
}
