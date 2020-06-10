<?php


namespace App\Repositories\Support\Contracts;

interface ModelFactoryContract
{

    /**
     * Generate one or more random users
     * @param int $quantity
     * @return array|mixed
     */
    public function spawn(int $quantity = 0);
}
