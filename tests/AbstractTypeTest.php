<?php

namespace Intervention\MimeSniffer\Tests;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\AbstractType;

final class AbstractTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = $this->getMockForAbstractClass(AbstractType::class);
        $this->assertEquals('', $type);
    }

    public function testMatches(): void
    {
        $type = $this->getMockForAbstractClass(AbstractType::class);
        $this->assertFalse($type->matches('test'));
    }

    public function testIsImage(): void
    {
        $type = $this->getMockForAbstractClass(AbstractType::class);
        $this->assertFalse($type->isImage());
    }

    public function testPrepareContent(): void
    {
        $content = '';
        for ($i = 0; $i < 2048; $i++) {
            $content .= 'x';
        }

        $type = $this->getMockForAbstractClass(AbstractType::class);
        $this->assertEquals(1024, strlen($type->prepareContent($content)));
    }

    public function testIsBinary(): void
    {
        $type = $this->getMockForAbstractClass(AbstractType::class);
        $this->assertFalse($type->isBinary());
    }
}
