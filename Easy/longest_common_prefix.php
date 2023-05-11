<?php

use Webmozart\Assert\Assert;

/**
 * Write a function to find the longest common prefix string amongst an array of strings.
 * If there is no common prefix, return an empty string ""
 *
 * Example 1:
 * Input: strs = ["flower", "flow", "flight"]
 * Output: "fl"
 *
 * Example 2:
 * Input: strs = ["dog",n"racecar", "car"]
 * Output: ""
 * Explanation: There is no common prefix amongst the input strings.
 *
 * Constraints:
 * 1 <= strs.length <= 200
 * 0 <= strs[i].length <= 200
 * strs[i] consists of only lowercase English letters.
 */

class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        $smallest = array_map('strlen', $strs);
        $smallest = array_search(min($smallest), $smallest);
        $smallest = $strs[$smallest];

        for ($i = strlen($smallest) - 1;  $i >=0; $i--) {
            $prefix = substr($smallest, 0, $i + 1);

            foreach ($strs as $str) {
                if (strpos($str, $prefix) !== 0) {
                    continue(2);
                }
            }

            return $prefix;
        }

        return '';
    }
}

require_once '../vendor/autoload.php';

$strs = ["flower", "flow", "flight"];
//$strs = ["dog", "racecar", "car"];

Assert::eq((new Solution())->longestCommonPrefix($strs), 'fl');
