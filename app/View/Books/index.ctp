<h2><?php echo __('Meus livros'); ?></h2>

<?php echo $this->Html->link('Adicionar livro', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
<br />
<br />
<table class="table table-hover">
    <thead class="th">
        <tr>
            <th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
            <th><?php echo $this->Paginator->sort('isbn', 'ISBN'); ?></th>
            <th><?php echo $this->Paginator->sort('acquired_form', 'Meio'); ?></th>
            <th><?php echo $this->Paginator->sort('buyer', 'Comprador'); ?></th>
            <th><?php echo $this->Paginator->sort('purchase_point', 'Local'); ?></th>
            <th class="tenpercent"><?php echo $this->Paginator->sort('price', 'Valor'); ?></th>
            <th><?php echo $this->Paginator->sort('date_buy', 'Data'); ?></th>
            <th class="actions"><?php echo __('Opções'); ?></th>
        </tr>
    </thead>
    <?php foreach ($books as $book): ?>
        <tr>
            <td>
                <?php
                echo $this->Html->link($book['Book']['name'], 'javascript:;', array('title' => 'Autor: ' . $book['Book']['author'] . "\nEditora: " .
                    $book['Book']['publishing_house'] . "\n\nSinopse:\n" . $book['Book']['resume'], 'class' => 'ttip_t'));
                ?>
                &nbsp;
            </td>
            <td><?php echo h($book['Book']['isbn']); ?>&nbsp;</td>
            <td><?php echo h($book['Book']['acquired_form']); ?>&nbsp;</td>
            <td><?php echo h($book['Book']['buyer']); ?>&nbsp;</td>
            <td><?php echo h($book['Book']['purchase_point']); ?>&nbsp;</td>
            <td>R$ <?php echo number_format($book['Book']['price'], 2, ',', '.'); ?>&nbsp;</td>
            <td><?php echo date('d/m/Y', strtotime($book['Book']['date_buy'])); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link('Log', array('action' => 'log', $book['Book']['id']), array('class' => 'btn btn-mini btn-primary')); ?>
                &nbsp;
                <?php echo $this->Html->link('Detalhes', array('action' => 'view', $book['Book']['id']), array('class' => 'btn btn-mini btn-success')); ?>
                &nbsp;
                <?php echo $this->Form->postLink('Remover', array('action' => 'delete', $book['Book']['id']), array('class' => 'btn btn-mini btn-danger'), __('Deseja realmente remover o livro %s?', $book['Book']['name'])); ?>

            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
echo $this->element('pagination');
