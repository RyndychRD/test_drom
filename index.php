<?php

require_once './vendor/autoload.php';

use Poman\TestDrom\Task1\GetCount;
use Poman\TestDrom\Task1\GetCountFactory;
use Poman\TestDrom\Task1\GetCountOptions;


function getCount(float $expectedVal): void
{
    try {
        GetCountOptions::logCurrentOptions();
        $variations = [
            GetCountFactory::getRecursiveVariation(),
        ];
        foreach ($variations as $variation) {
            /** @var GetCount $variation */
            $variation->calcCount()->logResult();
            if ($variation->getCount() === $expectedVal) {
                echo '<span style="background-color: darkseagreen">PASSED</span></br>';
            }
            else {
                echo "<span style=\"background-color: red\">FAILED, expected $expectedVal</span></br>";
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


$tests = [
    [ 'dir' => 'emptyDir', 'expected' => 0 ],
    [ 'dir' => 'noCount', 'expected' => 0 ],
    [ 'dir' => 'countInDirectory', 'expected' => 6 ],
    [ 'dir' => 'countInSubDirectory', 'expected' => 16 ],
    [ 'dir' => 'severalCounts', 'expected' => 26 ],
    [ 'dir' => 'countHasFloats', 'expected' => 247.323 ],
    [ 'dir' => 'countHasNothing', 'expected' => 0 ],
    [ 'dir' => 'countHasWords', 'expected' => 157.34 ],
];
foreach ($tests as $testCase) {
    GetCountOptions::setStartDirectory(GetCountOptions::DEFAULT_DIR . $testCase['dir']);
    getCount($testCase['expected']);
    echo '</br>';
}

