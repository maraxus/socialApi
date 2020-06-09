<?php
namespace App\Repositories;
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class UserFactory
{

    private $generator;
    public function __construct(Faker $generator)
    {
        $this->generator = $generator;
    }

    public function generateUser() {
        return [
            'name' => $this->generator->name,
            'email' => $this->generator->unique()->safeEmail,
            'username' => Str::random(10),
        ];
    }


}
