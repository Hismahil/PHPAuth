<?php

$em = include_once "Bootstrap.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($em);