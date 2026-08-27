<?php

namespace Tests\Unit\Attributes;

use Mk4U\TGram\Attributes\Command;
use PHPUnit\Framework\TestCase;

class CommandAttributeTest extends TestCase
{
    public function testGetNameReturnsCommandName(): void
    {
        $attr = new Command('/start');

        $this->assertSame('/start', $attr->getName());
    }

    public function testGetNameWithComplexCommand(): void
    {
        $attr = new Command('/settings_admin');

        $this->assertSame('/settings_admin', $attr->getName());
    }
}
