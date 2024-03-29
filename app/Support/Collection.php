<?php

namespace App\Support;

class Collection implements \IteratorAggregate, \JsonSerializable
{
    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    protected $items = [];

    public function __construct(array $items = [])
    {
       $this->items = $items;
    }

    public function get() : array
    {
        return $this->items;
    }

    public function count() : int
    {
        return count($this->items);
    }

    public function add(array $items)
    {
        $this->items = array_merge($this->items, $items);
    }

    public function merge(Collection $collection)
    {
        return $this->add($collection->get());
    }

    public function toJson()
    {
        return json_encode($this->items);
    }

    public function jsonSerialize()
    {
        return $this->items;
    }
}