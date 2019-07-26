<?php

namespace Intervention\MimeSniffer\Test;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\Exceptions\NotMatchingException;
use Intervention\MimeSniffer\MimeSniffer;

class MimeSnifferTest extends TestCase
{
    public function testConstructor()
    {
        $sniffer = new MimeSniffer('foo');
        $this->assertInstanceOf(MimeSniffer::class, $sniffer);
    }

    public function testCreateFromString()
    {
        $sniffer = MimeSniffer::createFromString('foo');
        $this->assertInstanceOf(MimeSniffer::class, $sniffer);
    }

    public function testCreateFromFilename()
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.jpg');
        $this->assertEquals('FFD8FFE000104A464946000101000001', substr($sniffer->getHeader(), 0, 32));
    }

    public function testGetHeader()
    {
        $sniffer = MimeSniffer::createFromString('foo');
        $this->assertEquals('foo', $sniffer->getHeader());
    }

    public function testGetHeaderBinary()
    {
        $content = file_get_contents(__DIR__ . '/../tests/files/test.jpg');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertEquals('FFD8FFE000104A464946000101000001', substr($sniffer->getHeader(), 0, 32));
    }

    public function testGetTypeNotMatching()
    {
        $this->expectException(NotMatchingException::class);
        $sniffer = MimeSniffer::createFromString('foo');
        $sniffer->getType();
    }
}
