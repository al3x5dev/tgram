<?php

namespace Tests\Unit\Commands;

use Mk4U\TGram\Commands\HookSetCommand;
use Mk4U\TGram\Config;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\Fixtures\RecordingHttpClient;

final class HookSetCommandTest extends TestCase
{
    private string $originalCwd;
    private string $tempDir;
    private RecordingHttpClient $http;

    protected function setUp(): void
    {
        $config = new \ReflectionClass(Config::class);
        $config->setStaticPropertyValue('init', null);
        $config->setStaticPropertyValue('cfg', []);

        $this->originalCwd = getcwd();
        $this->tempDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'tgram_hook_' . bin2hex(random_bytes(6));
        mkdir($this->tempDir, 0777, true);
        mkdir($this->tempDir . DIRECTORY_SEPARATOR . 'storage/cache', 0777, true);
        file_put_contents($this->tempDir . DIRECTORY_SEPARATOR . 'config.php', "<?php\nreturn [];\n");
        chdir($this->tempDir);

        $this->http = new RecordingHttpClient();
        Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'secret' => 'MiSecreto123',
            'abs_path' => $this->tempDir,
            'http_client' => $this->http,
        ]);
    }

    protected function tearDown(): void
    {
        chdir($this->originalCwd);
        @unlink($this->tempDir . DIRECTORY_SEPARATOR . 'config.php');
        @rmdir($this->tempDir . DIRECTORY_SEPARATOR . 'storage/cache');
        @rmdir($this->tempDir . DIRECTORY_SEPARATOR . 'storage');
        @rmdir($this->tempDir);
    }

    public function testSendsMd5HashAsSecretToken(): void
    {
        $tester = new CommandTester(new HookSetCommand());

        $status = $tester->execute(['url' => 'https://example.com/webhook']);

        $this->assertSame(0, $status);
        $this->assertStringContainsString('setWebhook', $this->http->url);
        $this->assertSame(md5('MiSecreto123'), $this->http->options['form_params']['secret_token']);
    }

    public function testOmitsSecretTokenWhenNoSecretConfigured(): void
    {
        Config::set('secret', null);
        $tester = new CommandTester(new HookSetCommand());

        $status = $tester->execute(['url' => 'https://example.com/webhook']);

        $this->assertSame(0, $status);
        $this->assertArrayNotHasKey('secret_token', $this->http->options['form_params']);
    }
}
