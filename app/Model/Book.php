<?php
App::uses('AppModel', 'Model');
/**
 * Book Model
 *
 */
class Book extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Por favor informe o nome do livro',
			),
		),
	);
        
        
        /**
         * 
         * @param array $options
         */
        public function beforeSave($options = array())
        {
            if ( isset($this->data[$this->alias]['date_buy']) ) {
                $date = &$this->data[$this->alias]['date_buy'];
                
                if ( !empty($date) ) {
                    $date = str_replace('/', '-', $date);
                    $date = date('Y-m-d', strtotime($date));
                }
            }
            
            if ( isset($this->data[$this->alias]['price']) ) {
                $price = &$this->data[$this->alias]['price'];
                
                if ( !empty($price) ) {
                    $price = str_replace(',', '', $price);
                }
            }  
            
            if ( isset($this->data[$this->alias]['attachment']) ) {
                $attach = $this->data[$this->alias]['attachment']['name'];
                
                if ( !empty($attach) ) {
                    $this->data[$this->alias]['attachment'] = $attach;
                } else {
                    unset($this->data[$this->alias]['asttachment']);
                }
            }
            
            parent::beforeSave($options);
        }
        
}
