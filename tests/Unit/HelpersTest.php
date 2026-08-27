<?php

namespace Tests\Unit;

use Mk4U\TGram\Config;
use Mk4U\TGram\Exceptions\BotException;
use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    protected function setUp(): void
    {
        $reflection = new \ReflectionClass(Config::class);
        $reflection->setStaticPropertyValue('init', null);
        $reflection->setStaticPropertyValue('cfg', []);
    }

    public function testClassValidatorPassesForValidClass(): void
    {
        $this->expectNotToPerformAssertions();

        classValidator(
            \Mk4U\TGram\Core\Entities\User::class,
            \Mk4U\TGram\Core\Entity::class,
            'Entity'
        );
    }

    public function testClassValidatorThrowsForNonexistentClass(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('not found');

        classValidator('Nonexistent\\Class', \Mk4U\TGram\Core\Entity::class);
    }

    public function testClassValidatorThrowsForWrongParent(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('must extend');

        classValidator(
            \Mk4U\TGram\Core\Entities\User::class,
            \stdClass::class,
            'Test'
        );
    }

    public function testBaseReturnsAbsPath(): void
    {
        Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'abs_path' => '/my/project',
        ]);

        $this->assertSame('/my/project', base());
    }

    public function testBaseAppendsPath(): void
    {
        Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'abs_path' => '/my/project',
        ]);

        $result = base('storage/logs');
        $this->assertStringContainsString('storage/logs', $result);
    }

    public function testWriteContentToFileCreatesFile(): void
    {
        $tmpFile = sys_get_temp_dir() . '/tgram_test_write_' . uniqid() . '.txt';

        writeContentToFile($tmpFile, 'hello');

        $this->assertFileExists($tmpFile);
        $this->assertSame('hello', file_get_contents($tmpFile));
        @unlink($tmpFile);
    }

    public function testWriteContentToFileThrowsOnInvalidDir(): void
    {
        $this->expectException(\ErrorException::class);

        writeContentToFile('/nonexistent/dir/file.txt', 'content');
    }
}
