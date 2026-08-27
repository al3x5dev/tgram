<?php

namespace Tests\Unit\Factories;

use Mk4U\TGram\Core\Entities\InlineKeyboardButton;
use Mk4U\TGram\Core\Factories\Keyboard\InlineButton;
use PHPUnit\Framework\TestCase;

class InlineButtonTest extends TestCase
{
    public function testMakeCreatesInstance(): void
    {
        $button = InlineButton::make('Click me');

        $this->assertInstanceOf(InlineButton::class, $button);
    }

    public function testBuildWithUrl(): void
    {
        $button = InlineButton::make('Visit')
            ->url('https://example.com')
            ->build();

        $this->assertInstanceOf(InlineKeyboardButton::class, $button);
        $this->assertSame('Visit', $button->text);
        $this->assertSame('https://example.com', $button->url);
    }

    public function testBuildWithCallback(): void
    {
        $button = InlineButton::make('Confirm')
            ->callback('confirm_action')
            ->build();

        $this->assertSame('Confirm', $button->text);
        $this->assertSame('confirm_action', $button->callback_data);
    }

    public function testBuildWithPay(): void
    {
        $button = InlineButton::make('Pay')
            ->pay()
            ->build();

        $this->assertTrue($button->pay);
    }

    public function testDisabled(): void
    {
        $button = InlineButton::make('Disabled')
            ->disabled()
            ->build();

        $this->assertInstanceOf(\Mk4U\TGram\Core\Entities\DisabledButton::class, $button->disabled);
    }

    public function testBuildMinimal(): void
    {
        $button = InlineButton::make('Simple')
            ->build();

        $this->assertSame('Simple', $button->text);
        $this->assertNull($button->url ?? null);
        $this->assertNull($button->callback_data ?? null);
    }

    public function testFluentInterface(): void
    {
        $button = InlineButton::make('Test');

        $result = $button->url('https://test.com');

        $this->assertSame($button, $result);
    }
}
