<?php

namespace src;

interface MovableInterface
{
    /**
     * Включает зажигание
     * @return mixed
     */
    public function start();

    /**
     * Выключает зажигание
     * @return mixed
     */
    public function stop();

    /**
     * Увеличивает скорость движения на $unit
     * @param int $unit
     * @return mixed
     */
    public function up(int $unit);

    /**
     * Уменьшает скорость движения на $unit
     * @param int $unit
     * @return mixed
     */
    public function down(int $unit);
}