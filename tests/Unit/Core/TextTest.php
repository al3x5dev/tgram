<?php

namespace Tests\Unit\Core;

use Mk4U\TGram\Config;
use Mk4U\TGram\Core\Text;
use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
{
    protected function setUp(): void
    {
        $reflection = new \ReflectionClass(Config::class);
        $reflection->setStaticPropertyValue('init', null);
        $reflection->setStaticPropertyValue('cfg', []);

        Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'abs_path' => '/tmp',
            'parse_mode' => 'HTML',
        ]);
    }

    public function testBoldHtml(): void
    {
        $this->assertSame('<b>hello</b>', Text::bold('hello'));
    }

    public function testBoldMarkdown(): void
    {
        Config::set('parse_mode', 'MarkdownV2');
        $this->assertSame('*hello*', Text::bold('hello'));
    }

    public function testItalicHtml(): void
    {
        $this->assertSame('<i>hello</i>', Text::italic('hello'));
    }

    public function testItalicMarkdown(): void
    {
        Config::set('parse_mode', 'MarkdownV2');
        $this->assertSame('_hello_', Text::italic('hello'));
    }

    public function testUnderlineHtml(): void
    {
        $this->assertSame('<u>hello</u>', Text::underline('hello'));
    }

    public function testUnderlineMarkdown(): void
    {
        Config::set('parse_mode', 'MarkdownV2');
        $this->assertSame('__hello__', Text::underline('hello'));
    }

    public function testStrikethroughHtml(): void
    {
        $this->assertSame('<s>hello</s>', Text::strikethrough('hello'));
    }

    public function testStrikethroughMarkdown(): void
    {
        Config::set('parse_mode', 'MarkdownV2');
        $this->assertSame('~hello~', Text::strikethrough('hello'));
    }

    public function testSpoilerHtml(): void
    {
        $this->assertSame('<tg-spoiler>secret</tg-spoiler>', Text::spoiler('secret'));
    }

    public function testSpoilerMarkdown(): void
    {
        Config::set('parse_mode', 'MarkdownV2');
        $this->assertSame('||secret||', Text::spoiler('secret'));
    }

    public function testLinkHtml(): void
    {
        $result = Text::link('click here', 'https://example.com');
        $this->assertSame('<a href="https://example.com">click here</a>', $result);
    }

    public function testLinkMarkdown(): void
    {
        Config::set('parse_mode', 'MarkdownV2');
        $result = Text::link('click here', 'https://example.com');
        $this->assertSame('[click here](https://example.com)', $result);
    }

    public function testMention(): void
    {
        $result = Text::mention('John', 123456);
        $this->assertSame('<a href="tg://user?id=123456">John</a>', $result);
    }

    public function testInlineCodeHtml(): void
    {
        $result = Text::inlineCode('echo "hi"');
        $this->assertSame('<code>echo &quot;hi&quot;</code>', $result);
    }

    public function testInlineCodeMarkdown(): void
    {
        Config::set('parse_mode', 'MarkdownV2');
        $result = Text::inlineCode('echo "hi"');
        $this->assertSame('`echo "hi"`', $result);
    }

    public function testCodeBlockHtml(): void
    {
        $result = Text::codeBlock('echo "hi"', 'php');
        $this->assertSame('<pre><code class="language-php">echo &quot;hi&quot;</code></pre>', $result);
    }

    public function testCodeBlockWithoutLanguage(): void
    {
        $result = Text::codeBlock('hello');
        $this->assertSame('<pre>hello</pre>', $result);
    }

    public function testCodeBlockMarkdown(): void
    {
        Config::set('parse_mode', 'MarkdownV2');
        $result = Text::codeBlock('hello', 'php');
        $this->assertSame("```php\nhello\n```", $result);
    }

    public function testBlockQuoteHtml(): void
    {
        $this->assertSame('<blockquote>quoted</blockquote>', Text::blockQuote('quoted'));
    }

    public function testBlockQuoteMarkdown(): void
    {
        Config::set('parse_mode', 'MarkdownV2');
        $this->assertSame('> quoted', Text::blockQuote('quoted'));
    }

    public function testExpandableBlockQuoteHtml(): void
    {
        $this->assertSame('<blockquote expandable>expand</blockquote>', Text::expandableBlockQuote('expand'));
    }

    public function testSanitizeHtmlEntities(): void
    {
        $result = Text::link('<script>alert("xss")</script>', 'https://example.com');
        $this->assertStringNotContainsString('<script>', $result);
        $this->assertStringContainsString('&lt;', $result);
    }
}
