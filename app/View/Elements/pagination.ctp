<hr>
<?php
echo $this->Paginator->counter(array(
    'format' => __('Página {:page} de {:pages}, exibindo {:current} registros de {:count}, iniciando em {:start}, finalizando em {:end}')
));
?>

<div class="pagination">
    <ul>
        <?php
        echo '<li>' . $this->Paginator->first('<< ', array(), array('class' => 'last', 'tag' => 'a')) . '</li>';
        echo '<li>' . $this->Paginator->prev('< ', array(), null, array('class' => 'last', 'tag' => 'a')) . '</li>';
        echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a'));
        echo '<li>' . $this->Paginator->next(' >', array(), null, array('class' => 'next', 'tag' => 'a')) . '</li>';
        echo '<li>' . $this->Paginator->last(' >>', array(), array('class' => 'last', 'tag' => 'a')) . '</li>';
        ?>
    </ul>
</div>