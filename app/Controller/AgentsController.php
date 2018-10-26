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

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('deleteAgentCommission');
	}
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
		$Component = $this->Components->load('General');

		if ($this->request->is('post')) {
			$this->request->data['Agent']['created_by'] = $user_id;
			$this->request->data['Agent']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['Agent']['company_id'] = $user['User']['company_id'];
				$this->request->data['Agent']['date_of_birth'] = $Component->convertdateinSQLFormat($this->request->data['Agent']['date_of_birth']);
				$this->request->data['Agent']['appointment_date'] = $Component->convertdateinSQLFormat($this->request->data['Agent']['appointment_date']);
				foreach ($this->request->data['AgentCommission'] as $key => $commission) {
					$commission_array[$key]['effective_from_date'] = $Component->convertdateinSQLFormat($commission['effective_from_date']);
					$commission_array[$key]['effective_to_date'] = $Component->convertdateinSQLFormat($commission['effective_to_date']);
					$commission_array[$key]['commission_rate'] = $commission['commission_rate'];
					$commission_array[$key]['tax_on_commission'] = $commission['tax_on_commission'];
					$commission_array[$key]['commision_from_month'] = $commission['commision_from_month'];
					$commission_array[$key]['commission_to_month'] = $commission['commission_to_month'];
				}
				$this->request->data['AgentCommission'] = $commission_array;

				$this->Agent->create();
				if ($this->Agent->saveAll($this->request->data)) {
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

		$this->loadmodel('Agenttype');
		$agentType_list = $this->Agenttype->find('list', array('conditions'=> array('deleted_status'=>'No', 'company_id'=>$user['User']['company_id'])));
		$this->set('agentType_list',$agentType_list);

		$agents = $this->Agent->createAgentdropdownList();
		$this->set('agents', $agents);

		$return = $Component->GetCountries();
		$this->set('countries', $return);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$Component = $this->Components->load('General');
		$this->loadmodel('User');
		$user_id = $this->Auth->user('id');
		$user = $this->User->find('first', array('conditions'=> array('User.id' => $user_id),
										 'fields'=>array('company_id')
										));
		$this->layout = "backend_template";
		if (!$this->Agent->exists($id)) {
			throw new NotFoundException(__('Invalid Agent'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Agent']['id'] = $id;
			$this->request->data['Agent']['updated_by'] = $user_id;
			$this->request->data['Agent']['updated_date'] = date('Y-m-d H:i:s');
			$this->request->data['Agent']['date_of_birth'] = $Component->convertdateinSQLFormat($this->request->data['Agent']['date_of_birth']);
			$this->request->data['Agent']['appointment_date'] = $Component->convertdateinSQLFormat($this->request->data['Agent']['appointment_date']);
			foreach ($this->request->data['AgentCommission'] as $key => $commission) {
				$commission_array[$key]['effective_from_date'] = $Component->convertdateinSQLFormat($commission['effective_from_date']);
				$commission_array[$key]['effective_to_date'] = $Component->convertdateinSQLFormat($commission['effective_to_date']);
				$commission_array[$key]['commission_rate'] = $commission['commission_rate'];
				$commission_array[$key]['tax_on_commission'] = $commission['tax_on_commission'];
				$commission_array[$key]['commision_from_month'] = $commission['commision_from_month'];
				$commission_array[$key]['commission_to_month'] = $commission['commission_to_month'];
				if (isset($commission['id'])) {
					$commission_array[$key]['id'] = $commission['id'];
				}
			}
			$this->request->data['AgentCommission'] = $commission_array;

			if ($this->Agent->saveAll($this->request->data)) {
				$this->Session->setFlash('The Agent cycle has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Agent cycle could not be saved. Please, try again.', '', array(), 'fail');;
			}
		} else {
			$options = array('conditions' => array('Agent.' . $this->Agent->primaryKey => $id),
							 'contain' => array('AgentCommission' =>array('conditions'=> array('AgentCommission.deleted_status !=' => 'Yes')))
							);
			$this->request->data = $this->Agent->find('first', $options);


			$this->request->data['Agent']['date_of_birth'] = $Component->convertdateinphpFormat($this->request->data['Agent']['date_of_birth']);
			$this->request->data['Agent']['appointment_date'] = $Component->convertdateinphpFormat($this->request->data['Agent']['appointment_date']);
			foreach ($this->request->data['AgentCommission'] as $key => $commission) {
					if (isset($commission['effective_from_date'])) {
						$commission_array[$key]['effective_from_date'] = $Component->convertdateinphpFormat($commission['effective_from_date']);
					}

					$commission_array[$key]['effective_to_date'] = $Component->convertdateinphpFormat($commission['effective_to_date']);
					$commission_array[$key]['commission_rate'] = $commission['commission_rate'];
					$commission_array[$key]['tax_on_commission'] = $commission['tax_on_commission'];
					$commission_array[$key]['commision_from_month'] = $commission['commision_from_month'];
					$commission_array[$key]['commission_to_month'] = $commission['commission_to_month'];
					$commission_array[$key]['id'] = $commission['id'];
					$commission_array[$key]['agent_id'] = $commission['agent_id'];
				}
				$this->request->data['AgentCommission'] = $commission_array;
		}

		$this->loadmodel('Agenttype');
		$agentType_list = $this->Agenttype->find('list', array('conditions'=> array('deleted_status'=>'No', 'company_id'=>$user['User']['company_id'])));
		$this->set('agentType_list',$agentType_list);
		$id = $this->request->data['Agent']['id'];
		$this->set('id', $id);
		
		$return = $Component->GetCountries();
		$this->set('countries', $return);
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

	public function deleteAgentCommission(){
		$user_id = $this->Auth->user('id');
		$this->render = false;
		if ($this->request->is('ajax')) {
			$this->loadmodel('AgentCommission');
			$postdata = $this->request->data['agent_id'];
			$agents = array('id'=> $this->request->data['agentcommission_id'], 'agent_id'=>$this->request->data['agent_id'], 'deleted_status' => 'Yes', 'deleted_by'=>$user_id, 'deleted_date'=>date('Y-m-d H:i:s'));
			if($this->AgentCommission->save($agents)){
				echo "true";
			} else {
				echo "false";
			}
		}
		exit();
	}

}
