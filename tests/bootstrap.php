<?php

# use strict mode while run tests
declare(strict_types = 1);

# set http host for test
$_SERVER['HTTP_HOST'] = 'integration.test.bigfish.hu';
$_ENV['HTTP_HOST'] = $_SERVER['HTTP_HOST'];