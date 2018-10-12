<?php
App::uses('AppController', 'Controller');
/**
 * Agenttypes Controller
 *
 * @property Agenttype $Agenttype
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AgenttypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Agenttype->recursive = 0;

		$agenttypes = $this->Agenttype->find('all', array('conditions'=>array('deleted_status'=>'No')));
		$this->set('agenttypes', $agenttypes);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Agenttype->exists($id)) {
			throw new NotFoundException(__('Invalid agenttype'));
		}
		$options = array('conditions' => array('Agent type.' . $this->Agenttype->primaryKey => $id));
		$this->set('agenttype', $this->Agenttype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$continue = array();
		$this->loadmodel('User');
		$user_id = $this->Auth->user('id');
		$user = $this->User->find('first', array('conditions'=> array('User.id' => $user_id),
										 'fields'=>array('company_id')
										));
		if ($this->request->is('post')) {
			$this->request->data['Agenttype']['created_by'] = $user_id;
			$this->request->data['Agenttype']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['Agenttype']['company_id'] = $user['User']['company_id'];
			$this->Agenttype->create();
			if ($this->Agenttype->save($this->request->data)) {
				$this->Session->setFlash('The agent type has been saved.', '', array(), 'success');
				if ($this->request->data['submit'] =="add_cont") {
					return $this->redirect(array('action' => 'add'));
				}else{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash('The agent type could not be saved. Please, try again.', '', array(), 'fail');
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
	public function edit($id = null) {
		$user_id = $this->Auth->user('id');
		if (!$this->Agenttype->exists($id)) {
			throw new NotFoundException(__('Invalid agenttype'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Agenttype']['id'] = $id;
			$this->request->data['Agenttype']['updated_by'] = $user_id;
			$this->request->data['Agenttype']['updated_date'] = date('Y-m-d H:i:s');
			if ($this->Agenttype->save($this->request->data)) {
				$this->Session->setFlash('The agent type has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The agent type could not be saved. Please, try again.', '', array(), 'fail');
			}
		} else {
			$options = array('conditions' => array('Agenttype.' . $this->Agenttype->primaryKey => $id));
			$this->request->data = $this->Agenttype->find('first', $options);
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
		$user_id = $this->Auth->user('id');
		$this->Agenttype->id = $id;
		if (!$this->Agenttype->exists()) {
			throw new NotFoundException(__('Invalid agenttype'));
		}
		// $this->request->allowMethod('post', 'delete');
		$agentarray = array('id'=> $id, 'deleted_status' => 'Yes', 'deleted_by'=>$user_id, 'deleted_date'=>date('Y-m-d H:i:s'));
		if($this->Agenttype->save($agentarray)){
			$this->Session->setFlash('The agent type has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The agent type could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
