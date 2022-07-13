#!/usr/bin/env php
<?php

$row = 0;
$handle = fopen('./raw/all-words.csv', 'rb');
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $line = trim($line);
        if (empty($line)) {
            continue;
        }
        echo '{ "index" : { "_index" : "autocomplete" } }' . PHP_EOL;
        echo sprintf('{ "word" : "%s"}%s', $line, PHP_EOL);
        // Uncomment line below if you want to set a limit
        if (++$row > 1000) {
            exit;
        }
    }
    fclose($handle);
}
