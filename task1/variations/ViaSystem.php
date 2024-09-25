<?php

namespace Poman\TestDrom\Task1\variations;

use Poman\TestDrom\Task1\GetCount;

class ViaSystem extends GetCount
{


    public function calcCount(): static
    {
        $this->count = 2;
        return $this;
    }
}