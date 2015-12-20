<?php
App::uses('AppModel', 'Model');

/**
 * Class Group
 */
class Group extends AppModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Por favor informe o nome do perfil',
            ),
        ),
    );

    /**
     * @var array
     */
    public $hasMany = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'group_id',
            'dependent' => false,
        )
    );
}

