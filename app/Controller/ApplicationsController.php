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
class ApplicationsController extends AppController
{

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


    function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('add', 'added');
    }

    public $paginate = array(
        'Application' => array(
            'order' => array('ticket_id' => 'asc'),
            //'order' => array('id' => 'asc'),
        ));


    public function index($id = null)
    {
        $this->Application->recursive = 2;
        If ($this->request->is('post')) {                            // リクエストがPOSTの場合
            //$this->Application->recursive = 2;
            $name = $this->request->data['Search']['customer_name'];       // Formの値を取得
            //$data=$this->Paginator->paginate(array('customer_name like'=>'%'.$name.'%','Ticket.event_id'=>$id));
            $data = $this->Application->find('all',
                array(
                    'conditions' => array(
                        'customer_name like' => '%' . $name . '%')));
            // 'Ticket.event_id'=>$id),
            //'order'=> 'Application.ticket_id'));
            $this->set('applications', $data);

        } else {

            //$this->Application->recursive = 2;
            $this->set(
                'applications',
                $this->Application->find(
                    'all',
                    array(
                        'conditions' => array(
                            'Ticket.event_id' => $id
                        ),
                        'order' => 'Application.ticket_id'
                    )
                )
            );
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->Application->exists($id)) {
            throw new NotFoundException(__('Invalid application'));
        }
        $this->Application->recursive = 2;
        $options = array('conditions' => array('Application.' . $this->Application->primaryKey => $id));
        $this->set('application', $this->Application->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($event_id)
    {

        if (is_null($event_id)) {
            $this->Flash->set('不正なアクセス');
            $this->redirect(array('controller' => 'Applications', 'action' => 'noEventId'));
        }

        if ($this->request->is('post')) {
            /*　申し込みボタンからのリクエストの場合
            * 　データの追加を実施
            */

            /* レコード追加後に、在庫がなくなった場合、追加を取り消す */

            $dataSource = $this->Application->getDataSource();
            $dataSource->begin();

            $this->Application->create();
            $newApplication = $this->Application->save($this->request->data);

            $this->loadModel('Ticket');
            $model_ticket = new Ticket();
            $salesInfo = $model_ticket->getCountSoldStock($this->request->data['Application']['ticket_id']);

            if ($salesInfo['stock'] < 0) {
                $dataSource->rollback();
                $newApplication = null;
                $this->Flash->error('在庫足りませんでした。');
            } else {
                $dataSource->commit();
                if (is_array($newApplication)) {

                    //データ追加に成功した後、メール送信（send）にリダイレクトする。
                    return $this->redirect(array('action' => 'send', $newApplication['Application']['id']));
                } else {
                    $this->Flash->error('保存できませんでした。');
                }
            }

        } else {
            /* 申し込みボタン以外からのリクエストの場合 */
        }
        $this->loadModel('Event');
        $this->set('eventInfo', $this->Event->find('first', array('conditions' => array('Event.id' => $event_id))));

        $allTickets = $this->Application->Ticket->find('all', array('conditions' => array('event_id' => $event_id)));

        /*
         * array(Ticket.id => [ticket_name]＋[event_date]＋[price])　の配列を作成し、viewに渡す
         */
        foreach ($allTickets as $key => $value) {
            $tickets[$value['Ticket']['id']] = $value['Ticket']['ticket_name'] .
                '　（　開催日時：' . date_format(date_create($value['Ticket']['event_date']), 'Y-m-d H:i') .
                '　料金：' . $value['Ticket']['price'] . '円　）';
        }

        $this->set('tickets', $tickets);

    }

    /**
     * added method
     *
     * @return void
     */
    public function added($id)
    {
        $this->Application->recursive = 3;
        $this->set('application', $this->Application->find('first', array('conditions' => array('Application.id' => $id))));
    }

    /* send method
     * メール送信機能。add（申込追加）→send（メール送信）→added（申込完了）の順でリダイレクトする。
     */

    public function send($id)
    {
        //メール送信に必要なデータの取得。
        $this->Application->recursive = 3;
        $infomation = $this->Application->find('first', array('conditions' => array('Application.id' => $id)));

        //加工が必要な変数をまとめて、計算。イベント開催日、チケット合計金額、イベント詳細。
        $date = date_format(date_create($infomation['Ticket']['event_date']), 'Y/m/d H:i');
        $price = $infomation['Application']['quantity'] * $infomation['Ticket']['price'];//合計金額＝枚数×単価。
        $detail = strip_tags($infomation['Ticket']['Event']['detail']);

        //以下、メール本文。
        $mailbody = array(
            'name' => $infomation['Application']['customer_name'],//本文の宛名「◯◯様」の「◯◯」部分。
            'content' => "いつもご利用いただきありがとうございます。
イベントチームA事務局です。

以下の通り、イベントの申込を受け付けました。
イベント当日までこちらのメールを大切に保存してください。

引き続きのご利用、よろしくお願いいたします。

イベントチームA事務局
        
        ----
        
        【申し込み内容】
        申し込み番号：　{$infomation['Application']['id']}
        
        [チケット詳細]
        イベント名：　{$infomation['Ticket']['Event']['title']}
        チケット種類：　{$infomation['Ticket']['ticket_name']}
        開催日時：　{$date}
        枚数：　{$infomation['Application']['quantity']} 枚
        合計金額：　{$price} 円
        詳細：
        ----
    {$detail}
        ----
        
        [申し込みユーザー情報]
        氏名：　{$infomation['Application']['customer_name']}
        電話番号：　{$infomation['Application']['tel']}
        メールアドレス：　{$infomation['Application']['email']}
        
        
----
----
株式会社イベントチームエイ
http://localhost/team_a_p1/users/login
※本メールは配信専用です。ご返信いただいても回答しかねますので予めご了承ください。
        ",
        );
        //メール本文終了。

        //メール送信の設定。
        $email = new CakeEmail('gmail');//使用するメール送信の設定。
        $sent = $email
            ->template('text_mail')//使用するメールテンプレートのファイル名。
            ->viewVars($mailbody)//メールの本文。
            ->from(array('event.team.a@gmail.com' => 'イベントチームA事務局'))//送信元メールアドレス→送信元の表示名。
            ->to($infomation['Application']['email'])//送信先のメールアドレス、申込者のメールアドレスを自動取得する。
            ->subject('【イベントチームA事務局】申込を受け付けました')//送信メールの件名。
            ->send();

        if ($sent) {
            echo 'メール送信成功！';
            //メール送信に成功すると、addedにリダイレクトする。
            return $this->redirect(array('action' => 'added', $id));
        } else {
            echo 'メール送信失敗';
        }
    }

    public function noEventId()
    {

    }


    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
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
    public function delete($id = null)
    {
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
