<?php

declare(strict_types=1);

namespace Meringue\Date\Day;

use Meringue\Date\Day;
use Meringue\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;

class FromISO8601DateTime extends Day
{
    private $dt;

    public function __construct(ISO8601DateTime $dateTime)
    {
        $this->dt = $dateTime;
    }

    public function value(): int
    {
        return (int) (new PHPDateTime($this->dt->value()))->format('d');
    }
}