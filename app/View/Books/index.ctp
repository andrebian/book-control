<div class="books index">
	<h2><?php echo __('Meus livros'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
			<th><?php echo $this->Paginator->sort('isbn', 'ISBN'); ?></th>
			<th><?php echo $this->Paginator->sort('acquired_form', 'Meio'); ?></th>
			<th><?php echo $this->Paginator->sort('buyer', 'Comprador'); ?></th>
			<th><?php echo $this->Paginator->sort('purchase_point', 'Local'); ?></th>
			<th><?php echo $this->Paginator->sort('price', 'Valor'); ?></th>
                        <th><?php echo $this->Paginator->sort('date_buy', 'Data'); ?></th>
			<th><?php echo $this->Paginator->sort('attachment', 'Arquivos'); ?></th>
			<th class="actions"><?php echo __('Opções'); ?></th>
	</tr>
	<?php foreach ($books as $book): ?>
	<tr>
		<td>
                    <?php echo $this->Html->link($book['Book']['name'], 'javascript:;', array('title' => $book['Book']['resume'])); ?>
                    &nbsp;
                </td>
		<td><?php echo h($book['Book']['isbn']); ?>&nbsp;</td>
		<td><?php echo h($book['Book']['acquired_form']); ?>&nbsp;</td>
		<td><?php echo h($book['Book']['buyer']); ?>&nbsp;</td>
		<td><?php echo h($book['Book']['purchase_point']); ?>&nbsp;</td>
		<td>R$ <?php echo number_format($book['Book']['price'],2,',','.'); ?>&nbsp;</td>
                <td><?php echo date('d/m/Y', strtotime($book['Book']['date_buy'])); ?>&nbsp;</td>
		<td><?php echo h($book['Book']['attachment']); ?>&nbsp;</td>
		<td class="actions">
                        <?php echo $this->Html->link(__('Log'), array('action' => 'log', $book['Book']['id'])); ?>
			<?php echo $this->Html->link(__('Detalhes'), array('action' => 'view', $book['Book']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $book['Book']['id'])); ?>
			<?php echo $this->Form->postLink(__('Remover'), array('action' => 'delete', $book['Book']['id']), 
                                null, __('Deseja realmente remover o livro %s?', $book['Book']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opções'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Adicionar livro'), array('action' => 'add')); ?></li>
	</ul>
</div>
