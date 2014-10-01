<?php
App::uses('AppController', 'Controller');
/**
 * Neighborhoods Controller
 *
 * @property Neighborhood $Neighborhood
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class NeighborhoodsController extends AppController {

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
		$this->Neighborhood->recursive = 0;
		$this->set('neighborhoods', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Neighborhood->exists($id)) {
			throw new NotFoundException(__('Invalid neighborhood'));
		}
		$options = array('conditions' => array('Neighborhood.' . $this->Neighborhood->primaryKey => $id));
		$this->Neighborhood->recursive = 1;
		$this->set('neighborhood', $this->Neighborhood->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Neighborhood->create();
			if ($this->Neighborhood->save($this->request->data)) {
				$this->Session->setFlash(__('The neighborhood has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The neighborhood could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$cities = $this->Neighborhood->City->find('list');
		$this->set(compact('cities'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Neighborhood->id = $id;
		if (!$this->Neighborhood->exists($id)) {
			throw new NotFoundException(__('Invalid neighborhood'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Neighborhood->save($this->request->data)) {
				$this->Session->setFlash(__('The neighborhood has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The neighborhood could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Neighborhood.' . $this->Neighborhood->primaryKey => $id));
			$this->request->data = $this->Neighborhood->find('first', $options);
		}
		$cities = $this->Neighborhood->City->find('list');
		$this->set(compact('cities'));
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
		$this->Neighborhood->id = $id;
		if (!$this->Neighborhood->exists()) {
			throw new NotFoundException(__('Invalid neighborhood'));
		}
		if ($this->Neighborhood->delete()) {
			$this->Session->setFlash(__('Neighborhood deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Neighborhood was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
