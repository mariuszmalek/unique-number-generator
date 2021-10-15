<?php

declare(strict_types=1);

use Malek\UniqueNumberGenerator\Support\GeneratorNumber;
use Illuminate\Database\Eloquent\Builder;

trait Numberable
{
    /**
     * @return string
     */
    protected function uniqueColumn(): string
    {
        return $this->uniqueColumn;
    }

    public static function bootNumerable(): void
    {
        static::creating(function ($model) {
            if ($model->uniqueColumn()) {
                $model->{$model->uniqueColumn()} = GeneratorNumber::generateID($model, $model->uniqueColumn(), static::getPrefix($model->getKeyName()), []);
            }
        });
    }

    public static function getPrefix($prefix)
    {
        return $prefix ? $prefix . '-' : null;
    }
}