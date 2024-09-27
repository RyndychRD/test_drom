<?php

namespace Poman\TestDrom\Test;

use Poman\TestDrom\Task1\GetCountFactory;

class GetCountSystemTest extends GetCountTest
{

    public function customSetUp(): void
    {
        $this->variation = GetCountFactory::getSystemVariation();
    }

}