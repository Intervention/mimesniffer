<?php

namespace Intervention\MimeSniffer\Test;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\AbstractType;

class AbstractTypeTest extends TestCase
{
    public function testMatches()
    {
        $type = $this->getMockForAbstractClass(AbstractType::class);
        $this->assertFalse($type->matches('test'));
    }

    public function testToString()
    {
        $type = $this->getMockForAbstractClass(AbstractType::class);
        $this->assertEquals('', $type);
    }
}
