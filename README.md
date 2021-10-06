# Unique-Number-Generator

Easy creation of unique number generator for your Eloquent models in Laravel.

> **NOTE:** These instructions are for the latest version of Laravel.  
> If you are using an older version, please install a version of the package
> that [correlates to your Laravel version](#installation).


* [Installation](#installation)
* [Usage](#usage)
* [Bugs, Suggestions, Contributions and Support](#bugs-suggestions-contributions-and-support)
* [Copyright and License](#copyright-and-license)


## Installation

Depending on your version of Laravel, you should install a different
version of the package.

1. Install the package via Composer:

    ```sh
    $ composer require mariuszmalek/unique-number-generator:dev-master
    ```

    The package will automatically register its service provider.

2. Optionally, publish the configuration file if you want to change any defaults:

    ```sh
    php artisan vendor:publish --provider="Malek\UniqueNumberGenerator\ServiceProvider"
    ```



## Usage

Saving a model is easy:

```php
$post = $post->number = 'CLI-' . GeneratorNumber::generateID(Client::class, 'number');
```



## Bugs, Suggestions, Contributions and Support

Please use [Github](https://github.com/mariuszmalek/unique-number-generator) for reporting bugs, 
and making comments or suggestions.
 
See [CONTRIBUTING.md](CONTRIBUTING.md) for how to contribute changes.



## Copyright and License

[unique-number-generator](https://github.com/mariuszmalek/unique-number-generator)
was written by [Mariusz Malek](https://mariuszmalek.com) and is released under the 
[MIT License](LICENSE.md).

Copyright (c) 2021 Mariusz Malek
