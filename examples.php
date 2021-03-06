<?php

declare(strict_types=1);

namespace ooDateTime;

require_once 'vendor/autoload.php';

use Meringue\Comparison\DateTimeComparisonResult;
use Meringue\ISO8601DateTime\Max;
use Meringue\FormattedDateTime\SecondsSinceJanuary1st1970;
use Meringue\ISO8601DateTime\FromTimestamp;
use Meringue\ISO8601Interval\WithFixedStartDateTime\FromRange;
use Meringue\Timeline\Point\Future;
use Meringue\Timeline\Point\Past;
use Meringue\Timeline\Point\Now;
use Meringue\ISO8601DateTime\FromISO8601;
use Meringue\ISO8601Interval\Floating\FromISO8601 as ISO8601Interval;


// outputs true

var_dump(
    (new Max(
        new Future(
            new Past(
                new FromTimestamp(
                    (new SecondsSinceJanuary1st1970(
                        new FromISO8601('2017-08-18T15:08:13+04:00')
                    ))
                        ->value()
                ),
                new ISO8601Interval('P1Y2M21DT24H56M26S')
            ),
            new ISO8601Interval('PT23H')
        ),
        new Now()
    ))
        ->equalsTo(new Now())
);


// outputs true

var_dump(
    (new Future(
        new Past(
            new Now(),
            new FromRange(
                new Now(),
                new Future(
                    new Now(),
                    new ISO8601Interval('PT1S')
                )
            )
        ),
        new ISO8601Interval('PT1S')
    ))
        ->equalsTo(new Now())
);
