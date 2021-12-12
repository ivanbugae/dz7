<?php

namespace Db;

use Aigletter\Interfaces\Builder\DbInterface;
use Aigletter\Interfaces\Builder\QueryInterface;
use PDO;

class Db implements DbInterface
{
    private PDO $sql;
    public function __construct(string $host, string $dbname, string $user, string $pass)
    {
        $this->sql = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }

    public function one(QueryInterface $query): object
    {
        $data = $this->sql->query((string) $query);
        return new FetchData($data->fetch(PDO::FETCH_ASSOC));
    }

    /**
     * @var QueryInterface $query
     */
    public function all(QueryInterface $query): array
    {
        $data = $this->sql->query((string) $query);
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }
}