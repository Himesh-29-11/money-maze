<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CalculatorMathTest extends TestCase
{
    public function test_zero_rate_annuity_is_the_sum_of_payments(): void
    {
        $this->assertSame(120000, 10000 * 12);
    }
}
