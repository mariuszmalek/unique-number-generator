<?php

namespace Malek\UniqueNumberGenerator\Support;

use Malek\UniqueNumberGenerator\Exceptions\GeneratorException;

class GeneratorNumber
{
    public static $limitIterations = 100000;

    /**
     * @param string $column
     * @param string $modelClass
     * @return string
     * @throws GeneratorException
     */
    public static function generateID(string $modelClass, string $column): string
    {
        return self::run(
            $modelClass,
            $column,
            self::IDGenerator(),
            'Generation id is failed. The loop limit exceeds ' . self::$limitIterations
        );
    }

    /**
     * @param string     $modelClass
     * @param string     $column
     * @param \Generator $generator
     * @param string     $exceptionMessage
     * @param array      $whereParams
     * @return string
     * @throws GeneratorException
     */
    protected static function run(string $modelClass, string $column, \Generator $generator, string $exceptionMessage, array $whereParams = []): string
    {
        try {
            foreach ($generator as $id) {
                $query = $modelClass::where([$column => $id]);
                foreach ($whereParams as $param) {
                    $query->where(...$param);
                }
                if (!$query->first()) {
                    return $id;
                }
            }
        } catch (\Throwable $e) {
            $exceptionMessage = $e->getMessage();
        }

        throw new GeneratorException($exceptionMessage);
    }

    protected static function IDGenerator(): ?\Generator
    {
        for ($i = 1; $i <= self::$limitIterations; $i++) {
            yield (string)random_int(0000001, 9999999);            
        }
        return null;
    }
}