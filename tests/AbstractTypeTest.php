<?php

namespace Intervention\MimeSniffer\Test;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\AbstractType;

class AbstractTypeTest extends TestCase
{
    public function testToString()
    {
        $type = $this->getMockForAbstractClass(AbstractType::class);
        $this->assertEquals('', $type);
    }

    public function testMatches()
    {
        $type = $this->getMockForAbstractClass(AbstractType::class);
        $this->assertFalse($type->matches('test'));
    }

    public function testIsImage()
    {
        $type = $this->getMockForAbstractClass(AbstractType::class);
        $this->assertFalse($type->isImage());
    }

    public function testPrepareContent()
    {
        $content = '';
        for ($i = 0; $i < 2048; $i++) {
            $content .= 'x';
        }

        $type = $this->getMockForAbstractClass(AbstractType::class);
        $this->assertEquals(1024, strlen($type->prepareContent($content)));
    }

    public function testIsBinary()
    {
        $type = $this->getMockForAbstractClass(AbstractType::class);
        $this->assertFalse($type->isBinary());
    }
}
