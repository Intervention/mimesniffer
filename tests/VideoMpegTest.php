<?php

namespace Intervention\MimeSniffer\Tests;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\VideoMpeg;

final class VideoMpegTest extends TestCase
{
    public $sniffer;
    public $type;

    protected function setUp(): void
    {
        $this->sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/stubs/mpeg-video');
        $this->type = $this->sniffer->getType();
    }

    public function testType(): void
    {
        $this->assertInstanceOf(VideoMpeg::class, $this->type);
    }

    public function testIsImage(): void
    {
        $this->assertFalse($this->type->isImage());
    }

    public function testIsVideo(): void
    {
        $this->assertTrue($this->type->isVideo());
    }
}
