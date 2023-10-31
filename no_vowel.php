function isVowel($vow){
    return ($vow=='a'||$vow=='i'||$vow=='e'||$vow=='o'||$vow=='u');
}
function count_vowels(String $str){
    $count =0;
    for($i=0;$i< strlen($str);$i++){
        if(isVowel($str[$i])){
            $count++;
        }

    }
    return $count;
}
$c= count_vowels('Namibia');
echo $c."vowels are in string ‘Namibia’";