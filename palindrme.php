<?php
function palindrmestrng(String $str){
    $revstr = strrev($str);
    if($revstr=$str)
    {
        echo "Palindrome String";

    }
}
print_r(palindrmestrng('Radar'));
?>
