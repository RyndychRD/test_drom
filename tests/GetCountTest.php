<?php

namespace Poman\TestDrom\Test;

use PHPUnit\Framework\TestCase;
use Poman\TestDrom\Task1\GetCount;
use Poman\TestDrom\Task1\GetCountOptions;

abstract class GetCountTest extends TestCase
{

    protected GetCount $variation;

    public function testNotExist()
    {
        GetCountOptions::setStartDirectory(__DIR__ . DIRECTORY_SEPARATOR . 'notExist');
        $this->customSetUp();
        $this->variation->calcCount();
        $this->assertEquals(0, $this->variation->getCount());
    }

    abstract protected function customSetUp();

    public function testEmptyDir()
    {
        if (!is_dir(__DIR__ . DIRECTORY_SEPARATOR . 'emptyDir')) {
            mkdir(__DIR__ . DIRECTORY_SEPARATOR . 'emptyDir');
        }
        GetCountOptions::setStartDirectory(__DIR__ . DIRECTORY_SEPARATOR . 'emptyDir');
        $this->customSetUp();
        $this->variation->calcCount();
        $this->assertEquals(0, $this->variation->getCount());
    }

    public function testNoCountInDirs()
    {
        GetCountOptions::setStartDirectory(__DIR__ . DIRECTORY_SEPARATOR . 'noCount');
        $this->customSetUp();
        $this->variation->calcCount();
        $this->assertEquals(0, $this->variation->getCount());
    }

    public function testCountInDir()
    {
        GetCountOptions::setStartDirectory(__DIR__ . DIRECTORY_SEPARATOR . 'countInDirectory');
        $this->customSetUp();
        $this->variation->calcCount();
        $this->assertEquals(6, $this->variation->getCount());
    }

    public function testCountInSubDir()
    {
        GetCountOptions::setStartDirectory(__DIR__ . DIRECTORY_SEPARATOR . 'countInSubDirectory');
        $this->customSetUp();
        $this->variation->calcCount();
        $this->assertEquals(16, $this->variation->getCount());
    }

    public function testSeveralCounts()
    {
        GetCountOptions::setStartDirectory(__DIR__ . DIRECTORY_SEPARATOR . 'severalCounts');
        $this->customSetUp();
        $this->variation->calcCount();
        $this->assertEquals(26, $this->variation->getCount());
    }

    public function testCountHasFloats()
    {
        GetCountOptions::setStartDirectory(__DIR__ . DIRECTORY_SEPARATOR . 'countHasFloats');
        $this->customSetUp();
        $this->variation->calcCount();
        $this->assertEquals(247.323, $this->variation->getCount());
    }

    public function testCountHasNothing()
    {
        GetCountOptions::setStartDirectory(__DIR__ . DIRECTORY_SEPARATOR . 'countHasNothing');
        $this->customSetUp();
        $this->variation->calcCount();
        $this->assertEquals(0, $this->variation->getCount());
    }

    public function testCountHasWords()
    {
        GetCountOptions::setStartDirectory(__DIR__ . DIRECTORY_SEPARATOR . 'countHasWords');
        $this->customSetUp();
        $this->variation->calcCount();
        $this->assertEquals(157.34, $this->variation->getCount());
    }

    public function testCountInCountDir()
    {
        GetCountOptions::setStartDirectory(__DIR__ . DIRECTORY_SEPARATOR . 'countInCountDir');
        $this->customSetUp();
        $this->variation->calcCount();
        $this->assertEquals(123, $this->variation->getCount());
    }
}