<?php

namespace Classes;

interface MovableInterface
{
    /**
     * Включает зажигание
     * @return mixed
     */
    public function start(): mixed;

    /**
     * Выключает зажигание
     * @return mixed
     */
    public function stop(): mixed;

    /**
     * Увеличивает скорость движения
     * @param int $unit
     * @return mixed
     */
    public function up(int $unit): mixed;

    /**
     * Уменьшает скорость движения
     * @param int $unit
     * @return mixed
     */
    public function down(int $unit): mixed;

    public function getName(): string;
}