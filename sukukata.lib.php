<?php
    class SukuKataLib{

        function sliceSyllables($str){
            echo 'slicing : '.$str;
            echo '<br>';
            echo 'size : '.strlen($str);
            echo '<br>';

            $res = [];

            while($str){
                $var = str_split($this->removeStringFromNonLetter($str));
                $firstVowelIndex=strcspn(strtolower($str), "aeiou");

                $target = $firstVowelIndex;
                $nextIndex =$firstVowelIndex+1;
                $next = $var[$nextIndex];

                echo 'first vowel : '.$firstVowelIndex.'<br>';
                echo 'next of first vowel : '.$var[$firstVowelIndex+1].'<br>';

                if(!$this->isVowel($next)){
                    $next2Index = $firstVowelIndex+2;
                    $next2=$var[$next2Index];

                    if($this->isPotentiallySpecialCharacter($next)){
                        echo 'potentially special char : '.$next.'<br>';
                        if($this->isSpecialCharacters($next.$next2)){
                            echo 'special chartacter : '.$next.$next2.'<br>';
                            $next2Index +=1;
                            $nextIndex +=1;
                        }
                    }


                    echo('next 2 '.$next2.'<br>');

                    if(!$this->isVowel($next2)){
                        $target=$nextIndex;
                    }
                }

                $target+=1;
                $split1 = substr($str,0,$target);
                $split2 = substr($str,$target);

                echo ('<br>splice res : '.$split1.'<br>');
                array_push($res,$split1);
                $str=$split2;
                echo ('new str : '.$str.'<br>');
            }

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

        function removeStringFromNonLetter($str){
            return preg_replace("/[^A-Za-z]/", '', $str);
        }

    }
?>