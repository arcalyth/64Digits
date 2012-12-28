<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Registration';
?>


<div class="frontpage-section">
	<div class="section-header">
		<h1>Things to know before registering</h1>
	</div>
	<div class="section-content rules">
		<h2>Make your blogs interesting</h2>
		<p>When writing blogs, make sure they are at least 300 characters. We are less strict for first blogs, but still.</p>
		<h2>Commenting with class</h2>
		<p>Write constructive or funny comments. More than just, "LOL" or, "Good Game" preferably.</p>
		<h2>Mods are your friends</h2>
		<p>If a user has an icon next to their name on the active users list that is not a green person, it means they are a moderator. If you need help, go to them. Personal messages are the best way to contact us.</p>
		<h2>Avoid Flaming</h2>
		<p>Keep the flame wars at home, children.</p>
        <h2>That's it!</h2>
        <p>We hope you enjoy your stay. For a more comprehensive list of rules, see <a href="<?php echo Yii::app()->request->baseUrl; ?>/home/rules">the rule page</a>.</p>
		<br/>
	</div>
</div>

<div class="frontpage-section">
	<div class="section-header">
		<h1>New User Registration</h1>
	</div>
	<div class="section-content">

		<div class="form">
			<form action="<?php echo Yii::app()->request->baseUrl; ?>/home/register" method="POST">
				<div class="row">
					<label for="fullname">Full Name:</label>
					<input type="text" name="fullname"/>
				</div>
				
				<div class="row">
					<label for="username">Username:</label>
					<input type="text" name="username"/>
				</div>
				
				<div class="row">
					<label for="password">Password:</label>
					<input type="password" name="password"/>
				</div>
				
				<div class="row">
					<label for="password2">Confirm Password:</label>
					<input type="password" name="password2"/>
				</div>
				
				<div class="row">
					<label for="email">Email Address:</label>
					<input type="email" name="email"/>
				</div>
				
				<div class="row">
					<label for="sex">Gender:</label>
					<select name="sex">
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                    </select>
				</div>
                
				<div class="row">
					<input type="checkbox" name="terms"/>
					<span>I agree to the <a href="<?php echo Yii::app()->request->baseUrl; ?>/home/terms">terms and conditions</a>.</span>
				</div>
				
				<div class="row">
					<input type="submit" name="register_form" value="Register"/>
				</div>
			</form>
		</div><!-- form -->

		<br/>
	</div>
</div>
