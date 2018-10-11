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
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Agenttype->recursive = 0;
		$this->set('agenttypes', $this->Paginator->paginate());
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
		if ($this->request->is('post')) {
			$this->Agenttype->create();
			if ($this->Agenttype->save($this->request->data)) {
				$this->Session->setFlash('The agent type has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
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
		if (!$this->Agenttype->exists($id)) {
			throw new NotFoundException(__('Invalid agenttype'));
		}
		if ($this->request->is(array('post', 'put'))) {
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
		$this->Agenttype->id = $id;
		if (!$this->Agenttype->exists()) {
			throw new NotFoundException(__('Invalid agenttype'));
		}
		// $this->request->allowMethod('post', 'delete');
		if ($this->Agenttype->delete()) {
			$this->Session->setFlash('The agent type has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The agent type could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
