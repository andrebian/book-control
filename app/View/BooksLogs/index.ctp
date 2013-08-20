<ul class="breadcrumb">
  <li><?php echo $this->Html->link('Livros', array('controller' => 'books', 'action' => 'index')); ?><span class="divider">/</span></li>
  <li class="active">Alterações e Logs</li>
</ul>
<h2><?php echo __('Interações de "' . $book['Book']['name']); ?>"</h2>

<?php 
    echo $this->Form->create('BooksLog', array('action' => 'add'));
    echo $this->Form->input('book_id', array('type' => 'hidden', 'value' => $book['Book']['id']));
    echo $this->Form->input('meta_key', array('label' => 'Tipo', 'type' => 'text'));
    echo $this->Form->input('meta_value', array('label' => 'Descrição', 'type' => 'text'));
    echo $this->form->end(array('value' => 'Gravar interação', 'label' => 'Gravar interação', 'class' => 'btn btn-primary'));
 ?>


<h5>Interações realizadas</h5>
<table class="table table-hover">
    <thead class="th">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('meta_key', 'Tipo'); ?></th>
            <th><?php echo $this->Paginator->sort('meta_value', 'Descrição'); ?></th>
        </tr>
    </thead>
    <?php foreach ($booksLogs as $book): ?>
        <tr>
            <td>
                <?php echo $book['BooksLog']['id']; ?>
                &nbsp;
            </td>
            <td><?php echo h($book['BooksLog']['meta_key']); ?>&nbsp;</td>
            <td><?php echo h($book['BooksLog']['meta_value']); ?>&nbsp;</td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
echo $this->element('pagination');
