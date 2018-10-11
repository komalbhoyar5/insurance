<?php
App::uses('AppController', 'Controller');
/**
 * CoverBenifites Controller
 *
 * @property CoverBenifite $CoverBenifite
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CoverBenifitesController extends AppController {

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
		$this->CoverBenifite->recursive = 0;
		$this->set('coverBenifites', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CoverBenifite->exists($id)) {
			throw new NotFoundException(__('Invalid cover benifite'));
		}
		$options = array('conditions' => array('CoverBenifite.' . $this->CoverBenifite->primaryKey => $id));
		$this->set('coverBenifite', $this->CoverBenifite->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CoverBenifite->create();
			if ($this->CoverBenifite->save($this->request->data)) {
				$this->Session->setFlash(__('The cover benifite has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cover benifite could not be saved. Please, try again.'));
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
		if (!$this->CoverBenifite->exists($id)) {
			throw new NotFoundException(__('Invalid cover benifite'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CoverBenifite->save($this->request->data)) {
				$this->Session->setFlash(__('The cover benifite has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cover benifite could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CoverBenifite.' . $this->CoverBenifite->primaryKey => $id));
			$this->request->data = $this->CoverBenifite->find('first', $options);
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
		$this->CoverBenifite->id = $id;
		if (!$this->CoverBenifite->exists()) {
			throw new NotFoundException(__('Invalid cover benifite'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CoverBenifite->delete()) {
			$this->Session->setFlash(__('The cover benifite has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cover benifite could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
