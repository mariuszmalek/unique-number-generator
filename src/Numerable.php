<?php

declare(strict_types=1);

use Malek\UniqueNumberGenerator\Support\GeneratorNumber;
use Illuminate\Database\Eloquent\Builder;

trait Numberable
{
    /**
     * Indicates if the IDs are UUIDs.
     *
     * @return string
     */
    protected function uniqueColumn(): string
    {
        return $this->uniqueColumn;
    }

    public static function bootNumerable(): void
    {
        static::creating(function ($model) {
            if ($model->uniqueColumn() && empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = GeneratorNumber::generateID($model, $model->getKeyName(), $model->getKeyName() . '-', []);
            }
        });
    }
}