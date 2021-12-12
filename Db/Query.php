<?php

namespace Db;

use Aigletter\Interfaces\Builder\QueryInterface;

class Query implements QueryInterface
{
    protected array $query = [];
    public function __construct(array $params)
    {
        if(empty($params['table'])){
            throw new \Exception('Table name not given');
        }
        $this->query = $params;
    }
    public function toSql(): string
    {
        return implode(' ',$this->query);
    }
    public function __toString()
    {
        return $this->toSql();
    }
}