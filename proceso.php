<?php
    $n1 = $_POST["n1"];
    $n2 = $_POST["n2"];
    if(isset($n1) && isset($n2)){
        echo $n1 + $n2;
    }

?>