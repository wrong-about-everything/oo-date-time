<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedDateTime;

use PHPUnit\Framework\TestCase;
use Meringue\FormattedDateTime\Minute;
use Meringue\ISO8601DateTime\FromISO8601;

class MinuteTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            27,
            (new Minute(new FromISO8601('2017-07-03T14:27:39+00:00')))->value()
        );
    }
}