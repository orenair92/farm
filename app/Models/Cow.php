<?php

namespace App\Models;

/**
 * Class Cow
 * @package App\Models
 */
class Cow extends Animal
{
    /**
     * Cow constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        parent::__construct($id, 'cow');
    }

    /**
     * @return int
     */
    public function produce(): int
    {
        return rand(8, 12); // Возвращает количество литров молока
    }

}
