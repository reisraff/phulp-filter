<?php

namespace Phulp\Filter;

use Phulp\Source;

class Filter implements \Phulp\PipeInterface
{
    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @param Source $src
     */
    public function execute(Source $src)
    {
        foreach ($src->getDistFiles() as $key => $distFile) {
            $callback = $this->callback;
            if (! $callback($distFile)) {
                $src->removeDistFile($key);
            }
        }
    }
}
