<?php

namespace Poman\TestDrom\Test;

use Poman\TestDrom\Task1\GetCountFactory;

class GetCountRecursionTest extends GetCountTest
{

    public function customSetUp(): void
    {
        $this->variation = GetCountFactory::getRecursiveVariation();
    }

}