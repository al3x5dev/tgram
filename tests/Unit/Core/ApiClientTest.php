<?php

namespace Tests\Unit\Core;

use Mk4U\TGram\Config;
use Mk4U\TGram\Core\ApiClient;
use Mk4U\TGram\Core\Entities\InputFile;
use PHPUnit\Framework\TestCase;

final class ApiClientTest extends TestCase
{
    protected function setUp(): void
    {
        $config = new \ReflectionClass(Config::class);
        $config->setStaticPropertyValue('init', null);
        $config->setStaticPropertyValue('cfg', []);

        Config::init([
            'token' => '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz',
            'abs_path' => __DIR__,
        ]);
    }

    private function invoke(ApiClient $client, string $method): mixed
    {
        $reflection = new \ReflectionMethod($client, $method);

        return $reflection->invoke($client);
    }

    public function testInputFileBecomesMultipartPart(): void
    {
        $path = dirname(__DIR__, 2) . '/Fixtures/ConcreteEntity.php';
        $client = new ApiClient('sendDocument', [
            'document' => new InputFile(['file' => $path]),
            'chat_id' => 123,
            'caption' => 'hello',
            'parse_mode' => 'HTML',
        ]);

        $parts = $this->invoke($client, 'buildMultipart');

        $this->assertSame([
            ['name' => 'document', 'contents' => $path],
            ['name' => 'chat_id', 'contents' => '123'],
            ['name' => 'caption', 'contents' => 'hello'],
            ['name' => 'parse_mode', 'contents' => 'HTML'],
        ], $parts);
    }

    public function testCurlFileIsPreservedInMultipart(): void
    {
        $curlFile = new \CURLFile(__FILE__, 'text/plain', 'file.txt');
        $client = new ApiClient('sendDocument', [
            'document' => new InputFile(['file' => $curlFile]),
            'parse_mode' => 'HTML',
        ]);

        $parts = $this->invoke($client, 'buildMultipart');

        $this->assertSame($curlFile, $parts[0]['contents']);
    }

    public function testNormalizeParamsSkipsNullsAndEncodesArrays(): void
    {
        $client = new ApiClient('sendMediaGroup', [
            'chat_id' => 123,
            'media' => [['type' => 'photo', 'media' => 'file_id']],
            'reply_markup' => null,
            'parse_mode' => 'HTML',
        ]);

        $params = $this->invoke($client, 'normalizeParams');

        $this->assertArrayNotHasKey('reply_markup', $params);
        $this->assertSame('[{"type":"photo","media":"file_id"}]', $params['media']);
    }
}
