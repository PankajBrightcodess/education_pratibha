<?php
function execPrint($command) {
    $result = array();
    exec($command, $result);
    foreach ($result as $line) {
        print($line . "<br>");
    }
}
// Print the exec output inside of a pre element
print("<pre>" . execPrint("git pull https://PankajBrightcodess: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@github.com/PankajBrightcodess/education_pratibha.git main")."</pre>");
?>