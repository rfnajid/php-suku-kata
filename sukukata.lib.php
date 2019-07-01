<?php
    class SukuKataLib{

        function getSyllables($str){

            $res = [];

            while($str){
                $str = $this->removeStringFromNonLetterExceptSpace($this->convertDashToSpace($str));
                $var = str_split($str);
                $firstVowelIndex=strcspn(strtolower($str), "aeiou");

                $target = $firstVowelIndex;
                $nextIndex =$firstVowelIndex+1;
                $next = $var[$nextIndex];

                if(!$this->isVowel($next)){
                    $next2Index = $firstVowelIndex+2;
                    $next2=$var[$next2Index];

                    if($this->isPotentiallySpecialCharacter($next)){
                        if($this->isSpecialCharacters($next.$next2)){
                            $next2Index +=1;
                            $nextIndex +=1;
                        }
                    }

                    if(!$this->isVowel($next2)){
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

        function countSyllabels($string){
            return $this->countVowel($string);
        }

        function countVowel($string){
            return preg_match_all('/[aiueo]/i',$string,$matches);
        }

        function isVowel($char){
            $char = strtolower($char);
            return in_array($char,array('a','i','u','e','o'));
        }

        function isPotentiallySpecialCharacter($char){
            $char = strtolower($char);
            return in_array($char,array('s','y','n','g','k','h'));
        }

        function isSpecialCharacters($char){
            $char = strtolower($char);
            return in_array($char,array('sy','ng','ny','kh'));
        }

        function removeVowel($str)
        {
            return preg_replace("/[aiueo]/", '',$this->removeStringFromNonLetterExceptSpace($str));
        }

        function removeStringFromNonLetterExceptSpace($str){
            return preg_replace("/[^A-Za-z ]/", '',$str);
        }

        function convertDashToSpace($str){
            return preg_replace("/[--]/",' ',$str);
        }


    }
?>