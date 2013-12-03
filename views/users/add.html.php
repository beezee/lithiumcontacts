<?=$this->form->create($user); ?>
    <?=$this->form->field('username'); ?>
    <?=$this->form->field('password', array('type' => 'password')); ?>
    <?=$this->form->submit('Sign Up', array('class' => 'btn')); ?>
<?=$this->form->end(); ?>
<p>Already have an account? <?=$this->html->link('Log in', array('Users::login')); ?></p>
