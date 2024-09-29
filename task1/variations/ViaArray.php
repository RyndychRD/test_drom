<?php

namespace Poman\TestDrom\Task1\variations;

use Poman\TestDrom\Task1\GetCount;

class ViaArray extends GetCount
{


    public function calcCount(): static
    {
        $currentDirFiles = $this->getListOfFiles($this->startDir);
        foreach ($currentDirFiles as $key => $currentDirFile) {
            $currentDirFiles[$key] = [ 'path' => $this->startDir . DIRECTORY_SEPARATOR . $currentDirFile, 'name' => $currentDirFile ];
        }
        $newPaths = [];
        while (!empty($currentDirFiles) || !empty($newPaths)) {
            if (empty($currentDirFiles)) {
                $currentDirFiles = $newPaths;
                $newPaths = [];
            }
            $item = array_pop($currentDirFiles);
            $path = $item['path'];
            $name = $item['name'];
            if (is_dir($path)) {
                $pathsToVisit = $this->getListOfFiles($path);
                foreach ($pathsToVisit as $pathToVisit) {
                    $newPaths[] = [ 'path' => $path . DIRECTORY_SEPARATOR . $pathToVisit, 'name' => $pathToVisit ];
                }
            }
            elseif ($name === $this->filename) {
                $this->incSumOfNumbersFromFile($path);
            }
        }

        return $this;
    }
}