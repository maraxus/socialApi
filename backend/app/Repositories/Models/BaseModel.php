<?php


namespace App\Repositories\Models;


class BaseModel
{
    protected $refs = [];

    protected function addToRef(string $refKey, string $searchValue)
    {
        if (!$this->refs[$refKey]) return false;
        $this->refs[$refKey]['matchers'][] = $searchValue;
        return true;
    }

    public function getRefs()
    {
        return $this->refs;
    }
}
