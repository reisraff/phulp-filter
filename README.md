# phulp-filter

The filter addon for [PHULP](https://github.com/reisraff/phulp).

## Install

```bash
$ composer require reisraff/phulp-filter
```

## Usage

```php
<?php

use Phulp\Filter\Filter;
use Phulp\DistFile;

$phulp->task('filter', function ($phulp) {
    $phulp->src(['src/'], '/html$/')
        ->pipe(new Filter(function (DistFile $distFile) {
            // and then foo.html will be removed
            return $distFile->getName() !== 'foo.html' ? true : false;
        }));
});

```
