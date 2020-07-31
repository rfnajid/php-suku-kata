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
         * function untuk parsing suku kata berdasarkan vokalnya
         * huruf diftong tidak digunakan sama sekali pada function ini
         * contoh :
         * input : pandai, mau, boikot
         * output : pan-da-i, ma-u, bo-i-kot
         *
         *
         * @param string $str kata yang akan di parsing suku katanya
         * @return resource array of string yang berisi suku kata
         */
        public static function getSukuKata($str){

            $res = [];

            while($str){
                $str = self::removeNonLetter(self::convertDashToSpace($str));
                $var = str_split($str);
                $firstVokalIndex=strcspn(strtolower($str), "aeiou");

                // jika sudah tidak ada lagi huruf vokal
                if($firstVokalIndex>=strlen($str)){
                    $res[count($res)-1] .= $str;
                    break;
                }

                $target = $firstVokalIndex;
                $nextIndex =$firstVokalIndex+1;
                $next = $var[$nextIndex];

                if(!self::isVokal($next)){
                    $next2Index = $firstVokalIndex+2;
                    $next2=$var[$next2Index];

                    if(self::isPotentiallyGabunganKonsonan($next)){
                        if(self::isGabunganKonsonan($next.$next2)){
                            $next2Index +=1;
                            $nextIndex +=1;
                            $next2=$var[$next2Index];
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
         * menghitung suku kata dengan cepat
         *
         * @param string $str kata yang akan dihitung suku katanya
         * @return int jumlah suku kata
         */
        public static function countSukuKata($str){
            return self::countVokal($str);
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
         * mengecek apakah huruf tersebut adalah huruf spesial
         * huruf spesial yang dimaksud adalah 2 huruf yang berbunyi satu
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
         * mengecek apakah huruf tersebut berpotensi sebagai huruf spesial
         *
         * @param string $char karakter akan dicek
         * @return boolean hasil berupa boolean
         */
        private static function isPotentiallyGabunganKonsonan($char){
            $char = strtolower($char);
            return in_array($char,array('s','y','n','g','k','h'));
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