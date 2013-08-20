<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Livros', array('controller' => 'books', 'action' => 'index')); ?><span class="divider">/</span></li>
    <li class="active">Detalhes</li>
</ul>

<div class="books view">
    <h2><?php echo 'Informações de "' . $book['Book']['name'] . '"'; ?></h2>
    <dl>
        <dt>Nome</dt>
        <dd><?php echo h($book['Book']['name']); ?>&nbsp;</dd>
        <br />

        <dt>Sinopse</dt>
        <dd><?php echo h($book['Book']['resume']); ?>&nbsp;</dd>
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