<div class="row">
    <div class="span4">
        <h4>New Contact</h4>
        <?=$this->form->create($contact); ?>
            <?=$this->form->field('name'); ?>
            <?=$this->form->field('street_address'); ?>
            <?=$this->form->field('city'); ?>
            <?=$this->form->field('zip'); ?>
            <?=$this->form->field('state', array('type' => 'select',
                    'list' => $states)); ?>
            <?=$this->form->field('phone'); ?>
            <?=$this->form->submit('Add Contact', array('class' => 'btn')); ?>
        <?=$this->form->end(); ?>
    </div>
    <div class="span4">
        <?php if (count($contacts) > 0): ?>
            <h4>Saved Contacts</h4>
        <?php endif; ?>
        <?php foreach($contacts as $contact): ?>
            <div style="position:relative;">
                <div class="pull-left contact-name" data-id="<?=$contact->id; ?>">
                <?=$this->html->link($contact->name, 
                    array('Contacts::edit', 'id' => $contact->id)); ?>
                </div>
                <?=$this->form->create($contact, 
                            array('url' => array('Contacts::delete'),
                                'class' => 'pull-right',
                                'method' => 'POST',
                               'style' => 'display:inline-block;margin:0;'
                                            .'position:absolute;top:0;right:0;')); ?>
                    <?=$this->form->field('id', array('type' => 'hidden')); ?>
                    <?=$this->form->submit('X', array('class' => 'btn btn-mini')); ?>
                <?=$this->form->end(); ?>
                <br/>
                <div class="hide contact-preview preview-<?=$contact->id; ?>">
                    <small>
                        <?=$contact->street_address; ?><br />
                        <?=$contact->city; ?><br />
                        <?=$contact->zip; ?><br />
                        <?=$contact->state; ?><br />
                        <?=$contact->phone; ?>
                    </small>
                </div>
            </div>
        <?php endforeach; ?>
        <?php ob_start(); ?>
        <script type="text/javascript">
            (function($, exports, undefined){
                $('document').ready(function() {
                    $('.contact-name').hover(function(){
                        $('.preview-'+$(this).data('id')).show();
                     }, function() {
                        $('.preview-'+$(this).data('id')).hide();
                     });
                });
            })($, window);
        </script>
        <?php $this->scripts(ob_get_clean()); ?>
    </div>
</div>
