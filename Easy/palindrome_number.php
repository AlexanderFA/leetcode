<?php

/**
 * Given an integer x, return true if x is a palindrome, and false otherwise.
 *
 * Input: x = 121
 * Output: true
 * Explanation: 121 reads as 121 from left to right and from right to left.
 */
class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome(int $x): bool
    {
        if ($x < 0) {
            return false;
        }

        $digits = [];

        while ($x > 0) {
            $mod = $x % 10;
            $x = (int) ($x / 10);

            $digits[] = $mod;
        }

        $c = count($digits);
        for ($i = 0; $i < (int) ($c / 2); $i++) {
            if ($digits[$i] !== $digits[$c - $i -1]) {
                return false;
            }
        }

        return true;
    }

    /**
     * Editorial solution
     *
     * @param int $x
     * @return bool
     */
    function isPalindrome2(int $x): bool
    {
        // Special cases:
        // As discussed above, when x < 0, x is not a palindrome.
        // Also, if the last digit of the number is 0, in order to be a palindrome,
        // the first digit of the number also needs to be 0.
        // Only 0 satisfy this property.
        if($x < 0 || ($x % 10 == 0 && $x != 0)) {
            return false;
        }

        $revertedNumber = 0;
        while($x > $revertedNumber) {
            $revertedNumber = $revertedNumber * 10 + $x % 10;
            $x = (int) ($x / 10);
        }

        // When the length is an odd number, we can get rid of the middle digit by revertedNumber/10
        // For example when the input is 12321, at the end of the while loop we get x = 12, revertedNumber = 123,
        // since the middle digit doesn't matter in palidrome(it will always equal to itself), we can simply get rid of it.
        return $x === $revertedNumber || $x === (int) ($revertedNumber / 10);
    }
}

\assert((new Solution())->isPalindrome(121));
\assert((new Solution())->isPalindrome2(13531));
