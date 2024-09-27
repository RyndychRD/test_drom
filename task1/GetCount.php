<?php

namespace Poman\TestDrom\Task1;

abstract class GetCount implements GetCountInterface
{
    protected string $filename;
    protected string $startDir;

    protected float $count = 0;

    public function __construct()
    {
        $this->filename = GetCountOptions::getFilename();
        $this->startDir = GetCountOptions::getStartDirectory();

    }


    public function getCount(): float
    {
        return $this->count;
    }

    protected function getListOfFiles(string $dir): array
    {
        if (!is_dir($dir)) {
            return [];
        }
        return array_diff(scandir($dir), [ '.', '..' ]);
    }

    protected function incSumOfNumbersFromFile(string $file): void
    {
        $string = file_get_contents($file);
        preg_match_all('/-?\d+(\.\d+)?/', $string, $matches);
        $this->count = round($this->count + array_sum($matches[0]), 3);
    }
}