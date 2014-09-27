<?php
App::uses('AppController', 'Controller');
/**
 * OperationTypes Controller
 *
 * @property OperationType $OperationType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class OperationTypesController extends AppController {

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
		$this->OperationType->recursive = 0;
		$this->set('operationTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OperationType->exists($id)) {
			throw new NotFoundException(__('Invalid operation type'));
		}
		$options = array('conditions' => array('OperationType.' . $this->OperationType->primaryKey => $id));
		$this->set('operationType', $this->OperationType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OperationType->create();
			if ($this->OperationType->save($this->request->data)) {
				$this->Session->setFlash(__('The operation type has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The operation type could not be saved. Please, try again.'), 'flash/error');
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
        $this->OperationType->id = $id;
		if (!$this->OperationType->exists($id)) {
			throw new NotFoundException(__('Invalid operation type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OperationType->save($this->request->data)) {
				$this->Session->setFlash(__('The operation type has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The operation type could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('OperationType.' . $this->OperationType->primaryKey => $id));
			$this->request->data = $this->OperationType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->OperationType->id = $id;
		if (!$this->OperationType->exists()) {
			throw new NotFoundException(__('Invalid operation type'));
		}
		if ($this->OperationType->delete()) {
			$this->Session->setFlash(__('Operation type deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Operation type was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
