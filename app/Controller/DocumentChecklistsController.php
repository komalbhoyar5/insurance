<?php
App::uses('AppController', 'Controller');
/**
 * DocumentChecklists Controller
 *
 * @property DocumentChecklist $DocumentChecklist
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DocumentChecklistsController extends AppController {

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
		$this->DocumentChecklist->recursive = 0;
		$this->set('documentChecklists', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DocumentChecklist->exists($id)) {
			throw new NotFoundException(__('Invalid document checklist'));
		}
		$options = array('conditions' => array('DocumentChecklist.' . $this->DocumentChecklist->primaryKey => $id));
		$this->set('documentChecklist', $this->DocumentChecklist->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DocumentChecklist->create();
			if ($this->DocumentChecklist->save($this->request->data)) {
				$this->Session->setFlash('The document checklist has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The document checklist could not be saved. Please, try again.', '', array(), 'fail');
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
		if (!$this->DocumentChecklist->exists($id)) {
			throw new NotFoundException(__('Invalid document checklist'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DocumentChecklist->save($this->request->data)) {
				$this->Session->setFlash('The document checklist has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The document checklist could not be saved. Please, try again.', '', array(), 'fail');
			}
		} else {
			$options = array('conditions' => array('DocumentChecklist.' . $this->DocumentChecklist->primaryKey => $id));
			$this->request->data = $this->DocumentChecklist->find('first', $options);
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
		$this->DocumentChecklist->id = $id;
		if (!$this->DocumentChecklist->exists()) {
			throw new NotFoundException(__('Invalid document checklist'));
		}
		// $this->request->allowMethod('post', 'delete');
		if ($this->DocumentChecklist->delete()) {
			$this->Session->setFlash('The document checklist has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The document checklist could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
