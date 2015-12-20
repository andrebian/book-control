<h2><?php echo __('Meus livros'); ?></h2>

<?php
$imageExtensions = array(
    'jpg', 'jpeg', 'bmp', 'png', 'gif'
);
?>

<?php echo $this->Html->link('Adicionar livro', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
<br/>
<br/>
<table class="table table-hover">
    <thead class="th">
    <tr>
        <th><?php echo $this->Paginator->sort('name', 'Capa'); ?></th>
        <th><?php echo $this->Paginator->sort('name', 'Detalhes'); ?></th>
        <th><?php echo $this->Paginator->sort('date_buy', 'Registrado em'); ?></th>
        <th class="actions"><?php echo __('Opções'); ?></th>
    </tr>
    </thead>
    <tfoot class="th">
    <tr>
        <th><?php echo $this->Paginator->sort('name', 'Capa'); ?></th>
        <th><?php echo $this->Paginator->sort('name', 'Detalhes'); ?></th>
        <th><?php echo $this->Paginator->sort('date_buy', 'Registrado em'); ?></th>
        <th class="actions"><?php echo __('Opções'); ?></th>
    </tr>
    </tfoot>
    <?php foreach ($books as $book): ?>
        <tr>
            <td>

                <?php if (!empty($book['Book']['attachment'])) : ?>

                    <?php
                    $attachment = $book['Book']['attachment'];
                    $attachmentExploded = explode('.', $attachment);
                    $currentImageExtension = end($attachmentExploded);
                    ?>

                    <?php if (in_array($currentImageExtension, $imageExtensions)) : ?>
                        <?php echo '<br />' . $this->Html->image('/files/' . $book['Book']['attachment'], array('width' => 128, 'url' => array('action' => 'view', $book['Book']['id']))); ?>
                    <?php endif; ?>
                <?php endif; ?>
                &nbsp;
            </td>
            <td>
                <?php
                echo $this->Html->link($book['Book']['name'], array('action' => 'view', $book['Book']['id']), array('title' => 'Autor: ' . $book['Book']['author'] . "\nEditora: " .
                    $book['Book']['publishing_house'] . "\n\nSinopse:\n" . $book['Book']['resume'], 'class' => 'ttip_t'));
                ?><br/>
                <?php echo $book['Book']['author']; ?>
            </td>
            <td>
                <?php if (!empty($book['Book']['date_buy'])) : ?>
                    <?php echo date('d/m/Y', strtotime($book['Book']['date_buy'])); ?>&nbsp;
                <?php endif; ?>
            </td>
            <td class="actions">
                <?php echo $this->Html->link('Log', array('controller' => 'books_logs', 'action' => 'index', $book['Book']['id']), array('class' => 'btn btn-mini btn-primary')); ?>
                &nbsp;
                <?php echo $this->Form->postLink('Remover', array('action' => 'delete', $book['Book']['id']), array('class' => 'btn btn-mini btn-danger'), __('Deseja realmente remover o livro %s?', $book['Book']['name'])); ?>

            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
echo $this->element('pagination');
