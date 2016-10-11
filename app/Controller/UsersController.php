<?php
App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UsersController extends AppController
{

    public $layout = 'users';

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Flash');

    /**
     * index method
     *
     * @return void
     */
/*    public function index()
    {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }*/

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
/*    public function view($id = null)
    {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }*/

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {

            $this->User->create();
            $saved = $this->User->save(
                array(
                    'name' => $this->request->data['User']['name'],
                    'password' => $this->request->data['User']['password']
                )
            );

            if($saved){
                $this->Flash->success(__('ユーザを追加しました'));
                return $this->redirect(array('controller'=>'Users','action' => 'login'));
            } else {
                $this->Flash->error(__('登録できませんでした。もう一度お試しください。'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
/*    public function edit($id = null)
    {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }*/

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
/*    public function delete($id = null)
    {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }*/

    public function login()
    {
        if ($this->Auth->login($this->request->data)) {
            $this->Flash->set($this->Auth->user('name').'ログインしました');
            return $this->redirect($this->Auth->redirectUrl());
        } else {
            return $this->Flash->set('ユーザー名とパスワードが正しくありません。再入力してください。');
        }
    }

    public function logout(){

        $logoutUrl = $this->Auth->logout();
        $this->redirect($logoutUrl);
    }


    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow(
            array(
                'add',
                'index',
                'edit',
                'delete',
                'view',
                'login',
                'logout'

            )
        );
    }

}
