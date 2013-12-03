<?php if ($authFailed): ?>
<h4>Login Failed</h4>
<?php endif; ?>
<?=$this->form->create(); ?>
    <?=$this->form->field('username');?>
    <?=$this->form->field('password', array('type' => 'password'));?>
    <?=$this->form->submit('Login', array('class' => 'btn')); ?>
<?=$this->form->end(); ?>
<p>New? <?=$this->html->link('Sign up', array('Users::add')); ?></p>
