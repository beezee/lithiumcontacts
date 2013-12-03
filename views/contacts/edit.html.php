<h4>Edit <?=$contact->name; ?></h4>
<?=$this->form->create($contact); ?>
    <?=$this->form->field('name'); ?>
    <?=$this->form->field('street_address'); ?>
    <?=$this->form->field('city'); ?>
    <?=$this->form->field('zip'); ?>
    <?=$this->form->field('state', array('type' => 'select',
            'list' => $states)); ?>
    <?=$this->form->field('phone'); ?>
    <?=$this->form->submit('Update Contact', array('class' => 'btn')); ?>
<?=$this->form->end(); ?>

