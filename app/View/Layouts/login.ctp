<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cloud-UH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="../css/websites/bootstrap.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../css/websites/bootstrap-responsive.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../css/websites/style.css" type="text/css" media="screen" />
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/bootstrap-carousel.js"></script>
	<script src="../js/bootstrap-transition.js"></script>
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if IE 7]>
		<script src="js/html5shiv.js"></script>
	<![endif]-->
	<!--[if IE 8]>
		<script src="js/html5shiv.js"></script>
	<![endif]-->
	<!--[if IE 9]>
		<script src="js/html5shiv.js"></script>
	<![endif]-->
 </head>
 <body>
	<div class="row-fluid">
		<div class="container">
			<div class="span12">
				<div class="login-box">
					<div class="left adv">
						<img src="../img/img-websites/adv.png" alt="advertise" />
						<div class="text-adv">
							<h1>Your account, our priority</h1>
							<p>Adding security information helps protect your account</p>
						</div>
					</div>
					<div class="left login-form">
						<p> <?php echo $this->Session->flash(); ?> </p>
						<h1 class="login-head">Sign In</h1>
						<?php  echo $this->Form->create('User',array('action' => 'login', 'class' => 'form_login')); ?>
			
						<ul>
							<li>
								<?php echo $this->Form->input('username', array('label' =>'Username','onFocus'=>'if(this.value=="Username"){this.value=""}','onBlur'=>'if(this.value==""){this.value="Username"}')); ?>
							</li>
							<li>
								<?php echo $this->Form->input('password', array('label' =>'Password', 'onFocus'=>'if(this.value=="Password"){this.value=""}','onBlur'=>'if(this.value==""){this.value="Password"}'));   ?>
							</li>
							<li>
								<input type="checkbox" />
								<label class="check">Keep Me Sign In</label>
							</li>
							<li>
								<button type="submit" class="btn">Sign in</button>
							</li>
						</ul>
						<a href="#" class="link-login">Forgot Password ? </a>
						<a href="/" class="link-login">&larr; Back To Home </a>
					</div>
					<div class="clear"></div>
				</div>
				<div class="footer-login">
					<ul class="left">
						<li>© 2013 Asaptra Indonesia </li>
						<li><a href="#">Home</a></li>
					</ul>
					<ul class="right">
						<li><a href="#">About Us</a></li>
						<li><a href="#">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
 </body>
</html> 
