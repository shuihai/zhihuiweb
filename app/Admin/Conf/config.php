<?php
return array(
		/* 权限相关配置 */
		'USER_AUTH_ON' => true,
		'USER_AUTH_TYPE' => 2,
		'USER_AUTH_KEY' => 'authId',
		'ADMIN_AUTH_KEY' => 'administrator',
		'USER_AUTH_MODEL' => 'User',
		'AUTH_PWD_ENCODER' => 'md5',
		'USER_AUTH_GATEWAY' => '/Admin/User/login',
		'NOT_AUTH_MODULE' => 'Public,Index',
		'REQUIRE_AUTH_MODULE' => '',
		'NOT_AUTH_ACTION' => 'User/login',
		'REQUIRE_AUTH_ACTION' => '',
		'GUEST_AUTH_ON' => false,
		'GUEST_AUTH_ID' => 0,
		'RBAC_ROLE_TABLE' => 'ez_role',
		'RBAC_USER_TABLE' => 'ez_role_user',
		'RBAC_ACCESS_TABLE' => 'ez_access',
		'RBAC_NODE_TABLE' => 'ez_node',
		'SPECIAL_USER' => 'admin',
		/* 分页相关配置 */
		'VAR_PAGE'        =>  'p',
		'PAGE'=>array(
			'theme'=>'%upPage% %linkPage% %downPage% %ajax%'
		),
	)
?>