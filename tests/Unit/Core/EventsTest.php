<?php

namespace Tests\Unit\Core;

use Mk4U\TGram\Config;
use Mk4U\TGram\Events;
use Mk4U\TGram\Exceptions\BotException;
use PHPUnit\Framework\TestCase;

class EventsTest extends TestCase
{
    private string $logDir;

    protected function setUp(): void
    {
        $reflection = new \ReflectionClass(Config::class);
        $reflection->setStaticPropertyValue('init', null);
        $reflection->setStaticPropertyValue('cfg', []);

        $this->logDir = sys_get_temp_dir() . '/tgram_test_logs_' . uniqid();
        mkdir($this->logDir, 0775, true);

        mkdir($this->logDir . '/storage/logs', 0775, true);

        Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'abs_path' => $this->logDir,
            'debug' => false,
        ]);

        $logReflection = new \ReflectionClass(Events::class);
        $logReflection->setStaticPropertyValue('loggers', []);
    }

    protected function tearDown(): void
    {
        @array_map('unlink', glob($this->logDir . '/*.log') ?: []);
        @rmdir($this->logDir);
    }

    public function testLoggerAcceptsEmergencyLevel(): void
    {
        $this->expectNotToPerformAssertions();
        Events::logger('test', 'test.log', 'emergency test', [], 'emergency');
    }

    public function testLoggerAcceptsAlertLevel(): void
    {
        $this->expectNotToPerformAssertions();
        Events::logger('test', 'test.log', 'alert test', [], 'alert');
    }

    public function testLoggerAcceptsCriticalLevel(): void
    {
        $this->expectNotToPerformAssertions();
        Events::logger('test', 'test.log', 'critical test', [], 'critical');
    }

    public function testLoggerAcceptsErrorLevel(): void
    {
        $this->expectNotToPerformAssertions();
        Events::logger('test', 'test.log', 'error test', [], 'error');
    }

    public function testLoggerAcceptsWarningLevel(): void
    {
        $this->expectNotToPerformAssertions();
        Events::logger('test', 'test.log', 'warning test', [], 'warning');
    }

    public function testLoggerAcceptsNoticeLevel(): void
    {
        $this->expectNotToPerformAssertions();
        Events::logger('test', 'test.log', 'notice test', [], 'notice');
    }

    public function testLoggerAcceptsInfoLevel(): void
    {
        $this->expectNotToPerformAssertions();
        Events::logger('test', 'test.log', 'info test', [], 'info');
    }

    public function testLoggerAcceptsDebugLevel(): void
    {
        $this->expectNotToPerformAssertions();
        Events::logger('test', 'test.log', 'debug test', [], 'debug');
    }

    public function testLoggerThrowsOnInvalidLevel(): void
    {
        $this->expectException(BotException::class);
        $this->expectExceptionMessage('Incorrect Log level');

        Events::logger('test', 'test.log', 'invalid', [], 'invalid_level');
    }

    public function testLoggerCreatesLogFile(): void
    {
        Events::logger('test', 'unit_create.log', 'test message', [], 'info');

        $logFile = $this->logDir . '/storage/logs/unit_create.log';
        $this->assertFileExists($logFile);
    }

    public function testLoggerWritesMessageContent(): void
    {
        Events::logger('test', 'unit_content.log', 'hello world', [], 'info');

        $logFile = $this->logDir . '/storage/logs/unit_content.log';
        $content = file_get_contents($logFile);
        $this->assertStringContainsString('hello world', $content);
    }
}
