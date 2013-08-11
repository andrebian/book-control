<div class="books form">
<?php echo $this->Form->create('Book', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Cadastrar Livro'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => 'Nome'));
		echo $this->Form->input('resume', array('label' => 'Sinopse'));
		echo $this->Form->input('isbn', array('label' => 'ISBN'));
                
                $options = array(   'presente' => 'Presente',
                                    'comprado' => 'Comprado');
		echo $this->Form->input('acquired_form', 
                        array(  'type' => 'select', 'empty' => array(0 => 'Selecione uma forma'),
                                'options' => $options, 'label' => 'Forma adquirida'
                            )
                        
                );
		
                echo '<div id="Comprador"></div>';
                
                echo $this->Form->input('purchase_point', array('label' => 'Local de compra', 'type' => 'text'));
		echo $this->Form->input('price', array('type' => 'text', 'label' => 'Valor'));
                echo $this->Form->input('date_buy', array('type' => 'text', 'label' => 'Data'));
		echo $this->Form->input('attachment', array('type' => 'file', 'label' => 'Arquivo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Cadastrar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Livros'), array('action' => 'index')); ?></li>
	</ul>
</div>

<?php

        $this->Js->buffer('$(\'#BookPrice\').maskMoney(); $(\'#BookDateBuy\').datepicker()');
    
        $this->Js->get('#BookAcquiredForm')->event('change', $this->Js->request(array(
            'controller' => 'books',
            'action' => 'ajaxCarregaTipo'), array(
            'async' => true,
            'update' => '#Comprador',
            'dataExpression' => true,
            'data' => $this->Js->serializeForm(
                    array('isForm' => true, 'inline' => true)
            ),
            'method' => 'post'    
                )
        )
);
        