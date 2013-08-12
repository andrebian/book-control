<?php

    if ( $tipo == 'presente' ) {
        echo $this->Form->input('Book.buyer', array('label' => 'Quem lhe presenteou', 'class' => 'input-block-level'));
    } else {
        echo $this->Form->input('Book.buyer', array('type' => 'hidden', 'value' => 'Eu', 'class' => 'input-block-level'));
    }
    