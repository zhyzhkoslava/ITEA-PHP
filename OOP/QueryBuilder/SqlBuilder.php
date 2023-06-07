<?php

require 'Sql.php';

class SqlBuilder implements SqlBuilderInterface
{
    protected $query;

    public function table(string $table)
    {
        $this->query .= ' FROM ' . $table;

        return $this;
    }

    public function select(array $select)
    {
        $this->query = "SELECT " . implode(", ", $select);

        return $this;
    }

    public function where(array $where)
    {
        $field = $where[0];
        $operator = $where[1];
        $value = $where[2];
        $this->query .= " WHERE $field $operator '$value'";

        return $this;
    }

    public function order(array $order)
    {
        $field = $order[0];
        $operator = $order[1];
        $value = $order[2];
        $this->query .= " ORDER BY $field $operator '$value'";

        return $this;
    }

    public function limit(int $limit)
    {
        $this->query .= ' LIMIT ' . $limit;
        return $this;
    }

    public function offset(int $offset)
    {
        $this->query .= ' OFFEST ' . $offset;
        return $this;
    }

    public function getSql()
    {
        return $this->query . ';';
    }
}