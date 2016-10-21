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
	public function index($id = null) {
        if (!$this->Ticket->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
		$this->Ticket->recursive = 0;
        $this->set('user_name', $this->Auth->user('User.name'));
        $condition = array('Event.id' => $id);
        $this->set('tickets', $this->Paginator->paginate($condition));
        $this->set('id', $id);
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
	public function add($id = null) {
        if (!$this->Ticket->exists($id)) {
            throw new NotFoundException(__('Invalid application'));
        }
		if ($this->request->is('post')) {
			$this->Ticket->create();
            $this->request->data['Ticket']['event_id'] = $id;
			if ($this->Ticket->save($this->request->data)) {
				$this->Flash->success(__('The ticket has been saved.'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Flash->error(__('The ticket could not be saved. Please, try again.'));
			}
		}
        $this->set('user_name', $this->Auth->user('User.name'));
        $conditions = array("Event.id" => $id);
        $events = $this->Ticket->Event->find('list', array('conditions' => $conditions));
        $this->set(compact('events'));
        $eventTitle = $this->Ticket->Event->find('first', array('conditions' => $conditions))['Event']['title'];

        $this->set('eventTitle',$eventTitle);
        $this->set('event_id', $id);
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
				return $this->redirect(array('action' => 'index', $this->request->data['event_id']));
			} else {
				$this->Flash->error(__('The ticket could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ticket.' . $this->Ticket->primaryKey => $id));
			$this->request->data = $this->Ticket->find('first', $options);
		}
        $this->set('user_name', $this->Auth->user('User.name'));
        $conditions = array("Event.id" => $this->request->data['Event']['id']);
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

        $conditions = array("Ticket.id" => $id);
        $ticket = $this->Ticket->find('first', array('conditions' => $conditions));

		if (!$this->Ticket->exists()) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Ticket->delete()) {
			$this->Flash->success(__('The ticket has been deleted.'));
		} else {
			$this->Flash->error(__('The ticket could not be deleted. Please, try again.'));
		}
        return $this->redirect(array('action' => 'index', $ticket['Ticket']['event_id']));
	}
}
