<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Livros', array('controller' => 'books', 'action' => 'index')); ?><span class="divider">/</span></li>
    <li class="active">Detalhes</li>
</ul>

<?php
$imageExtensions = array(
    'jpg', 'jpeg', 'bmp', 'png', 'gif'
);
?>

<div class="books view">
    <h2><?php echo 'Informações de "' . $book['Book']['name'] . '"'; ?></h2>
    <dl>
        <dt>Nome</dt>
        <dd><?php echo h($book['Book']['name']); ?>&nbsp;</dd>
        <br />

        <dt>Sinopse</dt>
        <dd><?php echo h($book['Book']['resume']); ?>&nbsp;</dd>
        <br />

        <dt>Capa</dt>
        <dd>
            <?php if (!empty($book['Book']['attachment'])) : ?>

                <?php
                $attachment = $book['Book']['attachment'];
                $attachmentExploded = explode('.', $attachment);
                $currentImageExtension = end($attachmentExploded);
                ?>

                <?php if (in_array($currentImageExtension, $imageExtensions)) : ?>
                    <?php echo '<br />' . $this->Html->image('/files/' . $book['Book']['attachment'], array('width' => 350)); ?>
                <?php endif; ?>
            <?php endif; ?>
        </dd>
        <br />

        <dt>ISBN</dt>
        <dd><?php echo h($book['Book']['isbn']); ?>&nbsp;</dd>
        <br />

        <dt>Tipo de aquisição</dt>
        <dd><?php echo h($book['Book']['acquired_form']); ?>&nbsp;</dd>

        <br />
        <dt>Comprador</dt>
        <dd><?php echo h($book['Book']['buyer']); ?>&nbsp;</dd>
        <br />

        <dt>Local de compra</dt>
        <dd><?php echo h($book['Book']['purchase_point']); ?>&nbsp;</dd>
        <br />

        <dt>Valor</dt>
        <dd>R$ <?php echo number_format($book['Book']['price'], 2, ',', '.'); ?>&nbsp;</dd>
        <br />

        <dt>Data de aquisição</dt>
        <dd><?php echo date('d/m/Y', strtotime($book['Book']['date_buy'])); ?>&nbsp;</dd>
    </dl>
</div>