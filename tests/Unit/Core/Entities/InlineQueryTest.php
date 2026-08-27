<?php

namespace Tests\Unit\Core\Entities;

use Mk4U\TGram\Core\Entities\InlineQuery;
use Mk4U\TGram\Core\Entities\Location;
use Mk4U\TGram\Core\Entities\User;
use PHPUnit\Framework\TestCase;

class InlineQueryTest extends TestCase
{
    public function testBasicProperties(): void
    {
        $iq = new InlineQuery([
            'id' => 'iq123',
            'from' => [
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Alice',
            ],
            'query' => 'pizza near me',
            'offset' => '',
        ]);

        $this->assertSame('iq123', $iq->id);
        $this->assertSame('pizza near me', $iq->query);
        $this->assertSame('', $iq->offset);
    }

    public function testFromIsHydratedAsUser(): void
    {
        $iq = new InlineQuery([
            'id' => 'iq1',
            'from' => [
                'id' => 42,
                'is_bot' => false,
                'first_name' => 'Bob',
                'username' => 'bob',
            ],
            'query' => 'test',
            'offset' => '0',
        ]);

        $this->assertInstanceOf(User::class, $iq->from);
        $this->assertSame(42, $iq->from->id);
        $this->assertSame('Bob', $iq->from->first_name);
    }

    public function testLocationIsHydrated(): void
    {
        $iq = new InlineQuery([
            'id' => 'iq1',
            'from' => ['id' => 1, 'first_name' => 'A'],
            'query' => 'nearby',
            'offset' => '',
            'location' => [
                'latitude' => 40.7128,
                'longitude' => -74.0060,
            ],
        ]);

        $this->assertInstanceOf(Location::class, $iq->location);
        $this->assertEqualsWithDelta(40.7128, $iq->location->latitude, 0.0001);
        $this->assertEqualsWithDelta(-74.0060, $iq->location->longitude, 0.0001);
    }

    public function testChatType(): void
    {
        $iq = new InlineQuery([
            'id' => 'iq1',
            'from' => ['id' => 1, 'first_name' => 'A'],
            'query' => 'test',
            'offset' => '',
            'chat_type' => 'group',
        ]);

        $this->assertSame('group', $iq->chat_type);
    }

    public function testOptionalPropertiesAreNull(): void
    {
        $iq = new InlineQuery([
            'id' => 'iq1',
            'from' => ['id' => 1, 'first_name' => 'A'],
            'query' => '',
            'offset' => '',
        ]);

        $this->assertNull($iq->location);
        $this->assertNull($iq->chat_type);
    }

    public function testJsonSerialize(): void
    {
        $iq = new InlineQuery([
            'id' => 'iq1',
            'from' => ['id' => 1, 'first_name' => 'A'],
            'query' => 'test query',
            'offset' => '0',
        ]);

        $data = json_decode(json_encode($iq), true);
        $this->assertSame('iq1', $data['id']);
        $this->assertSame('test query', $data['query']);
    }

    public function testHasProperty(): void
    {
        $iq = new InlineQuery([
            'id' => 'iq1',
            'from' => ['id' => 1, 'first_name' => 'A'],
            'query' => '',
            'offset' => '',
        ]);

        $this->assertTrue($iq->hasProperty('id'));
        $this->assertTrue($iq->hasProperty('from'));
        $this->assertTrue($iq->hasProperty('query'));
        $this->assertFalse($iq->hasProperty('nonexistent'));
    }
}
