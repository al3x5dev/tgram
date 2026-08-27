<?php

namespace Tests\Unit;

use Mk4U\TGram\Config;
use Mk4U\TGram\Exceptions\BotException;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    protected function setUp(): void
    {
        $reflection = new \ReflectionClass(Config::class);
        $reflection->setStaticPropertyValue('init', null);
        $reflection->setStaticPropertyValue('cfg', []);
    }

    public function testInitWithValidConfig(): void
    {
        $result = Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'abs_path' => '/tmp',
        ]);

        $this->assertInstanceOf(Config::class, $result);
    }

    public function testInitReturnsSameInstance(): void
    {
        $config = Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'abs_path' => '/tmp',
        ]);

        $result = Config::init([
            'token' => 'should-not-matter',
            'abs_path' => '/other',
        ]);

        $this->assertSame($config, $result);
    }

    public function testInitThrowsOnMissingToken(): void
    {
        $this->expectException(BotException::class);
        $this->expectExceptionMessage('Token not defined!');

        Config::init(['abs_path' => '/tmp']);
    }

    public function testInitThrowsOnInvalidToken(): void
    {
        $this->expectException(BotException::class);
        $this->expectExceptionMessage('Invalid Token!');

        Config::init([
            'token' => 'not-a-valid-token',
            'abs_path' => '/tmp',
        ]);
    }

    public function testGetReturnsValue(): void
    {
        Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'abs_path' => '/tmp',
            'parse_mode' => 'MarkdownV2',
        ]);

        $this->assertSame('MarkdownV2', Config::get('parse_mode'));
    }

    public function testGetReturnsDefaultForMissing(): void
    {
        Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'abs_path' => '/tmp',
        ]);

        $this->assertSame('fallback', Config::get('nonexistent', 'fallback'));
    }

    public function testGetReturnsNullForMissingWithoutDefault(): void
    {
        Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'abs_path' => '/tmp',
        ]);

        $this->assertNull(Config::get('nonexistent'));
    }

    public function testHasReturnsTrueForExistingKey(): void
    {
        Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'abs_path' => '/tmp',
        ]);

        $this->assertTrue(Config::has('token'));
    }

    public function testHasReturnsFalseForMissingKey(): void
    {
        Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'abs_path' => '/tmp',
        ]);

        $this->assertFalse(Config::has('nonexistent'));
    }

    public function testSetUpdatesExistingKey(): void
    {
        Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'abs_path' => '/tmp',
            'parse_mode' => 'HTML',
        ]);

        Config::set('parse_mode', 'MarkdownV2');

        $this->assertSame('MarkdownV2', Config::get('parse_mode'));
    }

    public function testSetThrowsOnMissingKey(): void
    {
        $this->expectException(BotException::class);

        Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'abs_path' => '/tmp',
        ]);

        Config::set('nonexistent', 'value');
    }

    public function testDefaultParseModeIsHtml(): void
    {
        Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'abs_path' => '/tmp',
        ]);

        $this->assertSame('HTML', Config::get('parse_mode'));
    }

    public function testDefaultDebugIsFalse(): void
    {
        Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'abs_path' => '/tmp',
        ]);

        $this->assertFalse(Config::get('debug'));
    }
}
