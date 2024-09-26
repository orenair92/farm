<?php


namespace App\Models;


/**
 * Class Chicken
 * @package App\Models
 */
class Chicken extends Animal
{

    /**
     * Chicken constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        parent::__construct($id, 'chicken');
    }

    /**
     * @return int
     */
    public function produce(): int
    {
        return rand(0, 1); // Возвращает количество яиц
    }
}
