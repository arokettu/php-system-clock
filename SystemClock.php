<?php

declare(strict_types=1);

namespace Arokettu\SystemClock;

use DateTimeImmutable;
use DateTimeZone;
use Psr\Clock\ClockInterface;

/**
 * @psalm-api
 * @license MIT-0
 */
final class SystemClock implements ClockInterface
{
    /** @var DateTimeZone|null */
    private $timeZone;

    public function __construct(DateTimeZone $timeZone = null)
    {
        $this->timeZone = $timeZone;
    }

    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable('now', $this->timeZone);
    }
}
