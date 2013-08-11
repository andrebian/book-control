<div class="users index">
	<h2><?php echo __('Usuários'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name',   'Nome'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('username', 'Login'); ?></th>
			<th><?php echo $this->Paginator->sort('address', 'Endereço'); ?></th>
			<th><?php echo $this->Paginator->sort('addr_city', 'Cidade - UF'); ?></th>
			<th><?php echo $this->Paginator->sort('phone', 'Tel. Residencial'); ?></th>
			<th><?php echo $this->Paginator->sort('celphone', 'Celular'); ?></th>
			<th class="actions"><?php echo __('Opções'); ?></th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['name'] . ' ' . $user['User']['surname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h(
                            $user['User']['address'] . ', ' . $user['User']['addr_number'] . ' ' .
                            $user['User']['addr_complement'] . ' ' . $user['User']['addr_district']
                            ); ?>&nbsp;</td>
		<td><?php echo h($user['User']['addr_city'] . '-' . $user['User']['addr_state']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['phone']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['celphone']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Detalhes'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Remover'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opções'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Cadastrar Usuário'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Perfis'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Perfil'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
