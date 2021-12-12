<?php


namespace Aigletter\Interfaces\Builder;


interface QueryInterface
{
    /**
     * @return string
     */
    public function toSql(): string;
}