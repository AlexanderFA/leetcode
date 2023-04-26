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
     * O(n^2) approach
     *
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

    /**
     * O(n) approach
     *
     * @param array $nums
     * @param int $target
     * @return array|null
     */
    function twoSum2(array $nums, int $target): ?array
    {
        $flipped = array_flip($nums);

        for ($i = 0; $i < count($nums) - 1; $i++) {
            $diff = $target - $nums[$i];
            if (isset($flipped[$diff]) && $flipped[$diff] !== $i) {
                return [$i, $flipped[$diff]];
            }
        }

        return null;
    }
}

\assert(empty(array_diff((new Solution())->twoSum([2, 7, 11, 15], 9), [0, 1])));
\assert(empty(array_diff((new Solution())->twoSum2([3,2,4], 6), [1, 2])));
