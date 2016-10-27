<?php
App::uses('AppModel', 'Model');

class Ticket extends AppModel
{

/*    public function  beforeSave($options = array()){

        return false;
    }*/
    public function afterFind($results, $primary = false)
    {
        //virtualFieldの値のせってい
        $results = $this->vfEdit($results);
        return $results;
    }

    public $virtualFields = array(
        'stock' => 0,        //初期値。afterFindで上書き
        'sold' => 0          //初期値。afterFindで上書き
    );

    public function vfEdit($results){

        App::import('Model', 'Application');
        $model_Application = new Application();
        $bufRecursive =$model_Application->recursive;
        $model_Application->recursive = -1;
        for ($i = 0; $i < count($results); $i++) {
            $sold = $model_Application->find(
                'first',
                array(
                    'fields' => array('sum(Application.quantity) as sold'),
                    'conditions' => array(
                        'Application.ticket_id' => $results[$i]['Ticket']['id']
                    )
                )
            );
            $results[$i]['Ticket']['sold'] = $sold[0]['sold'] + 0;
            $results[$i]['Ticket']['stock'] = $results[$i]['Ticket']['count'] - $results[$i]['Ticket']['sold'];
        }
        $model_Application->recursive = $bufRecursive;
        return $results;
    }

    public function getCountSoldStock($id){
        //戻り値：array('count' => $count,'sold' => $sold,'stock' => $stock)

        App::import('Model','Application');
        $model_Application = new Application();

        $sold = $model_Application->find(
            'first',
            array(
                'fields' => array('id','sum(`quantity`) as sold'),
                'conditions' => array(
                    'ticket_id' => $id
                )
            )
        )[0]['sold'];

        $this->recursive = -1;
        $count = $this->find(
            'first',
            array(
                'fields' => array('id','count'),
                'conditions' => array('Ticket.id' => $id)
            )
        )['Ticket']['count'];

        $stock = $count - $sold;

        return array(
            'count' => $count,
            'sold' => $sold,
            'stock' => $stock
        );
    }



    public $displayField = 'ticket_name';

    public $validate = array(
        'event_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'ticket_name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'event_date' => array(
            'datetime' => array(
                'rule' => array('datetime'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'price' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    public $belongsTo = array(
        'Event' => array(
            'className' => 'Event',
            'foreignKey' => 'event_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public $hasMany = array(
        'Application' => array(
            'className' => 'Application',
            'foreignKey' => 'ticket_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
