<?php
App::uses('AppController', 'Controller');
/**
 * PropertyTypes Controller
 *
 * @property PropertyType $PropertyType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PropertyTypesController extends AppController {

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
		$this->PropertyType->recursive = 0;
		$this->set('propertyTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PropertyType->exists($id)) {
			throw new NotFoundException(__('Invalid property type'));
		}
		$options = array('conditions' => array('PropertyType.' . $this->PropertyType->primaryKey => $id));
		$this->set('propertyType', $this->PropertyType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PropertyType->create();
			if ($this->PropertyType->save($this->request->data)) {
				$this->Session->setFlash(__('The property type has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The property type could not be saved. Please, try again.'), 'flash/error');
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
        $this->PropertyType->id = $id;
		if (!$this->PropertyType->exists($id)) {
			throw new NotFoundException(__('Invalid property type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PropertyType->save($this->request->data)) {
				$this->Session->setFlash(__('The property type has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The property type could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('PropertyType.' . $this->PropertyType->primaryKey => $id));
			$this->request->data = $this->PropertyType->find('first', $options);
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
		$this->PropertyType->id = $id;
		if (!$this->PropertyType->exists()) {
			throw new NotFoundException(__('Invalid property type'));
		}
		if ($this->PropertyType->delete()) {
			$this->Session->setFlash(__('Property type deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Property type was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
