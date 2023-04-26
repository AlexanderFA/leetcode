<?php

/**
 * Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.
 * You may assume that each input would have exactly one solution, and you may not use the same element twice.
 * You can return the answer in any order.
 *
 * Input: nums = [2,7,11,15], target = 9
 * Output: [0,1]
 * Explanation: Because nums[0] + nums[1] == 9, we return [0, 1].
 */
class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum(array $nums, int $target): ?array
    {
        for ($i = 0; $i < count($nums) - 1; $i++) {
            for ($j = $i + 1; $j < count($nums); $j++) {
                if ($target === $nums[$i] + $nums[$j]) {
                    return [$i, $j];
                }
            }
        }

        return null;
    }
}

\assert(empty(array_diff((new Solution())->twoSum([2,7,11,15], 9), [0, 1])));
