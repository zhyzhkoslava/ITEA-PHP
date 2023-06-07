<?php

require 'SqlBuilderInterface.php';
require 'SqlBuilder.php';

$builder = new SqlBuilder();

$sql = $builder->select(['last_name'])
        ->table('users, workers')
        ->where(['status', '!=', 'active'])
        ->order(['id', '=', 'DESC'])
        ->limit(20)
        ->offset(40)
        ->getSql();

var_dump($sql);