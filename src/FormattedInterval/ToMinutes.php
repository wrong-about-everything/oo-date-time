<?php

declare(strict_types=1);

namespace Meringue\FormattedInterval;

use Meringue\FormattedDateTime\ToSeconds;
use Meringue\ISO8601Interval\WithFixedStartDateTime;

class ToMinutes
{
    private $interval;

    public function __construct(WithFixedStartDateTime $interval)
    {
        $this->interval = $interval;
    }

    public function value(): float
    {
        return
            (float) bcdiv(
                (string) ((new ToSeconds($this->interval->ends()))->value() - (new ToSeconds($this->interval->starts()))->value()),
                '60',
                2
            );
    }
}