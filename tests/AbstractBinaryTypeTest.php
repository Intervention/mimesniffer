<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Tests;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\AbstractBinaryType;

final class AbstractBinaryTypeTest extends TestCase
{
    public function testPrepareContent(): void
    {
        $content = '';
        for ($i = 0; $i < 2048; $i++) {
            $content .= 'x';
        }

        $type = $this->getMockForAbstractClass(AbstractBinaryType::class);
        $this->assertEquals(1024, strlen($type->prepareContent($content)));
        $this->assertEquals('78787878', substr($type->prepareContent($content), 0, 8));
    }

    public function testIsBinary(): void
    {
        $type = $this->getMockForAbstractClass(AbstractBinaryType::class);
        $this->assertTrue($type->isBinary());
    }
}
