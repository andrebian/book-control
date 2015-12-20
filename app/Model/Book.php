<?php
App::uses('AppModel', 'Model');
App::uses('FileManipulator', 'File');

/**
 * Class Book
 */
class Book extends AppModel
{
    /**
     * @var array
     */
    public $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Por favor informe o nome do livro',
            ),
        ),
        'author' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Por favor informe o nome do autor do livro',
            ),
        ),
        'publishing_house' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Por favor informe a editora',
            ),
        ),
    );

    /**
     * @param array $options
     */
    public function beforeSave($options = array())
    {
        if (isset($this->data[$this->alias]['date_buy'])) {
            $date = &$this->data[$this->alias]['date_buy'];

            if (!empty($date)) {
                $date = str_replace('/', '-', $date);
                $date = date('Y-m-d', strtotime($date));
            }
        }

        if (isset($this->data[$this->alias]['price'])) {
            $price = &$this->data[$this->alias]['price'];

            if (!empty($price)) {
                $price = str_replace(',', '', $price);
            }
        }

        if (isset($this->data[$this->alias]['attachment'])) {
            $file = $this->data[$this->alias]['attachment'];

            if (!empty($file['name'])) {
                $this->data[$this->alias]['attachment'] = $file['name'];

                $uploader = new FileManipulator();
                $uploader->doTheUpload($file);

            } else {
                unset($this->data[$this->alias]['attachment']);
            }
        }

        parent::beforeSave($options);
    }

    public function beforeDelete($cascade = true)
    {
        $book = $this->read(null, $this->id);
        $attachment = $book['Book']['attachment'];

        if (!empty($attachment)) {
            $uploader = new FileManipulator();
            $uploader->removeFile($attachment);
        }

        return parent::beforeDelete($cascade);
    }


}
