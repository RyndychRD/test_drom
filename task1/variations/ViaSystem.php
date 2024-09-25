<?php

namespace Poman\TestDrom\Task1\variations;

use Poman\TestDrom\Task1\GetCount;

class ViaSystem extends GetCount
{


    public function calcCount(): static
    {
        $command = "find $this->startDir -type f -name \"count\"";
        $output = shell_exec($command);
        $files = explode("\n", trim($output ?: ''));
        foreach ($files as $file) {
            if ($file) {
                $this->incSumOfNumbersFromFile($file);
            }
        }
        return $this;
    }
}