<?php

    /**
     * PHP Suku Kata
     *
     * (c) Ridhazis Faranto Najid <me@rfnaj.id>
     *
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace SukuKataLib;

    class SukuKataLib{


        /**
         * function untuk parsing suku kata
         * contoh, dengan diftong :
         * input : pandai, mau, boikot
         * output : pan-dai, mau, boi-kot
         * contoh, tanpa diftong :
         * input : pandai, mau, boikot
         * output : pan-da-i, ma-u, bo-i-kot
         *
         * @param string $str kata yang akan di parsing suku katanya
         * @param boolean $diftong apakah menggunakan huruf diftong atau tidak, default true
         * @return resource array of string yang berisi suku kata
         */
        public static function getSukuKata($str, $diftong=true){

            $res = [];

            while($str){
                $str = self::removeNonLetter(self::convertDashToSpace($str));
                $var = str_split($str);
                $firstVokalIndex=strcspn(strtolower($str), "aeiou");

                // jika sudah tidak ada lagi huruf vokal
                if($firstVokalIndex>=strlen($str)){
                    $resCount = count($res);
                    $resCount = $resCount > 0 ? $resCount -1 : 0;
                    $res[$resCount] .= $str;
                    break;
                }

                $target = $firstVokalIndex;
                $nextIndex =$firstVokalIndex+1;
                $next = strlen($str)>$nextIndex?$var[$nextIndex]:null;

                if(!self::isVokal($next)){
                    $next2Index = $firstVokalIndex+2;
                    $next2=strlen($str)>$next2Index?$var[$next2Index]:null;

                    if(self::isPotentiallyGabunganKonsonan($next)){
                        if(self::isGabunganKonsonan($next.$next2)){
                            $next2Index +=1;
                            $nextIndex +=1;
                            $next2=strlen($str)>$next2Index?$var[$next2Index]:null;
                        }
                    }

                    if(!self::isVokal($next2)){
                        $target=$nextIndex;
                    }
                }

                $target+=1;
                $split1 = substr($str,0,$target);
                $split2 = substr($str,$target);

                array_push($res,$split1);
                $str=$split2;
            }

            if($res[count($res)-1]===' ')
                array_pop($res);

            return $res;
        }

        /**
         * menghitung jumlah suku kata pada sebuah kata
         *
         * @param string $str kata yang akan dihitung suku katanya
         * @param string $algo algoritma yang digunakan DEFAULT, VOKAL
         * @return int jumlah suku kata
         */
        public static function countSukuKata($str, $algo="DEFAULT"){
            if($algo=="VOKAL") return self::countVokal($str);
            else return count(self::getSukuKata($str));
        }

        /**
         * menghitung huruf vokal
         *
         * @param string $str kata yang akan dihitung huruf vokalnya
         * @return int jumlah huruf vokal
         */
        public static function countVokal($str){
            return preg_match_all('/[aiueo]/i',$str,$matches);
        }

        /**
         * menghitung huruf konsonan
         *
         * @param string $str kata yang akan dihitung huruf konsonannya
         * @return int jumlah huruf konsonan
         */
        public static function countKonsonan($str){
            return preg_match_all('/[^aiueo]/i',$str,$matches);
        }

        /**
         * mengecek apakah huruf tersebut huruf vokal
         *
         * @param resource $char huruf yang dicek
         * @return boolean hasil pengecekan
         */
        public static function isVokal($char){
            $char = strtolower($char);
            return in_array($char,array('a','i','u','e','o'));
        }

        /**
         * get huruf vokal
         *
         * @param string $str kata/kalimat yang diambil huruf vokalnya saja
         * @return string hasil berupa string huruf vokal
         */
        public static function getVokal($str)
        {
            return preg_replace("/[^aiueo ]/", '',self::removeNonLetter($str));
        }

        /**
         * get huruf konsonan
         *
         * @param string $str kata/kalimat yang diambil huruf konsonannya saja
         * @return string hasil berupa string huruf konsonan
         */
        public static function getKonsonan($str)
        {
            return preg_replace("/[aiueo]/", '',self::removeNonLetter($str));
        }

        /**
         * mengecek apakah huruf tersebut adalah huruf gabungan konsonan
         * huruf gabungan konsonan yang dimaksud adalah 2 huruf yang berbunyi satu
         * contohnya huruf : sy, ng, ny, kh
         * contoh kata : syawal, ngantuk, nyenyak, akhir
         *
         * @param string $char karakter yang akan dicek
         * @return boolean hasil berupa boolean
         */
        private static function isGabunganKonsonan($char){
            $char = strtolower($char);
            return in_array($char,array('sy','ng','ny','kh'));
        }

        /**
         * mengecek apakah huruf tersebut berpotensi sebagai huruf gabungan konsonan
         *
         * @param string $char karakter akan dicek
         * @return boolean hasil berupa boolean
         */
        private static function isPotentiallyGabunganKonsonan($char){
            $char = strtolower($char);
            return in_array($char,array('s','y','n','g','k','h'));
        }

        /**
         * mengecek apakah huruf tersebut adalah huruf diftong
         * huruf diftong adalah gabungan huruf vokal yang memiliki satu suku kata saja
         * contoh huruf diftong : ai, au, ei, oi
         * contoh kata : syawal, pandai, mau, survei, boikot
         *
         * @param string $char karakter yang akan dicek
         * @return boolean hasil berupa boolean
         */
        private static function isDiftong($char){
            $char = strtolower($char);
            return in_array($char,array('ai','au','ei','oi'));
        }

        /**
         * menghapus karakter selain huruf kecuali spasi
         *
         * @param string $str kata/kalimat yang akan diproses
         * @return string hasil berupa string
         */
        public static function removeNonLetter($str){
            return preg_replace("/[^A-Za-z ]/", '',$str);
        }

        /**
         * mengonversi karakter dash (-) menjadi spasi
         *
         * @param string $str kata/kalimat yang akan diproses
         * @return string hasil berupa string
         */
        public static function convertDashToSpace($str){
            return preg_replace("/[--]/",' ',$str);
        }


    }
?>