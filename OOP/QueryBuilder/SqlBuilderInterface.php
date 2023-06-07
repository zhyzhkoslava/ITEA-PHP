<?php


interface SqlBuilderInterface
{
    public function table(string $table);
    public function select(array $select);
    public function where(array $where);
    public function order(array $order);
    public function limit(int $limit);
    public function offset(int $offset);
    public function getSql();
}