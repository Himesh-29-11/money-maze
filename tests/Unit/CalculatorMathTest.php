<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CalculatorMathTest extends TestCase
{
    /**
     * Mirror of the annuity-due (present value) formula used by the
     * life-insurance and retirement calculators in resources/js/app.js.
     */
    private function annuityDue(float $payment, float $rate, float $years): float
    {
        if ($years <= 0 || $payment <= 0) {
            return 0;
        }

        if (abs($rate) < 0.0000001) {
            return $payment * $years;
        }

        return $payment * (1 + $rate) * (1 - (1 / pow(1 + $rate, $years))) / $rate;
    }

    public function test_zero_rate_annuity_is_the_sum_of_payments(): void
    {
        $this->assertSame(120000.0, $this->annuityDue(10000, 0.0, 12));
    }

    public function test_non_positive_terms_return_zero(): void
    {
        $this->assertSame(0.0, $this->annuityDue(0, 0.08, 12));
        $this->assertSame(0.0, $this->annuityDue(10000, 0.08, 0));
        $this->assertSame(0.0, $this->annuityDue(10000, 0.08, -3));
    }

    public function test_positive_rate_annuity_is_less_than_sum_of_payments(): void
    {
        // Each future payment is discounted, so the present value is below the nominal total.
        $this->assertLessThan(10000 * 12, $this->annuityDue(10000, 0.08, 12));
    }

    public function test_negative_real_rate_annuity_exceeds_sum_of_payments(): void
    {
        // Inflation above returns means future expenses need more money today.
        $this->assertGreaterThan(10000 * 12, $this->annuityDue(10000, -0.02, 12));
    }

    public function test_annuity_matches_explicit_discounting(): void
    {
        $payment = 10000;
        $rate = 0.08;
        $years = 20;

        $expected = 0.0;
        for ($year = 0; $year < $years; $year++) {
            $expected += $payment / pow(1 + $rate, $year);
        }

        $this->assertEqualsWithDelta($expected, $this->annuityDue($payment, $rate, $years), 0.01);
    }

    public function test_longer_terms_increase_annuity_value(): void
    {
        $this->assertGreaterThan(
            $this->annuityDue(10000, 0.06, 10),
            $this->annuityDue(10000, 0.06, 25)
        );
    }
}
