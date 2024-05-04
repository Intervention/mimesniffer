<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Tests;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\AudioMpeg;

final class AudioMpegTest extends TestCase
{
    public $sniffer;
    public $type;

    protected function setUp(): void
    {
        $this->sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/stubs/mp3_id3v1');
        $this->type = $this->sniffer->getType();
    }

    public function testType(): void
    {
        $this->assertInstanceOf(AudioMpeg::class, $this->type);
    }

    public function testIsAudio(): void
    {
        $this->assertTrue($this->type->isAudio());
    }
}
