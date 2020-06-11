<?php


namespace App\Repositories\Models;

use Illuminate\Support\Collection;
use App\Repositories\Models\BaseModel;

class User extends BaseModel
{
    protected $refs = [ 'friends' => [
        'model' => self::class,
        'attr'=>'username',
        'refAttr' => 'friends',
        'matchers'=>[]
    ] ];
    public $friends = array();
    public $name;
    public $email;
    public $username;

    /**
     * User constructor.
     * @param $name
     * @param $email
     * @param $username
     */
    public function __construct($name, $email, $username)
    {
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
    }

    /**
     * @return Collection
     */
    public function getFriends(): Collection
    {
        return collect($this->friends);
    }


    public function addFriend($username)
    {
        // The idea is that the model saves references as a form of relationship,and the outer repository resolve them
        // to $this->friends collection, on demand

        return $this->addToRef('friends', $username);
    }

    /**
     * @param array $friends
     */
    public function setFriends(Collection $friends): void
    {
        $this->friends = $friends;
    }
}
