<?php

class Promise
{
    private $resolve;
    private $reject;

    public function __construct($callback)
    {
        try {
            $this->callback = $callback(function ($resolve) {
                $this->resolve = $resolve;
            }, function ($reject) {
                $this->reject = $reject;
            });
        } catch (\Exception $e) {
            var_dump($e);
        }
    }

    public static function run($callback)
    {
        return (new self($callback));
    }

    public function then($callback)
    {
        if ($this->resolve) {
            $callback($this->resolve);
        }
        return $this;
    }

    public function catch($callback)
    {
        if ($this->reject) {
            $callback($this->reject);
        }
        return $this;
    }
}