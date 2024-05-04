<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Tests;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\AbstractType;

final class AbstractTypeTest extends TestCase
{
    public function testToString(): void
    {
        $this->assertEquals('', (string) $this->getTestAbstractType());
    }

    public function testMatches(): void
    {
        $this->assertFalse($this->getTestAbstractType()->matches('test'));
    }

    public function testIsImage(): void
    {
        $this->assertFalse($this->getTestAbstractType()->isImage());
    }

    public function testPrepareContent(): void
    {
        $content = '';
        for ($i = 0; $i < 2048; $i++) {
            $content .= 'x';
        }

        $this->assertEquals(1024, strlen($this->getTestAbstractType()->prepareContent($content)));
    }

    public function testIsBinary(): void
    {
        $this->assertFalse($this->getTestAbstractType()->isBinary());
    }

    private function getTestAbstractType(): AbstractType
    {
        return new class () extends AbstractType
        {
        };
    }
}
