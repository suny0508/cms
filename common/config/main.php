<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=feehi',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8mb4',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', 
        ],
        'alioss' => [
            'class' => 'feehi\components\Alioss',
            'enable' => false,
            'accessKeyId' => "xxx",
            'accessKeySecret' => "xxxx",
            'endpoint' => "http://oss-cn-shanghai.aliyuncs.com",
            'bucket' => 'feehi',
            'directory' => 'cms'
        ],
        'qiniu' => [
            'enable' => false,
            'class' => 'feehi\components\Qiniu',
            'accessKey' => 'xxx',
            'secretKey' => 'xxxxxx',
            'bucket' => 'feehi',
            'directory' => 'cms',
        ],
        'formatter' => [
            'dateFormat' => 'php:Y-m-d H:i',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'EUR',
            'nullDisplay' => '-',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' =>false,//这句一定有，false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.feehi.com',  //每种邮箱的host配置不一样
                'username' => 'admin@feehi.com',
                'password' => 'password',
                'port' => '465',
                'encryption' => 'ssl',

            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['liufee@126.com'=>'admin']
            ],
        ],
    ],
];