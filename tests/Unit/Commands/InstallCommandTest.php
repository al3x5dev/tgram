<?php

namespace Tests\Unit\Commands;

use Mk4U\TGram\Commands\InstallCommand;
use PHPUnit\Framework\TestCase;

final class InstallCommandTest extends TestCase
{
    private string $originalCwd;
    private string $tempDir;

    protected function setUp(): void
    {
        $this->originalCwd = getcwd();
        $this->tempDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'tgram_install_' . bin2hex(random_bytes(6));
        mkdir($this->tempDir, 0777, true);
        chdir($this->tempDir);
    }

    protected function tearDown(): void
    {
        chdir($this->originalCwd);
        @unlink($this->tempDir . DIRECTORY_SEPARATOR . 'config.php');
        @rmdir($this->tempDir);
    }

    private function generate(?string $secret): string
    {
        $command = new InstallCommand();
        $method = new \ReflectionMethod($command, 'generateConfigData');
        $method->invoke(
            $command,
            '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            $secret,
            '123456789',
            'false'
        );

        return file_get_contents($this->tempDir . DIRECTORY_SEPARATOR . 'config.php');
    }

    public function testStoresSecretAsPlainText(): void
    {
        $config = $this->generate('MiSecreto123');

        $this->assertStringContainsString("'secret' => 'MiSecreto123',", $config);
        $this->assertStringNotContainsString(md5('MiSecreto123'), $config);
    }

    public function testOmitsSecretWhenNotProvided(): void
    {
        $config = $this->generate(null);

        $this->assertStringNotContainsString("'secret'", $config);
    }
}
