<?php
	echo Form::open(array('action' => 'index/m3/register', 'method' => 'post')); 
	echo Form::label('E-mail:', 'email') . ' ';
	echo Form::input('email', '', array('class' => 'login-form'));
	?>
	<br> <br>
	<?php
	echo Form::label('Username:', 'username') . ' ';
	echo Form::input('username', '', array('class' => 'login-form'));
	?>
	<br> <br>
	<?php
	echo Form::label('Password: ', 'password') . ' ';
	echo Form::password('password', '', array('class' => 'login-form'));
	?>
	<br> <br>
	<?php
	echo Form::button('frmbutton', 'Login', array('class' => 'btn btn-default'));
echo Form::close();
