<?php
App::uses('AppController', 'Controller');
/**
 * BooksLogs Controller
 *
 * @property BooksLog $BooksLog
 */
class BooksLogsController extends AppController {

    
    public $uses = array('BooksLog', 'Book');
/**
 * index method
 *
 * @return void
 */
	public function index( $bookId = null ) {
                $this->set('book', $this->Book->read(null, $bookId));
		$this->BooksLog->recursive = 0;
                
                $this->paginate = array('order' => array('id' => 'desc'));
		$this->set('booksLogs', $this->paginate(array('book_id' => $bookId)));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BooksLog->create();
			if ($this->BooksLog->save($this->request->data)) {
				$this->Session->setFlash('Ação adicionada com sucesso', 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index', $this->request->data['BooksLog']['book_id']));
			} else {
                                $this->Session->setFlash('Não foi possível gravar a ação, por favor tente novamente', 'default', array('class' => 'alert alert-error'));
			}
		}
		$books = $this->BooksLog->Book->find('list');
		$this->set(compact('books'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BooksLog->exists($id)) {
			throw new NotFoundException(__('Invalid books log'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BooksLog->save($this->request->data)) {
				$this->Session->setFlash(__('The books log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The books log could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BooksLog.' . $this->BooksLog->primaryKey => $id));
			$this->request->data = $this->BooksLog->find('first', $options);
		}
		$books = $this->BooksLog->Book->find('list');
		$this->set(compact('books'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BooksLog->id = $id;
		if (!$this->BooksLog->exists()) {
			throw new NotFoundException(__('Invalid books log'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BooksLog->delete()) {
			$this->Session->setFlash(__('Books log deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Books log was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
