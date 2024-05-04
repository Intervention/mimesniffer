<?php

namespace Intervention\MimeSniffer\Tests;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\AudioFlac;

final class AudioFlacTest extends TestCase
{
    public $sniffer;
    public $type;

    protected function setUp(): void
    {
        $this->sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/stubs/flac');
        $this->type = $this->sniffer->getType();
    }

    public function testType(): void
    {
        $this->assertInstanceOf(AudioFlac::class, $this->type);
    }

    public function testIsImage(): void
    {
        $this->assertFalse($this->type->isImage());
    }
}
