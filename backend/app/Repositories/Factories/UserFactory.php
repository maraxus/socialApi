<?php
namespace App\Repositories\Factories;

use App\Repositories\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class UserFactory
{
    private $generator;
    private $model;

    public function __construct(Faker $generator, User $model)
    {
        $this->generator = $generator;
        $this->model = $model;
    }

    public function spawnUser() {
        return [
            'name' => $this->generator->name,
            'email' => $this->generator->unique()->safeEmail,
            'username' => Str::random(10),
        ];
    }
}
