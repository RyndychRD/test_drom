<?php

namespace Poman\TestDrom\Test;

use Poman\TestDrom\Task1\GetCountFactory;

class GetCountArrayTest extends GetCountTest
{

    public function customSetUp(): void
    {
        $this->variation = GetCountFactory::getArrayVariation();
    }
}
