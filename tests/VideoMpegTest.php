<?php

namespace Intervention\MimeSniffer\Test;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\VideoMpeg;

class VideoMpegTest extends TestCase
{
    public $sniffer;
    public $type;

    protected function setUp(): void
    {
        $this->sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/stubs/mpeg-video');
        $this->type = $this->sniffer->getType();
    }

    public function testType()
    {
        $this->assertInstanceOf(VideoMpeg::class, $this->type);
    }

    public function testIsImage()
    {
        $this->assertFalse($this->type->isImage());
    }

    public function testIsVideo()
    {
        $this->assertTrue($this->type->isVideo());
    }
}
