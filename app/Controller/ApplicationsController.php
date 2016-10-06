<?php
App::uses('AppController', 'Controller');
/**
 * Applications Controller
 *
 * @property Application $Application
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ApplicationsController extends AppController {

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
		$this->Application->recursive = 0;
		$this->set('applications', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Application->exists($id)) {
			throw new NotFoundException(__('Invalid application'));
		}
		$options = array('conditions' => array('Application.' . $this->Application->primaryKey => $id));
		$this->set('application', $this->Application->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($event_id) {

	    if(is_null($event_id)){
	        $this->Flash->set('不正なアクセス');
            $this->redirect(array('controller'=>'Applications','action'=>'noEventId'));
        }

        if ($this->request->is('post')) {
		    /*　申し込みボタンからのリクエストの場合
		    * 　データの追加を実施
		    */
			$this->Application->create();
			if ($this->Application->save($this->request->data)) {
				return $this->redirect(array('action' => 'added',$event_id));
			} else {
				$this->Flash->error(__('The application could not be saved. Please, try again.'));
			}
		} else {
		    /*　申し込みボタン以外からのリクエストの場合
		     *　Eventの値をセット
		     **/

            $this->loadModel('Event');
            $this->set('eventInfo',$this->Event->find('first',array('conditions' => array('Event.id' => $event_id))));

        }

		$tickets = $this->Application->Ticket->find('list',array('conditions' => array('event_id' => $event_id)));
		$this->set(compact('tickets'));
	}

    /**
     * added method
     *
     * @return void
     */
	public function added(){


    }

    public function noEventId(){

    }


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Application->exists($id)) {
			throw new NotFoundException(__('Invalid application'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Application->save($this->request->data)) {
				$this->Flash->success(__('The application has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The application could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Application.' . $this->Application->primaryKey => $id));
			$this->request->data = $this->Application->find('first', $options);
		}
		$tickets = $this->Application->Ticket->find('list');
		$this->set(compact('tickets'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Application->id = $id;
		if (!$this->Application->exists()) {
			throw new NotFoundException(__('Invalid application'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Application->delete()) {
			$this->Flash->success(__('The application has been deleted.'));
		} else {
			$this->Flash->error(__('The application could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
