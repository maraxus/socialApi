<?php
namespace App\Repositories\Factories;

use App\Repositories\Models\User;
use App\Repositories\Support\Contracts\ModelFactoryContract;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class UserFactory implements ModelFactoryContract
{
    private $generator;
    private $model = User::class;

    /**
     * UserFactory constructor.
     * @param $generator
     */
    public function __construct(Faker $generator)
    {
        $this->generator = $generator;
    }


    /**
     * Generate one or more random users
     * @param int $quantity
     * @return array|mixed
     */
    public function spawn(int $quantity = 0) {
        $results = array();

        if (!$quantity) {
            return new $this->model(
                $this->generator->name,
                $this->generator->unique()->safeEmail,
                Str::random(10)
            );
        }

        for ($i = 0;$i <= ($quantity - 1);$i++) {
            $results[] = new $this->model(
                $this->generator->name,
                $this->generator->unique()->safeEmail,
                Str::random(10)
            );
        }
        return $results;
    }
}
