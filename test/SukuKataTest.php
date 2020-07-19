<?php

namespace SukuKataTest;

use PHPUnit\Framework\TestCase;
use SukuKataLib\SukuKataLib;
use SukuKataTest\DataTest;
use Exception as Exception;

class SukuKataTest extends TestCase {

    private $sukuKataLib;
    private $dataTest;

    public function setUp() {
        $this->sukuKataLib = new SukuKataLib();
        $this->dataTest = new DataTest();
    }

    public function testGetSukuKata() {
        $this->template("getSukuKata");
    }

    public function countSukuKata() {
        $this->template("countSukuKata");
    }

    public function testIsVokal() {
        $this->template("isVokal");
    }

    public function testGetVokal() {
        $this->template('getVokal');
    }

    public function testGetKonsonan() {
        $this->template('getKonsonan');
    }

    public function testRemoveNonLetter() {
        $this->template('removeNonLetter');
    }

    public function testConvertDashToSpace() {
        $this->template('convertDashToSpace');
    }

    private function template($function){

        if(
            is_callable(array($this->dataTest, $function)) &&
            is_callable(array($this->sukuKataLib, $function))
        ){
            foreach ($this->dataTest->$function() as $data) {
                $this->assertEquals(
                    $data->expectedResult,
                    $this->sukuKataLib->$function($data->value)
                );
            }
        }else {
            throw new Exception($function. " is not a function");
        }
    }
}