<ul>
	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/"><?php echo $user->username; ?></a></li>
	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/">my page</a></li>
	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/media/submit">submit</a></li>
	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/inbox" class="inbox-link"><span>inbox</span> <span class="inline-badge">212</span></a></li>
	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/settings">settings</a></li>
	<li class="seperator"></li>
	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/home/logout">log out</a></li>
</ul>