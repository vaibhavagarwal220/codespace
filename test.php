<?php
/*$out=shell_exec("g++ ./src/compiler.cpp -o ./bin/Compier.EXE");
print_r($out);
exec("./bin/Compiler.EXE",$output,$st);
         echo "<br>output: " . implode("<br>", $output);*/
//exec("echo 'Hello' 2>&1", $output, $return);
exec("./bin/Controller.EXE C 1 adminaccess/codes/atn1035.c adminaccess/input/atninp.txt adminaccess/output/atnout.txt 2>&1", $output,$return);
// Return will return non-zero upon an error
echo $return;
echo "<br>output: " . implode("<br>", $output);
?>