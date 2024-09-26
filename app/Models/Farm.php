<?php


namespace App\Models;


class Farm
{
    /**
     * @var array
     */
    private $animals = [];

    /**
     * @param Animal $animal
     */
    public function addAnimal(Animal $animal)
    {
        $this->animals[$animal->getId()] = $animal;
    }

    /**
     * @return array
     */
    public function collectProducts()
    {
        $milk = 0;
        $eggs = 0;

        foreach ($this->animals as $animal) {
            if ($animal instanceof Cow) {
                $milk += $animal->produce();
            } elseif ($animal instanceof Chicken) {
                $eggs += $animal->produce();
            }
        }

        return ['milk' => $milk, 'eggs' => $eggs];
    }

    /**
     * @return int[]
     */
    public function getAnimalCount(): array
    {
        $counts = ['cows' => 0, 'chickens' => 0];

        foreach ($this->animals as $animal) {
            if ($animal instanceof Cow) {
                $counts['cows']++;
            } elseif ($animal instanceof Chicken) {
                $counts['chickens']++;
            }
        }

        return $counts;
    }
}
