
<?php
require('random.php');
$permitted_chars = 'HIJKLMNOPQRST';
// Output: iNCHNGzByPjhApvn7XBD
function econ($permitted_chars) {
    $eco =  generate_string($permitted_chars, 1)."" .(string) (rand(1,12));
}
    //echo $eco;

?>