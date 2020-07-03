<?php


namespace App\JsonRpc;


interface CalculatorServiceInterface
{
    public function add(int $a, int $b);

    public function sleep(int $a, int $b);
}