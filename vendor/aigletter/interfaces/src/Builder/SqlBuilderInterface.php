<?php


namespace Aigletter\Interfaces\Builder;


interface SqlBuilderInterface extends BuilderInterface
{
    /**
     * @return string
     */
    public function build(): string;
}