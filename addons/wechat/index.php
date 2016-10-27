<<<<<<< HEAD
<?php

	use Wechat\WeChatManage;

	use Wechat\Wechat;

	

	!defined('IN_APP') && exit('Access Denied!');

	switch($action)

	{

		case 'auth20':

			if(trim($redirect_url))

			{

				set_cookie('redirect_url',trim($redirect_url));

			}

			WeChat::wechatAuth(U(MOD,'auth20'),trim($redirect_url));

			exit();

			break;

		case 'tel':

			break;

		case 'map':

			break;

		case 'view':

			break;

		default:

			WeChat::run($PW['wechat_token']);

			break;

	}

=======
<?php

	use Wechat\WeChatManage;

	use Wechat\Wechat;

	

	!defined('IN_APP') && exit('Access Denied!');

	switch($action)

	{

		case 'auth20':

			if(trim($redirect_url))

			{

				set_cookie('redirect_url',trim($redirect_url));

			}

			WeChat::wechatAuth(U(MOD,'auth20'),trim($redirect_url));

			exit();

			break;

		case 'tel':

			break;

		case 'map':

			break;

		case 'view':

			break;

		default:

			WeChat::run($PW['wechat_token']);

			break;

	}

>>>>>>> 0bf04d7e2c54c4e9169ec82dd21f29e389717c56
?>