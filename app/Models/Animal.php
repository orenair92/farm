<?php

namespace App\Models;

abstract class Animal
{
    protected int $id;
    protected string $type;

    /**
     * Animal constructor.
     * @param int $id
     * @param string $type
     */
    public function __construct(int $id, string $type)
    {
        $this->id = $id;
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    abstract public function produce(): int;
}
