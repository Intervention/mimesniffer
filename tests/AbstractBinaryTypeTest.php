<?php

namespace Intervention\MimeSniffer\Test;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\AbstractBinaryType;

class AbstractBinaryTypeTest extends TestCase
{
    public function testPrepareContent()
    {
        $content = '';
        for ($i = 0; $i < 2048; $i++) {
            $content .= 'x';
        }

        $type = $this->getMockForAbstractClass(AbstractBinaryType::class);
        $this->assertEquals(1024, strlen($type->prepareContent($content)));
        $this->assertEquals('78787878', substr($type->prepareContent($content), 0, 8));
    }

    public function testIsBinary()
    {
        $type = $this->getMockForAbstractClass(AbstractBinaryType::class);
        $this->assertTrue($type->isBinary());
    }
}
