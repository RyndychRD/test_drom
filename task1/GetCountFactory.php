<?php

namespace Poman\TestDrom\Task1;

use Exception;
use Poman\TestDrom\Task1\variations\ViaArray;
use Poman\TestDrom\Task1\variations\ViaRecursion;
use Poman\TestDrom\Task1\variations\ViaSystem;


abstract class GetCountFactory
{
    /**
     * @return ViaRecursion
     * @throws Exception
     */
    public static function getRecursiveVariation(): ViaRecursion
    {
        return self::create('recursive');
    }

    /**
     * @throws Exception
     */
    public static function create(string $type): ViaRecursion|ViaSystem|ViaArray
    {
        return match ($type) {
            'recursive' => new ViaRecursion(),
            'visitor' => new ViaArray(),
            'system' => new ViaSystem(),
            default => throw new Exception("Unsupported type: $type"),
        };
    }

    /**
     * @return ViaArray
     * @throws Exception
     */
    public static function getVisitorVariation(): ViaArray
    {
        return self::create('visitor');
    }

    /**
     * @return ViaSystem
     * @throws Exception
     */
    public static function getSystemVariation(): ViaSystem
    {
        return self::create('system');
    }
}