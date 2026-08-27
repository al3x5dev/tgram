<?php

namespace Tests\Unit\Attributes;

use Mk4U\TGram\Attributes\Callback;
use PHPUnit\Framework\TestCase;

class CallbackAttributeTest extends TestCase
{
    public function testGetNameReturnsActionName(): void
    {
        $attr = new Callback('confirm');

        $this->assertSame('confirm', $attr->getName());
    }

    public function testGetNameWithComplexAction(): void
    {
        $attr = new Callback('user:ban:123');

        $this->assertSame('user:ban:123', $attr->getName());
    }
}
