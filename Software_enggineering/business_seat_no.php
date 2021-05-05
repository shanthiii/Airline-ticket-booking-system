<?php
//require('random.php');
$permitted_chars = 'ABCDEFG';
 
// Output: iNCHNGzByPjhApvn7XBD
function busin() {
    $busi = generate_string($permitted_chars, 1)."" .(string) (rand(1,12));
}
// echo $busi;

?>