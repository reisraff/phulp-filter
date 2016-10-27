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

$phulp->task('filter', function ($phulp) {
    $phulp->src(['src/'], '/html$/')
        ->pipe(new Filter(function (\Phulp\DistFile $distFile) {
            if ($distFile->getName() == 'foo.html') { // and then foo.html will be removed
                return true;
            }
        }));
});

```
