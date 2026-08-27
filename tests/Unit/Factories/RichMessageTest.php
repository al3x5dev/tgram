<?php

namespace Tests\Unit\Factories;

use Mk4U\TGram\Core\Entities\InputRichMessage;
use Mk4U\TGram\Core\Factories\Rich;
use Mk4U\TGram\Core\Factories\RichMessage;
use PHPUnit\Framework\TestCase;

class RichMessageTest extends TestCase
{
    public function testMakeReturnsSelf(): void
    {
        $msg = RichMessage::make();
        $this->assertInstanceOf(RichMessage::class, $msg);
    }

    public function testBuildReturnsInputRichMessage(): void
    {
        $msg = RichMessage::make()->build();
        $this->assertInstanceOf(InputRichMessage::class, $msg);
    }

    public function testBlockAddsBlock(): void
    {
        $msg = RichMessage::make()
            ->block(Rich\Block::paragraph('Hello'))
            ->build();

        $this->assertNotNull($msg->blocks);
        $this->assertIsArray($msg->blocks);
        $this->assertCount(1, $msg->blocks);
    }

    public function testMultipleBlocks(): void
    {
        $msg = RichMessage::make()
            ->block(Rich\Block::paragraph('First'))
            ->block(Rich\Block::heading('Second', 2))
            ->block(Rich\Block::divider())
            ->build();

        $this->assertCount(3, $msg->blocks);
    }

    public function testHtmlOption(): void
    {
        $msg = RichMessage::make()
            ->html('<b>Bold</b>')
            ->build();

        $this->assertSame('<b>Bold</b>', $msg->html);
    }

    public function testMarkdownOption(): void
    {
        $msg = RichMessage::make()
            ->markdown('**Bold**')
            ->build();

        $this->assertSame('**Bold**', $msg->markdown);
    }

    public function testRtlOption(): void
    {
        $msg = RichMessage::make()
            ->rtl()
            ->build();

        $this->assertTrue($msg->is_rtl);
    }

    public function testRtlDisable(): void
    {
        $msg = RichMessage::make()
            ->rtl(true)
            ->rtl(false)
            ->build();

        $this->assertFalse($msg->is_rtl);
    }

    public function testFluentInterface(): void
    {
        $result = RichMessage::make()
            ->block(Rich\Block::paragraph('test'))
            ->html('<p>test</p>')
            ->markdown('test')
            ->rtl();

        $this->assertInstanceOf(RichMessage::class, $result);
    }

    public function testCombinedOptions(): void
    {
        $msg = RichMessage::make()
            ->block(Rich\Block::paragraph('Hello'))
            ->block(Rich\Block::heading('Title'))
            ->html('<b>Hello</b>')
            ->markdown('**Hello**')
            ->rtl()
            ->build();

        $this->assertCount(2, $msg->blocks);
        $this->assertSame('<b>Hello</b>', $msg->html);
        $this->assertSame('**Hello**', $msg->markdown);
        $this->assertTrue($msg->is_rtl);
    }

    public function testEmptyBuild(): void
    {
        $msg = RichMessage::make()->build();

        $this->assertInstanceOf(InputRichMessage::class, $msg);
        $this->assertNull($msg->blocks);
        $this->assertNull($msg->html);
        $this->assertNull($msg->markdown);
    }

    public function testButtonMake(): void
    {
        $btn = Rich\Button::make('Click me')->build();

        $this->assertInstanceOf(\Mk4U\TGram\Core\Entities\RichMessageButton::class, $btn);
        $this->assertSame('Click me', $btn->text);
    }

    public function testButtonUrl(): void
    {
        $btn = Rich\Button::make('Visit')
            ->url('https://example.com')
            ->build();

        $this->assertSame('https://example.com', $btn->url);
    }

    public function testButtonCallback(): void
    {
        $btn = Rich\Button::make('Action')
            ->callback('do_something')
            ->build();

        $this->assertSame('do_something', $btn->callback_data);
    }

    public function testButtonStyle(): void
    {
        $btn = Rich\Button::make('Styled')
            ->style('primary')
            ->build();

        $this->assertSame('primary', $btn->style);
    }

    public function testButtonDisabled(): void
    {
        $btn = Rich\Button::make('Disabled')
            ->disabled()
            ->build();

        $this->assertInstanceOf(\Mk4U\TGram\Core\Entities\DisabledButton::class, $btn->disabled);
    }

    public function testButtonFluentChain(): void
    {
        $btn = Rich\Button::make('Chained')
            ->style('secondary')
            ->url('https://example.com');

        $this->assertInstanceOf(Rich\Button::class, $btn);
    }

    public function testButtonWithButtonsBlock(): void
    {
        $buttons = [
            Rich\Button::make('OK')->callback('confirm')->build(),
            Rich\Button::make('Cancel')->callback('cancel')->build(),
        ];
        $block = Rich\Block::buttons($buttons);

        $this->assertCount(2, $block->buttons);
        $this->assertSame('confirm', $block->buttons[0]->callback_data);
        $this->assertSame('cancel', $block->buttons[1]->callback_data);
    }
}
