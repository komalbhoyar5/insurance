<?php
App::uses('AppController', 'Controller');
/**
 * Agents Controller
 *
 * @property Agent $Agent
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AgentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Agent->recursive = 0;
		$agents = $this->Agent->find('all', array('conditions'=>array('deleted_status'=>'No')));
		// echo "<pre>";
		// print_r($agents);
		// exit();
		$this->set('agents', $agents);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Agent->exists($id)) {
			throw new NotFoundException(__('Invalid agent'));
		}
		$options = array('conditions' => array('Agent.' . $this->Agent->primaryKey => $id));
		$this->set('agent', $this->Agent->find('first', $options));
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
			
			$this->request->data['Agent']['created_by'] = $user_id;
			$this->request->data['Agent']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['Agent']['company_id'] = $user['User']['company_id'];
				
			$this->Agent->create();
			if ($this->Agent->save($this->request->data)) {
				$this->Session->setFlash('The Agent details has been saved.', '', array(), 'success');
				if ($this->request->data['submit'] =="add_cont") {
					return $this->redirect(array('action' => 'add'));
				}else{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash('The Agents details could not be saved. Please, try again.', '', array(), 'fail');
			}
		}

		$this->loadmodel('AgentType');
		$agentType_list = $this->AgentType->find('list', array('conditions'=> array('deleted_status'=>'No', 'company_id'=>$user['User']['company_id'])));
		$this->set('agentType_list',$agentType_list);
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
		$this->layout = "backend_template";
		if (!$this->Agent->exists($id)) {
			throw new NotFoundException(__('Invalid Agent'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Agent']['id'] = $id;
			$this->request->data['Agent']['updated_by'] = $user_id;
			$this->request->data['Agent']['updated_date'] = date('Y-m-d H:i:s');
			if ($this->Agent->save($this->request->data)) {
				$this->Session->setFlash('The Agent cycle has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Agent cycle could not be saved. Please, try again.', '', array(), 'fail');;
			}
		} else {
			$options = array('conditions' => array('Agent.' . $this->Agent->primaryKey => $id));
			$this->request->data = $this->Agent->find('first', $options);
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

		$this->Agent->id = $id;
		if (!$this->Agent->exists()) {
			throw new NotFoundException(__('Invalid Agent'));
		}
		// $this->request->allowMethod('post', 'delete');
		$agent = array('id'=> $id, 'deleted_status' => 'Yes', 'deleted_by'=>$user_id, 'deleted_date'=>date('Y-m-d H:i:s'));
		if ($this->Agent->save($agent)) {
			$this->Session->setFlash(__('The Agent has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Agent could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
