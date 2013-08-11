<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Realize seu cadastro'); ?></legend>
	<?php
		echo $this->Form->input('group_id', array('label' => 'Perfil'));
		echo $this->Form->input('name', array('label' => 'Primeiro nome'));
		echo $this->Form->input('surname', array('label' => 'Sobrenome'));
		echo $this->Form->input('email');
		echo $this->Form->input('username', array('label' => 'Seu login'));
		echo $this->Form->input('password', array('label' => 'Senha'));
		echo $this->Form->input('address', array('label' => 'Endereço'));
		echo $this->Form->input('addr_number', array('label' => 'Número'));
		echo $this->Form->input('addr_complement', array('label' => 'Complemento'));
		echo $this->Form->input('addr_district', array('label' => 'Bairro'));
		echo $this->Form->input('addr_city', array('label' => 'Cidade'));
		echo $this->Form->input('addr_state', array('label' => 'Estado'));
		echo $this->Form->input('addr_country', array('type' => 'hidden', 'value' => 'Brasil'));
		echo $this->Form->input('addr_zip_code', array('label' => 'CEP'));
		echo $this->Form->input('phone', array('label' => 'Telefone Residencial'));
		echo $this->Form->input('celphone', array('label' => 'Celular'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Cadastrar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opções'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Usuários'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Perfis'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Perfil'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
