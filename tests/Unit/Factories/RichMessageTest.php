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
}
