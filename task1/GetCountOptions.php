<?php

namespace Poman\TestDrom\Task1;

use Exception;

// Можно было обойтись $_ENV в рамках задания, но захотелось так
abstract class GetCountOptions
{
    const  DEFAULT_DIR = __DIR__ . DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR;
    const  DEFAULT_FILENAME = 'count';
    private static string $filename = self::DEFAULT_FILENAME;
    private static string $startDirectory = self::DEFAULT_DIR;

    public static function getStartDirectory(): string
    {
        return self::$startDirectory;
    }

    public static function setStartDirectory(string $startDirectory = self::DEFAULT_DIR): void
    {
        self::$startDirectory = $startDirectory;
    }

    public static function getFilename(): string
    {
        return self::$filename;
    }

    /**
     * @throws Exception
     */
    public static function setFilename(string $filename = self::DEFAULT_FILENAME): void
    {
        self::validateFilename($filename);
        self::$filename = $filename;
    }

    /**
     * @throws Exception
     */
    private static function validateFilename(string $filename): void
    {
        if (empty($filename)) {
            throw new Exception('Filename cannot be empty');
        }
    }


}