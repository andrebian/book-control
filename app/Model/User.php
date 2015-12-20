<?php
App::uses('AppModel', 'Model');

/**
 * Class User
 */
class User extends AppModel
{

    /**
     * @var array
     */
    public $validate = array(
        'group_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Por favor informe o perfil do novo usuário',
                'on' => 'create',
            ),
        ),
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Por favor informe o nome',
            ),
        ),
        'surname' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Por favor informe o sobrenome',
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email', true),
                'message' => 'Por favor informe um email válido',
            ),
        ),
        'username' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Por favor informe o login',
            ),
        ),
        'password' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Por favor informe a senha',
                'on' => 'create',
            ),
        ),
        'password_confirm' => array(
            'comparePasswords' => array(
                'rule' => array('comparePasswords'),
                'message' => 'As senhas digitadas não conferem, por favor verifique',
            ),
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Por favor confirme a senha',
                'on' => 'create',
            ),
        ),
        'address' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Por favor informe o endereço',
            ),
        ),
        'addr_number' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Informe um número válido',
            ),
        ),
        'addr_district' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Informe o bairro',
            ),
        ),
        'addr_city' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Por favor informe a cidade',
            ),
        ),
        'addr_state' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Por favor informe o estado',
            ),
        ),
        'addr_country' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Por favor informe o País',
            ),
        ),
        'addr_zip_code' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Informe o CEP',
            ),
        ),
        'phone' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Por favor informe o telefone principal',
            ),
        ),
    );

    /**
     * @var array
     */
    public $belongsTo = array(
        'Group' => array(
            'className' => 'Group',
            'foreignKey' => 'group_id',
        )
    );

    /**
     * @param array $data
     * @return bool
     */
    public function comparePasswords($data = array())
    {
        if (isset($this->data[$this->alias]['password'])) {
            return $this->data[$this->alias]['password'] === current($data);
        }
    }

    /**
     * @return string
     */
    public function passRecover()
    {
        return substr(md5(date('siHdmY')), 0, 6);
    }

    /**
     * @param array $options
     */
    public function beforeSave($options = array())
    {
        if (isset($this->data[$this->alias]['password'])) {
            $pass = &$this->data[$this->alias]['password'];

            if (!empty($pass)) {
                $pass = Security::hash($pass);
            } else {
                unset($this->data[$this->alias]['password']);
            }
        }

        parent::beforeSave($options);
    }
}

