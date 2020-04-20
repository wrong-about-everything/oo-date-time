<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedDateTime;

use PHPUnit\Framework\TestCase;
use Meringue\FormattedDateTime\DayOfYear;
use Meringue\ISO8601DateTime\FromISO8601;

class DayOfYearTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            226,
            (new DayOfYear(new FromISO8601('2018-08-14T14:27:39+00:00')))->value()
        );
    }
}