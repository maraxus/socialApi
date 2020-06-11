<?php

namespace App\Repositories;
use Illuminate\Support\Collection;
use App\Repositories\Support\Contracts\ModelFactoryContract as Factory;

class UserRepository
{
    protected $userCollection;
    protected $userFactory;

    public function __construct(Factory $factory)
    {
        $this->userFactory = $factory;
        $this->userCollection = $factory->spawn(6);
    }

    public function getUserWithRefs(string $lookup,string $ref): Collection
    {
        return collect([]);
    }

    public function addUserNewFriend(string $username, string $friendUsername): bool
    {
        $user = $this->userCollection->firstWhere('username',$username);
        $user->addFriend($friendUsername);
        return true;
    }

}
