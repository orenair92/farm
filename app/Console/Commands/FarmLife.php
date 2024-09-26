<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Farm;
use App\Models\Cow;
use App\Models\Chicken;

class FarmLife extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'farm:life';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Simulate farm life';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $farm = new Farm();

        // Добавляем 10 коров
        for ($i = 1; $i <= 10; $i++) {
            $farm->addAnimal(new Cow($i));
        }

        // Добавляем 20 кур
        for ($i = 11; $i <= 30; $i++) {
            $farm->addAnimal(new Chicken($i));
        }

        // Выводим информацию о количестве животных
        $animalCount = $farm->getAnimalCount();
        $this->info("На ферме {$animalCount['cows']} коров и {$animalCount['chickens']} кур");

        // Сбор продукции за неделю
        $totalMilk = 0;
        $totalEggs = 0;

        for ($day = 1; $day <= 7; $day++) {
            $products = $farm->collectProducts();
            $totalMilk += $products['milk'];
            $totalEggs += $products['eggs'];
        }

        $this->info("За неделю собрано: {$totalMilk} литров молока и {$totalEggs} яиц.");

        // Добавляем 5 кур и 1 корову
        for ($i = 31; $i <= 35; $i++) {
            $farm->addAnimal(new Chicken($i));
        }
        $farm->addAnimal(new Cow(11)); // Новая корова с ID 11

        // Выводим обновленную информацию о количестве животных
        $animalCount = $farm->getAnimalCount();
        $this->info("Теперь на ферме {$animalCount['cows']} коров и {$animalCount['chickens']} кур");

        // Сбор продукции снова за неделю
        $totalMilk = 0;
        $totalEggs = 0;

        for ($day = 1; $day <= 7; $day++) {
            $products = $farm->collectProducts();
            $totalMilk += $products['milk'];
            $totalEggs += $products['eggs'];
        }

        $this->info("За вторую неделю собрано: {$totalMilk} литров молока и {$totalEggs} яиц.");
    }
}
