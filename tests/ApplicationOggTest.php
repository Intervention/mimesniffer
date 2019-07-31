<?php

namespace Intervention\MimeSniffer\Test;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ApplicationOgg;

class ApplicationOggTest extends TestCase
{
    public $sniffer;
    public $type;

    protected function setUp(): void
    {
        $this->sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/stubs/ogg');
        $this->type = $this->sniffer->getType();
    }

    public function testType()
    {
        $this->assertInstanceOf(ApplicationOgg::class, $this->type);
    }

    public function testIsImage()
    {
        $this->assertFalse($this->type->isImage());
    }
}
