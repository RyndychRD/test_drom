<?php

namespace Poman\TestDrom\Task1\variations;

use Poman\TestDrom\Task1\GetCount;

class ViaArray extends GetCount
{

    public function calcCount(): static
    {
        $this->count = 3;
        return $this;
    }
}