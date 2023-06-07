<?php


class Sql
{
    protected $table;
    protected $select;
    protected $where;
    protected $order;
    protected $limit;
    protected $offset;

    public function __construct($table, $select, $where, $order, $limit, $offset)
    {
        $this->table = $table;
        $this->select = $select;
        $this->where = $where;
        $this->order = $order;
        $this->limit = $limit;
        $this->offset = $offset;
    }
}