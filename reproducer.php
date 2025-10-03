<?php
require 'vendor/autoload.php';
$crash_file_path = __DIR__ . '/samples/bugs/memory-exhaustion-crash-f5d89649.txt';
echo "====== Reproducing Bug ======\n";
echo "Input file: {$crash_file_path}\n\n";
if (!file_exists($crash_file_path)) {
    die("FATAL: Crash file not found!\n");
}
// ini_set('memory_limit', '1024M'); // set a large Memory but still EXHAUSTING!
$bad_pdf_content = file_get_contents($crash_file_path);
$parser = new \Smalot\PdfParser\Parser();
echo "Calling \$parser->parseContent()...\n";
$parser->parseContent($bad_pdf_content);
echo "\nScript finished.\n";
