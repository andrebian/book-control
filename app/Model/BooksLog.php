<?php
App::uses('AppModel', 'Model');

/**
 * Class BooksLog
 */
class BooksLog extends AppModel
{
    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'book_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'meta_key' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'meta_value' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
    );

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Book' => array(
            'className' => 'Book',
            'foreignKey' => 'book_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}

