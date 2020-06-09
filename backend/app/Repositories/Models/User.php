<?php


namespace App\Repositories\Models;

use Illuminate\Support\Collection;

class User
{
    private $friends = array();
    public $name;
    public $email;
    public $username;

    /**
     * @return Collection
     */
    public function getFriends()
    {
        return collect($this->friends);
    }

}
