<?php
App::uses('AppController', 'Controller');
/**
 * CoverTypes Controller
 *
 * @property CoverType $CoverType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CoverTypesController extends AppController {

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
		$this->CoverType->recursive = 0;
		$this->set('coverTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CoverType->exists($id)) {
			throw new NotFoundException(__('Invalid cover type'));
		}
		$options = array('conditions' => array('CoverType.' . $this->CoverType->primaryKey => $id));
		$this->set('coverType', $this->CoverType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CoverType->create();
			if ($this->CoverType->save($this->request->data)) {
				$this->Session->setFlash(__('The cover type has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cover type could not be saved. Please, try again.', '', array(), 'fail');
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
		if (!$this->CoverType->exists($id)) {
			throw new NotFoundException(__('Invalid cover type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CoverType->save($this->request->data)) {
				$this->Session->setFlash(__('The cover type has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cover type could not be saved. Please, try again.', '', array(), 'fail');
			}
		} else {
			$options = array('conditions' => array('CoverType.' . $this->CoverType->primaryKey => $id));
			$this->request->data = $this->CoverType->find('first', $options);
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
		$this->CoverType->id = $id;
		if (!$this->CoverType->exists()) {
			throw new NotFoundException(__('Invalid cover type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CoverType->delete()) {
			$this->Session->setFlash(__('The cover type has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash(__('The cover type could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
