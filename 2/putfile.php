<?php
use sinacloud\sae\Storage as Storage;
$storage = new Storage();
print_r($storage->listBuckets(false));
?>