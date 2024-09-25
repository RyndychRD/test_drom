<?php

namespace Poman\TestDrom\Task1\variations;

use Poman\TestDrom\Task1\GetCount;

class ViaRecursion extends GetCount
{


    public function calcCount(?string $dir = null): static
    {
        $currentPath = $dir ?: $this->startDir;
        $currentDirFiles = $this->getListOfFiles($currentPath);
        foreach ($currentDirFiles as $currentDirFile) {
            $path = $currentPath . DIRECTORY_SEPARATOR . $currentDirFile;
            if (is_dir($path)) {
                $this->calcCount($path);
            }
            if ($currentDirFile === $this->filename) {
                $this->incSumOfNumbersFromFile($path);
            }

        }
        return $this;
    }
}