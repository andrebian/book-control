<?php

    if ( $tipo == 'presente' ) {
        echo $this->Form->input('Book.buyer', array('label' => 'Quem lhe presenteou'));
    } else {
        echo $this->Form->input('Book.buyer', array('type' => 'hidden', 'value' => 'Eu'));
    }
    