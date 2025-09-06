<?php

/**
 * @copyright 2023 Anton Smirnov
 * @license MIT-0 https://spdx.org/licenses/MIT-0.html
 */

declare(strict_types=1);

namespace Arokettu\Clock;

use DateTimeImmutable;
use DateTimeZone;
use Psr\Clock\ClockInterface;

/**
 * @psalm-api
 */
final class SystemClock implements ClockInterface
{
    /** @var DateTimeZone|null */
    private $timeZone;

    /**
     * @param DateTimeZone|null $timeZone
     */
    public function __construct(?DateTimeZone $timeZone = null)
    {
        $this->timeZone = $timeZone;
    }

    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable('now', $this->timeZone);
    }
}
