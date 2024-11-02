<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Tests;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\AbstractBinaryType;

final class AbstractBinaryTypeTest extends TestCase
{
    protected AbstractBinaryType $type;

    protected function setUp(): void
    {
        $this->type = new class () extends AbstractBinaryType {
            //
        };
    }

    public function testPrepareContent(): void
    {
        $content = '';
        for ($i = 0; $i < 2048; $i++) {
            $content .= 'x';
        }

        $this->assertEquals(1024, strlen($this->type->prepareContent($content)));
        $this->assertEquals('78787878', substr($this->type->prepareContent($content), 0, 8));
    }

    public function testIsBinary(): void
    {
        $this->assertTrue($this->type->isBinary());
    }
}
