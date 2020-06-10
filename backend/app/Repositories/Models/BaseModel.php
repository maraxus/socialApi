<?php


namespace App\Repositories\Models;


class BaseModel
{
    protected $refs = [];
    protected function addRef(string $refKey,string $searchKey,string $searchValue)
    {
        if (!in_array($refKey,$this->refs)) return false;
        $this->refs[$refKey][] = [$searchKey,$searchValue];
        return true;
    }
}
