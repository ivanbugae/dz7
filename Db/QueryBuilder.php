<?php

namespace Db;

use Aigletter\Interfaces\Builder\BuilderInterface;
use Aigletter\Interfaces\Builder\QueryBuilderInterface;
use Aigletter\Interfaces\Builder\QueryInterface;

class QueryBuilder implements QueryBuilderInterface
{
    protected array $query= [];

    public function __construct()
    {
        $this->query['select'] = " * ";
        $this->query['table'] = "";
        $this->query['where'] = "";
        $this->query['order'] = "";
        $this->query['limit'] = "";
        $this->query['offset'] = "";
    }
    public function select($columns): BuilderInterface
    {
        $this->query['select'] = 'SELECT `'.implode('`,`',$columns).'`';
        return $this;
    }

    public function where($conditions): BuilderInterface
    {
        $this->query['where'] = "WHERE ".array_key_first($conditions)." = '".array_pop($conditions)."'";
        return $this;
    }

    public function table($table): BuilderInterface
    {
        $this->query['table'] = 'FROM `'.$table.'`';
        return $this;
    }

    public function limit($limit): BuilderInterface
    {
        $this->query['limit'] = "LIMIT ".$limit;
        return $this;
    }

    public function offset($offset): BuilderInterface
    {
        $this->query['offset'] = "OFFSET ".$offset;
        return $this;
    }

    public function order($order): BuilderInterface
    {
        $this->query['order'] = 'ORDER BY `'.array_key_first($order)."` ".array_pop($order);
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function build(): QueryInterface
    {
        return new Query($this->query);
    }
}