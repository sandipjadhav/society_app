<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'user' => [
			'identityClass' => 'mdm\admin\models\User',
			'loginUrl' => ['admin/user/login'],
		],
		'authManager' => [
			'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
			'defaultRoles' => [
				'user',
				'moderator',
				'admin',
				'superadmin'
			],
		]
    ],
	'modules' => [
		'admin' => [
		    'layout' => 'left-menu', 
			'mainLayout' => '@app/views/layouts/main.php',
			'class' => 'mdm\admin\Module'
		]
	],
];
