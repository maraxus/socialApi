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
        $this->userCollection = collect($factory->spawn(6));
    }

    public function getUserWithRefs(string $lookup,string $ref)
    {
        $user = $this->userCollection->firstWhere('username',$lookup);
        if (!$user) return false;
        $user->resolveRes($ref);
        return $user;
    }

    public function addUserNewFriend(string $username, string $friendUsername)
    {
        $user = $this->userCollection->firstWhere('username',$username);
        if (!$user) return false;
        $user->addFriend($friendUsername);
        return $user;
    }

}
