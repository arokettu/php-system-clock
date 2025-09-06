<?php

/**
 * @copyright 2023 Anton Smirnov
 * @license MIT-0 https://spdx.org/licenses/MIT-0.html
 */

declare(strict_types=1);

namespace Arokettu\Clock\Tests;

use Arokettu\Clock\SystemClock;
use PHPUnit\Framework\TestCase;

final class SystemClockTest extends TestCase
{
    public function testTime(): void
    {
        $clock = new SystemClock();

        // three consecutive time generations should be t1 <= t2 <= t3
        $lowerBoundary = new \DateTimeImmutable('now');
        $time = $clock->now();
        $upperBoundary = new \DateTimeImmutable('now');

        self::assertGreaterThanOrEqual($lowerBoundary, $time);
        self::assertLessThanOrEqual($upperBoundary, $time);
    }

    public function testTz(): void
    {
        $clock1 = new SystemClock(new \DateTimeZone('UTC'));
        self::assertEquals('UTC', $clock1->now()->getTimezone()->getName());

        $clock2 = new SystemClock(new \DateTimeZone('Europe/Tallinn'));
        self::assertEquals('Europe/Tallinn', $clock2->now()->getTimezone()->getName());
    }
}
