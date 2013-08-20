<div class="booksLogs view">
<h2><?php echo __('Books Log'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($booksLog['BooksLog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Book'); ?></dt>
		<dd>
			<?php echo $this->Html->link($booksLog['Book']['name'], array('controller' => 'books', 'action' => 'view', $booksLog['Book']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Key'); ?></dt>
		<dd>
			<?php echo h($booksLog['BooksLog']['meta_key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Value'); ?></dt>
		<dd>
			<?php echo h($booksLog['BooksLog']['meta_value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Books Log'), array('action' => 'edit', $booksLog['BooksLog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Books Log'), array('action' => 'delete', $booksLog['BooksLog']['id']), null, __('Are you sure you want to delete # %s?', $booksLog['BooksLog']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Books Logs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Books Log'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Books'), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book'), array('controller' => 'books', 'action' => 'add')); ?> </li>
	</ul>
</div>
