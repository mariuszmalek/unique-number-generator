<?php

namespace Malek\UniqueNumberGenerator\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Malek\UniqueNumberGenerator\Numerable;

class Product extends Model
{
    use Numberable;

    public function uniqueColumn(): string
    {
        return 'number';
    }
}