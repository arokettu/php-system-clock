<?php

declare(strict_types=1);

namespace Arokettu\Clock;

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

    /**
     * @param DateTimeZone|null $timeZone
     */
    public function __construct($timeZone = null)
    {
        if ($timeZone !== null && !$timeZone instanceof DateTimeZone) {
            throw new \InvalidArgumentException('$timeZone must be an instance of DateTimeZone or null');
        }

        $this->timeZone = $timeZone;
    }

    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable('now', $this->timeZone);
    }
}
