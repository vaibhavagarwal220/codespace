<?php
/*$out=shell_exec("g++ ./src/compiler.cpp -o ./bin/Compier.EXE");
print_r($out);
exec("./bin/Compiler.EXE",$output,$st);
         echo "<br>output: " . implode("<br>", $output);*/
exec('g++ ./src/compile.cpp', $output, $return);

// Return will return non-zero upon an error
if (!$return) {
    echo "PDF Created Successfully";
} else {
    echo "PDF not created";
}
echo "<br>output: " . implode("<br>", $output);
?>