<?php

$cmd = "npm run build";
echo "build: " . $cmd . "\n";
$done = shell_exec($cmd);
print_r($done);

$cmd  = "rm ../event-lab-server/public_html/public/assets/*";
$done = shell_exec($cmd);
echo "clean: " . $cmd . "\n";

$cmd  = "cp dist/assets/* ../event-lab-server/public_html/public/assets/.";
$done = shell_exec($cmd);
echo "copy : " . $cmd . "\n";

$cmd  = "cp dist/index.html ../event-lab-server/public_html/public/.";
$done = shell_exec($cmd);
echo "copy : " . $cmd . "\n";
