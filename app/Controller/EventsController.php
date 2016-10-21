<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class EventsController extends AppController {

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

	    $this->loadModel('User');
        $userId = $this->User->getUserId() ;

        if ($this->request->is('post')) {
            $title=$this->request->data['Search']['title'];
            $data=$this->Paginator->paginate(array('title like'=>'%'.$title.'%',
                'Event.user_id' => $userId));

            $this->set('events',$data);
        } else {
            $this->Event->recursive = 0;
            $this->set('events', $this->Paginator->paginate(array('Event.user_id' =>
                $userId)));
        }
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('post')) {
			$this->Event->create();

            /*
             * 画像のアップロード
             * とりあえずエラートラップなしで。　片塩　2016/10/14
             * */
            $data = $this->request->data;
            $saved = $this->Event->save($data);
            $saved['Event']['image'] = 'event_image_'.$saved['Event']['id'].'_1.jpg';
            move_uploaded_file($saved['Event']['file']['tmp_name'],'img/event_image_'.$saved['Event']['id'].'_1.jpg');

            $saved = $this->Event->save($saved);

			if ($saved) {
				$this->Flash->success(__('The event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The event could not be saved. Please, try again.'));
			}
		}
		/*　Event　Model　で　ログインしているユーザのuser_idを保存するようにしたため、
		 *  また、画面に表示する必要がないため、User Modelのデータをviewに渡す処理は不要
		 *  2016/10/12 片塩
		$users = $this->Event->User->find('list');
		$this->set(compact('users'));
		*/
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {

		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is(array('post', 'put'))) {
		    /*
		     * 画像のアップロード
		     * とりあえずエラートラップなしで。　片塩　2016/10/14
		     * */
            $data = $this->request->data;
            move_uploaded_file($data['Event']['file']['tmp_name'],'img/event_image_'.$data['Event']['id'].'_1.jpg');

            $data['Event']['image'] = 'event_image_'.$data['Event']['id'].'_1.jpg';

			if ($this->Event->save($data)) {
				$this->Flash->success(__('The event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The event could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);
            if(count($this->request->data)===0){
                /* 対象データが見つからなかったっ場合、indexへリダイレクト。
                 * ログインしているユーザのidに紐づくレコード以外が要求された場合を想定
                 * 2016/10/12 片塩
                */
                $this->Flash->error('要求されたデータがありませんでした。');
                $this->redirect(array('action' => 'index'));
            }
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Event->delete()) {
			$this->Flash->success(__('The event has been deleted.'));
		} else {
			$this->Flash->error(__('The event could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}





























