<ul class="breadcrumb">
  <li><?php echo $this->Html->link('Livros', array('controller' => 'books', 'action' => 'index')); ?><span class="divider">/</span></li>
  <li class="active">Cadastrar</li>
</ul>
<div class="books form">
<?php echo $this->Form->create('Book', array('type' => 'file')); ?>
	
		<legend><?php echo __('Cadastrar Livro'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => 'Nome', 'class' => 'input-block-level'));
                echo $this->Form->input('author', array('label' => 'Autor', 'class' => 'input-block-level'));
                echo $this->Form->input('publishing_house', array('label' => 'Editora', 'class' => 'input-block-level'));
		echo $this->Form->input('resume', array('label' => 'Sinopse', 'class' => 'input-block-level'));
		echo $this->Form->input('isbn', array('label' => 'ISBN', 'class' => 'input-block-level'));
                
                $options = array(   'presente' => 'Presente',
                                    'comprado' => 'Comprado');
		echo $this->Form->input('acquired_form', 
                        array(  'type' => 'select', 'empty' => array(0 => 'Selecione uma forma'),
                                'options' => $options, 'label' => 'Forma adquirida', 'class' => 'input-block-level'
                            )
                        
                );
		
                echo '<div id="Comprador"></div>';
                
                echo $this->Form->input('purchase_point', array('label' => 'Local de compra', 'type' => 'text', 'class' => 'input-block-level'));
		echo $this->Form->input('price', array('type' => 'text', 'label' => 'Valor', 'class' => 'input-block-level'));
                echo $this->Form->input('date_buy', array('type' => 'text', 'label' => 'Data', 'class' => 'input-block-level'));
		echo $this->Form->input('attachment', array('type' => 'file', 'label' => 'Arquivo'));
	?>
	<br /><br />
<?php echo $this->Form->end(array('label' => 'Cadastrar', 'value' => 'Cadastrar', 'class' => 'btn btn-large btn-primary')); ?>
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
        