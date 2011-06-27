<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title><?php html($_title); ?></title>
		<base href="<?php html($_siteURL); ?>">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<?php foreach($_meta as $k => $v){ ?>
		<meta name="<?php html($k)?>" content="<?php html($v)?>">
<?php } ?>
<?php foreach($_script as $v){ ?>
		<script type="text/javascript" src="<?php html($v)?>"></script>
<?php } ?>
<?php foreach($_link as $v){ ?>
		<link rel="<?php html($v['rel'])?>" type="<?php html($v['type'])?>" href="<?php html($v['href'])?>" title="<?php html($v['title'])?>">
<?php } ?>
	</head>
	<body>
		<div id="header">
			<h1 class="tleft fleft"><?php html($_siteName)?></h1>
			<div id="loginForm" class="tright fright">
<?php 
	if ($_login_id) {
		echo 'Hello, '.$_loginname
			.'. (<a href="'.$_logoutURL.'">Logout</a>)'
			;
	} else {
?>
				<form action="<?php echo $_loginURL; ?>" method="post" 
					onsubmit="if(sha1_vm_test()){this.h.value=hex_sha1(this.s.value+hex_sha1(this.p.value));this.p.value='';return true;}else{return true;}">
					<p>
						<label for="loginU">U</label>
						<input id="loginU" type="text" name="l" class="text">
						<label for="loginP">P</label>
						<input id="loginP" type="password" name="p" class="text">
						<input id="loginH" type="hidden" name="h">
						<input id="loginS" type="submit" value="Check-in" class="submit">
						<input type="hidden" name="s" value="<?php echo session_id(); ?>">
						<input type="hidden" name="_URI" value="<?php html($_URI); ?>">
						<input type="hidden" name="_Lbl" value="<?php html($_Lbl); ?>">
					</p>
				</form>
<?
	}
?>
			</div>
			<p id="links" class="tcenter">
				<a href="/" title="Home Page">Home</a>
				<a href="/Home/Contact" title="Contact">Contact</a>
<?php if(G::$S && G::$S->Login && G::$S->roleTest('Admin')){ ?>
				<a href="<?php echo CONT;?>Admin">Admin</a>
<?php } ?>
			</p>
			<div class="clear"></div>
		</div>

<?php if(0<count($a=G::msg())){ ?>
		<div id="msg">
			<span>Messages:</span>
			<ul>
<?php foreach($a as $v){ ?>
				<li class="<?php echo $v[1]; ?>"><?php echo $v[0]; ?></li>
<?php } ?>
			</ul>
		</div>
<?php } ?>

		<div id="body">
