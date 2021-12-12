<?php


namespace Aigletter\Interfaces\Builder;


interface DbInterface
{
    /**
     * @param QueryInterface $query
     * @return object
     */
    public function one(QueryInterface $query): object;

    /**
     * @param QueryInterface $query
     * @return object[]
     */
    public function all(QueryInterface $query): array;
}