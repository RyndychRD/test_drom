<?php

namespace Poman\TestDrom\Task1\variations;

use Poman\TestDrom\Task1\GetCount;

class ViaArray extends GetCount
{


    public function calcCount(): static
    {
        $currentDirFiles = $this->getListOfFiles($this->startDir);
        $currentDirFilesWithPath = [];
        foreach ($currentDirFiles as $currentDirFile) {
            $currentDirFilesWithPath[] = $this->startDir . DIRECTORY_SEPARATOR . $currentDirFile;
        }
        while (!empty($currentDirFilesWithPath)) {
            $path = array_pop($currentDirFilesWithPath);
            $name = substr($path, strrpos($path, DIRECTORY_SEPARATOR) + 1);
            if (is_dir($path)) {
                $pathsToVisit = $this->getListOfFiles($path);
                foreach ($pathsToVisit as $pathToVisit) {
                    $currentDirFilesWithPath[] = $path . DIRECTORY_SEPARATOR . $pathToVisit;
                }
            }
            elseif ($name === $this->filename) {
                $this->incSumOfNumbersFromFile($path);
            }
        }

        return $this;
    }
}