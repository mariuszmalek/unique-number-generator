<?php

declare(strict_types=1);

namespace Malek\UniqueNumberGenerator\Support;

use Generator;
use Malek\UniqueNumberGenerator\Exceptions\GeneratorException;

class GeneratorNumber
{
    public static $limitIterations = 100000;

    /**
     * @param string $column
     * @param string $modelClass
     * @param string $prefix
     * @param array $params
     * @return string
     * @throws GeneratorException
     */
    public static function generateID(string $modelClass, string $column, string $prefix = null, array $params = []): string
    {
        return self::run(
            $modelClass,
            $column,
            $prefix,
            $params,
            self::IDGenerator(),
            'Generation id is failed. The loop limit exceeds ' . self::$limitIterations
        );
    }

    /**
     * @param string     $modelClass
     * @param string     $column
     * @param \Generator $generator
     * @param string     $exceptionMessage
     * @param array      $params
     * @return string
     * @throws GeneratorException
     */
    protected static function run(string $modelClass, string $column, string $prefix = null, array $params = [], Generator $generator, string $exceptionMessage): string
    {
        try {
            foreach ($generator as $id) {

                /**
                 * If has prefix then update $id
                 */
                (string) $combineID = self::prefixSet($id, $prefix);

                $query = $modelClass::where([$column => $combineID]);

                /**
                 * Search by params
                 */
                foreach ($params as $param) {
                    $query->where(...$param);
                }

                if (!$query->first()) {
                    return $combineID;
                }
            }
        } catch (\Throwable $e) {
            $exceptionMessage = $e->getMessage();
        }

        throw new GeneratorException($exceptionMessage);
    }

    protected static function IDGenerator(): Generator
    {
        for ($i = 1; $i <= self::$limitIterations; $i++) {
            yield (string)random_int(0000001, 9999999);            
        }
        return null;
    }

    /**
     * @param string $id
     * @param string $prefix
     * @return string
     */
    protected static function prefixSet(string $id, string $prefix)
    {
        return $prefix ? $prefix . $id : $id;
    }
}
