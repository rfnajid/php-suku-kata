<?php

namespace SukuKataTest;

class TestModel {
    public $value;
    public $param;
    public $expectedResult;

    public function __construct($value,$expectedResult,$param=null) {
        $this->value = $value;
        $this->expectedResult = $expectedResult;
        $this->param = $param;
    }
}