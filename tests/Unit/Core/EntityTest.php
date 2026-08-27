<?php

namespace Tests\Unit\Core;

use Mk4U\TGram\Core\Entity;
use Mk4U\TGram\Exceptions\BotException;
use PHPUnit\Framework\TestCase;

class EntityTest extends TestCase
{
    private static string $fixtureClass;

    public static function setUpBeforeClass(): void
    {
        self::$fixtureClass = get_class(new class(['id' => 0]) extends Entity {
            protected function setEntities(): array
            {
                return [
                    'child' => self::class,
                    'children' => [self::class],
                    'mapped_to_missing' => 'Nonexistent\\FakeClass',
                ];
            }
        });
    }

    public function testBasicPropertyMapping(): void
    {
        $entity = new (self::$fixtureClass)([
            'id' => 123,
            'name' => 'test',
            'active' => true,
        ]);

        $this->assertSame(123, $entity->id);
        $this->assertSame('test', $entity->name);
        $this->assertTrue($entity->active);
    }

    public function testMissingPropertyReturnsNull(): void
    {
        $entity = new (self::$fixtureClass)(['id' => 1]);

        $this->assertNull($entity->nonexistent);
    }

    public function testDynamicPropertySet(): void
    {
        $entity = new (self::$fixtureClass)(['id' => 1]);
        $entity->custom = 'value';

        $this->assertSame('value', $entity->custom);
    }

    public function testHasProperty(): void
    {
        $entity = new (self::$fixtureClass)(['id' => 1]);

        $this->assertTrue($entity->hasProperty('id'));
        $this->assertFalse($entity->hasProperty('nonexistent'));
    }

    public function testIssetMagicMethod(): void
    {
        $entity = new (self::$fixtureClass)(['id' => 1]);

        $this->assertTrue(isset($entity->id));
        $this->assertFalse(isset($entity->nonexistent));
    }

    public function testGetProperties(): void
    {
        $entity = new (self::$fixtureClass)([
            'id' => 1,
            'name' => 'test',
        ]);

        $props = $entity->getProperties();
        $this->assertSame(1, $props['id']);
        $this->assertSame('test', $props['name']);
    }

    public function testNestedEntityMapping(): void
    {
        $entity = new (self::$fixtureClass)([
            'id' => 1,
            'child' => ['id' => 2, 'name' => 'nested'],
        ]);

        $childClass = self::$fixtureClass;
        $this->assertInstanceOf($childClass, $entity->child);
        $this->assertSame(2, $entity->child->id);
        $this->assertSame('nested', $entity->child->name);
    }

    public function testArrayEntityMapping(): void
    {
        $entity = new (self::$fixtureClass)([
            'id' => 1,
            'children' => [
                ['id' => 10],
                ['id' => 20],
            ],
        ]);

        $this->assertCount(2, $entity->children);
        $childClass = self::$fixtureClass;
        $this->assertInstanceOf($childClass, $entity->children[0]);
        $this->assertSame(10, $entity->children[0]->id);
        $this->assertSame(20, $entity->children[1]->id);
    }

    public function testJsonSerialize(): void
    {
        $entity = new (self::$fixtureClass)([
            'id' => 1,
            'name' => 'test',
        ]);

        $json = json_encode($entity);
        $data = json_decode($json, true);

        $this->assertSame(1, $data['id']);
        $this->assertSame('test', $data['name']);
    }

    public function testToJson(): void
    {
        $entity = new (self::$fixtureClass)(['id' => 42]);

        $this->assertSame('{"id":42}', $entity->toJson());
    }

    public function testToString(): void
    {
        $entity = new (self::$fixtureClass)(['id' => 42]);

        $this->assertSame('{"id":42}', (string) $entity);
    }

    public function testDebugInfo(): void
    {
        $entity = new (self::$fixtureClass)(['id' => 1, 'secret' => 'hidden']);

        $info = $entity->__debugInfo();
        $this->assertSame(1, $info['id']);
        $this->assertSame('hidden', $info['secret']);
    }

    public function testCreateEntityThrowsOnMissingClass(): void
    {
        $this->expectException(BotException::class);
        $this->expectExceptionMessage('not found');

        new (self::$fixtureClass)([
            'mapped_to_missing' => ['data' => true],
        ]);
    }
}
