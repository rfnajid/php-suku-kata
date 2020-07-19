<?php

namespace SukuKataTest;

class TestModel {
    public $value;
    public $expectedResult;

    public function __construct($value, $expectedResult) {
        $this->value = $value;
        $this->expectedResult = $expectedResult;
    }
}