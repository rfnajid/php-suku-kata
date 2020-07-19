<?php

namespace SukuKataTest;

use SukuKataTest\TestModel;

class DataTest {

    public function getSukuKata() {
        return [
            new TestModel("minuman", ["mi","nu","man"]),
            new TestModel("ikhlas", ["ikh","las"]),
            new TestModel("syukur", ["syu","kur"])
        ];
    }

    public function countSukuKata() {
        return [
            new TestModel("minuman", 3),
            new TestModel("ikhlas", 2),
            new TestModel("syukur", 2)
        ];
    }

    public function isVokal() {
        return [
            new TestModel("a", true),
            new TestModel("u", true),
            new TestModel("i", true),
            new TestModel("e", true),
            new TestModel("o", true),
            new TestModel("c", false),
            new TestModel("d", false),
            new TestModel("l", false),
            new TestModel("q", false),
            new TestModel("s", false)
        ];
    }

    public function getVokal() {
        return [
            new TestModel("anjing", "ai"),
            new TestModel("kadal-gurun", "aauu"),
            new TestModel("kampret", "ae"),
            new TestModel("donat", "oa"),
            new TestModel("statistika", "aiia"),
            new TestModel("trigonometri", "iooei")
        ];
    }

    public function getKonsonan() {
        return [
            new TestModel("anjing", "njng"),
            new TestModel("kadal-gurun", "kdlgrn"),
            new TestModel("kampret", "kmprt"),
            new TestModel("donat", "dnt"),
            new TestModel("statistika", "sttstk"),
            new TestModel("trigonometri", "trgnmtr")
        ];
    }

    public function removeNonLetter() {
        return [
            new TestModel("k3193up39u-$%@#5kup0)u+=2934", "kupukupu"),
            new TestModel("kad😅al-gurun", "kadalgurun"),
            new TestModel("123", ""),
            new TestModel("donat", "donat"),
            new TestModel("aå®isß≈h~i∂t~`e-ru$", "aishiteru"),
            new TestModel("AKU", "AKU")
        ];
    }

    public function convertDashToSpace() {
        return [
            new TestModel("suku-kata", "suku kata"),
            new TestModel("kadal-gurun", "kadal gurun"),
            new TestModel("kerja-rodi", "kerja rodi"),
            new TestModel("gula-donat", "gula donat"),
            new TestModel("cumi-cumi", "cumi cumi"),
            new TestModel("kentang-goreng", "kentang goreng")
        ];
    }
}
