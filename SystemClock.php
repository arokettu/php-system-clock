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
    private $timeZone = null;

    /**
     * @param DateTimeZone|null $timeZone
     */
    public function __construct($timeZone = null)
    {
        if ($timeZone !== null) {
            $this->setTimeZone($timeZone);
        }
    }

    private function setTimeZone(DateTimeZone $timeZone)
    {
        $this->timeZone = $timeZone;
    }

    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable('now', $this->timeZone);
    }
}
