<?php

App::uses('Controller', 'Controller');

/**
 * Class AppController
 */
class AppController extends Controller
{
    public $components = array('Session', 'Auth');

    public function beforeFilter()
    {
        $this->Auth->authenticate = array('Blowfish' => array(
            'userModel' => 'User',
        ));

        $this->Auth->loginAction = array(
            'controller' => 'users',
            'action' => 'login'
        );

        // Auth error message
        $this->Auth->authError = '<div class="alert alert-error"><div class="alert alert-error"><p>'. __('You must to be logged in') . '</p></div></div>';

        parent::beforeFilter();
    }
}

