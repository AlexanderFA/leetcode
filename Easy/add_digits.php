<?php

/**
 * Given an integer num, repeatedly add all its digits until the result has only one digit, and return it.
 *
 * Example:
 * Input: num = 38
 * Output: 2
 * Explanation: The process is
 * 38 --> 3 + 8 --> 11
 * 11 --> 1 + 1 --> 2
 * Since 2 has only one digit, return it.
 */
class Solution {
    /**
     * @param Integer $num
     * @return Integer
     */
    function addDigits(int $num): int
    {
        $sum = 0;
        do {
            $sum += $num % 10;
        } while ($num = (int) ($num / 10));

        return ($sum < 10) ? $sum : self::addDigits($sum);
    }

    /**
     * Math approach
     *
     * @param int $num
     * @return int
     */
    function addDigits2(int $num): int
    {
        if ($num === 0) return 0;
        if ($num % 9 === 0) return 9;

        return $num % 9;
    }
}

echo (new Solution())->addDigits(38) . PHP_EOL;
echo (new Solution())->addDigits2(38) . PHP_EOL;
