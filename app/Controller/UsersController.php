<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    
    /**
     * 
     */
    public function login() {
        if ( $this->request->is('post') ) {
            if ( $this->Auth->login() ) {
                $this->Session->setFlash('Login realizado com sucesso!', 'default', array('class' => 'alert alert-succes'));
                $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash('Dados de login inválidos, por favor tente novamente.', 'default', array('class' => 'alert alert-error'));
        }
    }
    
    
    
    /**
     * 
     */
    public function logout() {
        $this->set('title_for_layout', 'Login');
        $this->Auth->logout();
        $this->redirect($this->Auth->redirectUrl());
    }
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
                $this->set('title_for_layout', 'Lista de usuários');
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
                
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
                
                $user = $this->User->find('first', $options);
                $this->set('title_for_layout', 'Detalhes de '. $user['User']['name']);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
                $this->set('title_for_layout', 'Cadastro');
            
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuário cadastrado com sucesso!'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
                                $this->Session->setFlash(__('Não foi possível cadastrar o usuário, por favor tente novamente.'), 
                                        'default', array('class' => 'alert alert-error'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Dados de '.$this->request->data['User']['name'].' atualizados com sucesso!'), 
                                        'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não foi possível atualizar os dados de '. $this->request->data['User']['name']), 
                                        'default', array('class' => 'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
                $title_for_layout = 'Editando dados';
		$this->set(compact('groups', 'title_for_layout'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('Usuário deletado com sucesso!'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Não foi possível deletar o usuário, por favor tente novamente'), 
                        'default', array('class' => 'alert alert-error'));
		$this->redirect(array('action' => 'index'));
	}
}
