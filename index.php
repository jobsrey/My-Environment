<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require('_protected/vendor/autoload.php');
require('_protected/vendor/yiisoft/yii2/Yii.php');

$config = require('_protected/config/web.php');

(new yii\web\Application($config))->run();
