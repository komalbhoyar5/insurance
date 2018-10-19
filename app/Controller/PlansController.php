<?php
App::uses('AppController', 'Controller');
/**
 * Plans Controller
 *
 * @property Plan $Plan
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PlansController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('deletePlandependancy');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Plan->recursive = 0;
		$plans = $this->Plan->find('all', array('conditions'=>array('Plan.deleted_status'=>'No')));
		$this->set('plans', $plans);
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Plan->exists($id)) {
			throw new NotFoundException(__('Invalid plan'));
		}
		$options = array('conditions' => array('Plan.' . $this->Plan->primaryKey => $id));
		$this->set('plan', $this->Plan->find('first', $options));
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
			$this->request->data['Plan']['created_by'] = $user_id;
			$this->request->data['Plan']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['Plan']['company_id'] = $user['User']['company_id'];
		// 	echo "<pre>";
		// print_r($this->request->data);
		// exit();

			$this->Plan->create();
			if ($this->Plan->saveAll($this->request->data)) {
				$this->Session->setFlash('The plan has been saved.', '', array(), 'success');
				if ($this->request->data['submit'] =="add_cont") {
					return $this->redirect(array('action' => 'add'));
				}else{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash('The plan could not be saved. Please, try again.', '', array(), 'fail');
			}
		}
			$this->loadmodel('Product');
			$product_list = $this->Product->find('list');
			// , array('conditions'=> array('deleted_status'=>'No', 'company_id'=>$user['User']['company_id']))
			$this->set('product_list',$product_list);

			$this->loadmodel('CoverType');
			$coverType_list = $this->CoverType->find('list', array('conditions'=> array('deleted_status'=>'No', 'company_id'=>$user['User']['company_id'])));
			$this->set('coverType_list',$coverType_list);

			$this->loadmodel('DependentType');
			$dependent_list = $this->DependentType->find('all', array('conditions'=> array('deleted_status'=>'No', 'company_id'=>$user['User']['company_id'])));
			foreach ($dependent_list as $key => $value) {
				if ($value['DependentType']['min_age'] !="" && $value['DependentType']['max_age']) {
					$de_list[$key] = $value['DependentType']['title'].' '.$value['DependentType']['min_age'] .' - '. $value['DependentType']['max_age'] .' yrs';
				}else{
					$de_list[$key] = $value['DependentType']['title'];
				}
			}
			$this->set('dependent_list',$de_list);

			$this->loadmodel('CoverBenefit');
			$cover_list = $this->CoverBenefit->find('list', array('conditions'=> array('deleted_status'=>'No', 'company_id'=>$user['User']['company_id'])));
			$this->set('cover_list',$cover_list);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->loadmodel('User');
		$user_id = $this->Auth->user('id');
		$user = $this->User->find('first', array('conditions'=> array('User.id' => $user_id),
										 'fields'=>array('company_id')
										));
		if (!$this->Plan->exists($id)) {
			throw new NotFoundException(__('Invalid plan'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Plan']['id'] = $id;
			$this->request->data['Plan']['updated_by'] = $user_id;
			$this->request->data['Plan']['updated_date'] = date('Y-m-d H:i:s');
			// echo "<pre>";
			// print_r($this->request->data);
			// exit();
			if ($this->Plan->saveAll($this->request->data)) {
				$this->Session->setFlash('The plan has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The plan could not be saved. Please, try again.', '', array(), 'fail');
			}
		} else {
			$options = array('conditions' => array('Plan.' . $this->Plan->primaryKey => $id ),
							 'contain' => array('PlanDependent' =>array('conditions'=> array('PlanDependent.deleted_status !=' => 'Yes')))
													);
			$this->request->data = $this->Plan->find('first', $options);
			$id = $this->request->data['Plan']['id'];
			$this->set('id', $id);
		}
		$this->loadmodel('Product');
		$product_list = $this->Product->find('list');
		// , array('conditions'=> array('deleted_status'=>'No', 'company_id'=>$user['User']['company_id']))
		$this->set('product_list',$product_list);
		$this->loadmodel('CoverType');
		$coverType_list = $this->CoverType->find('list', array('conditions'=> array('deleted_status'=>'No', 'company_id'=>$user['User']['company_id'])));
		$this->set('coverType_list',$coverType_list);

		$this->loadmodel('DependentType');
		$dependent_list = $this->DependentType->find('list', array('conditions'=> array('deleted_status'=>'No', 'company_id'=>$user['User']['company_id'])));
		$this->set('dependent_list',$dependent_list);

		$this->loadmodel('CoverBenefit');
		$cover_list = $this->CoverBenefit->find('list', array('conditions'=> array('deleted_status'=>'No', 'company_id'=>$user['User']['company_id'])));
		$this->set('cover_list',$cover_list);
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
		$this->Plan->id = $id;
		if (!$this->Plan->exists()) {
			throw new NotFoundException(__('Invalid plan'));
		}
		$plans = array('id'=> $id, 'deleted_status' => 'Yes', 'deleted_by'=>$user_id, 'deleted_date'=>date('Y-m-d H:i:s'));
		if($this->Plan->save($plans)){
			$this->Session->setFlash('The plan has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The plan could not be deleted. Please, try again.', '', array(), 'success');
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function deletePlandependancy(){
		$user_id = $this->Auth->user('id');
		$this->render = false;
		if ($this->request->is('ajax')) {
			$this->loadmodel('PlanDependent');
			$postdata = $this->request->data['plan_id'];
			$plans = array('id'=> $this->request->data['plandependent_id'], 'plan_id'=>$this->request->data['plan_id'], 'deleted_status' => 'Yes', 'deleted_by'=>$user_id, 'deleted_date'=>date('Y-m-d H:i:s'));
			if($this->PlanDependent->save($plans)){
				echo "true";
			} else {
				echo "false";
			}
		}
		exit();
	}
}
