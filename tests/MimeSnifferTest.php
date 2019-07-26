<?php

namespace Intervention\MimeSniffer\Test;

use Intervention\MimeSniffer\Exceptions\NotMatchingException;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ImageGif;
use Intervention\MimeSniffer\Types\ImageJpeg;
use Intervention\MimeSniffer\Types\TextPlain;
use PHPUnit\Framework\TestCase;

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
        $this->assertInstanceOf(MimeSniffer::class, $sniffer);
    }

    public function testMatches()
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.gif');
        $this->assertTrue($sniffer->matches(new ImageGif));
        $this->assertFalse($sniffer->matches(new ImageJpeg));
    }
}
