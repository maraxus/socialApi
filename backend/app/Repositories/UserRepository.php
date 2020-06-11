<?php

namespace App\Repositories;
use foo\bar;
use Illuminate\Support\Collection;
use App\Repositories\Support\Contracts\ModelFactoryContract as Factory;

class UserRepository
{
    protected $userCollection;
    protected $userFactory;

    public function __construct(Factory $factory)
    {
        $this->userFactory = $factory;
        $this->userCollection = collect($this->userFactory->spawn(6));
        $barney = $this->userFactory->testUser('Barney');
        $Ted = $this->userFactory->testUser('Ted');
        $Marshall = $this->userFactory->testUser('Marshall');
        $this->userCollection->push($barney);
        $this->userCollection->push($Ted);
        $this->userCollection->push($Marshall);
    }

    public function getUserWithRefs(string $username, string $ref)
    {
        $user = $this->userCollection->firstWhere('username',$username);
        if (!$user) return false;
        $user = $this->resolveRef('friends', $user);
        return $user;
    }

    public function addUserNewFriend(string $username, string $friendUsername)
    {
        $user = $this->userCollection->firstWhere('username',$username);
        $user->addFriend($friendUsername);
        $user = $this->resolveRef('friends',$user);
        return $user;
    }

    protected function resolveRef(string $refName, $user)
    {
        return $user;
        $ref = $user->getRefs()[$refName];
        if (!$ref || count($ref) < 1) return false;
        $search = $this->userCollection->whereIn($ref['attr'],$ref['matchers']);
        $user->{ "set{$ref['refAttr']}" }($search);
        return $user;
    }

}
