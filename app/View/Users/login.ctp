<?php
    echo $this->Session->flash();
    echo $this->Session->flash('Auth');
    ?>
<div class="span4">&nbsp;</div>
<div class="span4">

    <div class="well">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Login'); ?></legend>
        <?php
        echo $this->Form->input('username', array('label' => 'Login', 'class' => 'input-block-level'));
        echo $this->Form->input('password', array('label' => 'Senha', 'class' => 'input-block-level'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(array('value' => 'Login', 'label' => 'Login', 'class' => 'btn btn-large btn-block btn-primary')); ?>
        </div>
</div>
<div class="span4">&nbsp;</div>