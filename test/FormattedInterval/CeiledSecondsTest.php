<?php

declare(strict_types=1);

namespace Meringue\Tests\FormattedInterval;

use Meringue\FormattedInterval\CeiledSeconds;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\WithFixedStartDateTime\FromRange;
use Meringue\ISO8601Interval\WithFixedStartDateTime;
use PHPUnit\Framework\TestCase;

class CeiledSecondsTest extends TestCase
{
    /**
     * @dataProvider rangesAndSeconds
     */
    public function test(WithFixedStartDateTime $range, int $expectedSeconds)
    {
        $this->assertEquals(
            $expectedSeconds,
            (new CeiledSeconds(
                $range
            ))
                ->value()
        );
    }

    public function rangesAndSeconds()
    {
        return
            [
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:39+00:00')
                    ),
                    172800
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:39.92657+00:00')
                    ),
                    172801
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:38+00:00')
                    ),
                    172799
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-03T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:40+00:00')
                    ),
                    172801
                ],
                [
                    new FromRange(
                        new FromISO8601('2017-07-05T14:27:39+00:00'),
                        new FromISO8601('2017-07-05T14:27:40+00:00')
                    ),
                    1
                ],
            ];
    }
}