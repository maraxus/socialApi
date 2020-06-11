<?php


namespace App\Repositories\Models;

use Illuminate\Support\Collection;

class User extends BaseModel
{
    protected $refs = [ 'friends' => ['model'=>self::class,'attr'=>'username','matchers'=>['fred','ted','Barney']] ];
    private $friends = array();
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
}
