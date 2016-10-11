<?php
App::uses('AppController', 'Controller');
/**
 * Tickets Controller
 *
 * @property Ticket $Ticket
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TicketsController extends AppController {

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
	public function index() {
		$this->Ticket->recursive = 0;
        $this->set('user_name', $this->Auth->user('User.name'));
        //$user_id = $this->Auth->user('id'); 上手く取得できないので保留
        //$this->log($user_id, LOG_DEBUG);
        $user_id = 1;
        $condition = array('Event.user_id' => $user_id);
        $this->set('tickets', $this->Paginator->paginate($condition));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ticket->exists($id)) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		$options = array('conditions' => array('Ticket.' . $this->Ticket->primaryKey => $id));
		$this->set('ticket', $this->Ticket->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ticket->create();
			if ($this->Ticket->save($this->request->data)) {
				$this->Flash->success(__('The ticket has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The ticket could not be saved. Please, try again.'));
			}
		}
        $this->set('user_name', $this->Auth->user('User.name'));
        $user_id = 1;//後ほど修正
        $conditions = array("Event.user_id" => $user_id);
		$events = $this->Ticket->Event->find('list', array('conditions' => $conditions));
		$this->set(compact('events'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ticket->exists($id)) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ticket->save($this->request->data)) {
				$this->Flash->success(__('The ticket has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The ticket could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ticket.' . $this->Ticket->primaryKey => $id));
			$this->request->data = $this->Ticket->find('first', $options);
		}
        $this->set('user_name', $this->Auth->user('User.name'));
        $user_id = 1;//後ほど修正
        $conditions = array("Event.user_id" => $user_id);
		$events = $this->Ticket->Event->find('list', array('conditions' => $conditions));
		$this->set(compact('events'));
        $this->set('data', $this->request->data);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ticket->id = $id;
		if (!$this->Ticket->exists()) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Ticket->delete()) {
			$this->Flash->success(__('The ticket has been deleted.'));
		} else {
			$this->Flash->error(__('The ticket could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
