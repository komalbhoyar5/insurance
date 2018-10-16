<?php
App::uses('AppController', 'Controller');
/**
 * CoverBenefits Controller
 *
 * @property CoverBenefit $CoverBenefit
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CoverBenefitsController extends AppController {

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
		$this->CoverBenefit->recursive = 0;
		$cover = $this->CoverBenefit->find('all', array('conditions'=>array('deleted_status'=>'No')));
		$this->set('coverBenefits', $cover);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CoverBenefit->exists($id)) {
			throw new NotFoundException(__('Invalid cover benefit'));
		}
		$options = array('conditions' => array('CoverBenefit.' . $this->CoverBenefit->primaryKey => $id));
		$this->set('coverBenefit', $this->CoverBenefit->find('first', $options));
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
			$this->request->data['coverBenefit']['created_by'] = $user_id;
			$this->request->data['coverBenefit']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['coverBenefit']['company_id'] = $user['User']['company_id'];
			$this->CoverBenefit->create();
			if ($this->CoverBenefit->save($this->request->data)) {
				$this->Session->setFlash('The cover benefit has been saved.', '', array(), 'success');
				if ($this->request->data['submit'] =="add_cont") {
					return $this->redirect(array('action' => 'add'));
				}else{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash('The cover benefit could not be saved. Please, try again.', '', array(), 'fail');
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
		if (!$this->CoverBenefit->exists($id)) {
			throw new NotFoundException(__('Invalid cover benefit'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['CoverBenefit']['id'] = $id;
			$this->request->data['CoverBenefit']['updated_by'] = $user_id;
			$this->request->data['CoverBenefit']['updated_date'] = date('Y-m-d H:i:s');
			if ($this->CoverBenefit->save($this->request->data)) {
				$this->Session->setFlash('The cover benefit has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The cover benefit could not be saved. Please, try again.', '', array(), 'fail');
			}
		} else {
			$options = array('conditions' => array('CoverBenefit.' . $this->CoverBenefit->primaryKey => $id));
			$this->request->data = $this->CoverBenefit->find('first', $options);
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
		$this->CoverBenefit->id = $id;
		if (!$this->CoverBenefit->exists()) {
			throw new NotFoundException(__('Invalid cover benefit'));
		}
		$cover = array('id'=> $id, 'deleted_status' => 'Yes', 'deleted_by'=>$user_id, 'deleted_date'=>date('Y-m-d H:i:s'));
		if($this->CoverBenefit->save($cover)){
			$this->Session->setFlash('The cover benefit has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The cover benefit could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
