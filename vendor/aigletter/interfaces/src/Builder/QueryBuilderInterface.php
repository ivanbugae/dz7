<?php


namespace Aigletter\Interfaces\Builder;


interface QueryBuilderInterface extends BuilderInterface
{
    /**
     * @return QueryInterface
     */
    public function build(): QueryInterface;
}