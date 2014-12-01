<?php
App::uses('AppController', 'Controller');
/**
 * Mentors Controller
 *
 * @property Mentor $Mentor
 * @property PaginatorComponent $Paginator
 */
class MentorsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Mentor->recursive = 0;
		$this->set('mentors', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Mentor->exists($id)) {
			throw new NotFoundException(__('Invalid mentor'));
		}
		$options = array('conditions' => array('Mentor.' . $this->Mentor->primaryKey => $id));
		$this->set('mentor', $this->Mentor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Mentor->create();
			if ($this->Mentor->save($this->request->data)) {
				$this->Session->setFlash(__('The mentor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mentor could not be saved. Please, try again.'));
			}
		}
		$tasks = $this->Mentor->Task->find('list');
		$this->set(compact('tasks'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Mentor->exists($id)) {
			throw new NotFoundException(__('Invalid mentor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Mentor->save($this->request->data)) {
				$this->Session->setFlash(__('The mentor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mentor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Mentor.' . $this->Mentor->primaryKey => $id));
			$this->request->data = $this->Mentor->find('first', $options);
		}
		$tasks = $this->Mentor->Task->find('list');
		$this->set(compact('tasks'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Mentor->id = $id;
		if (!$this->Mentor->exists()) {
			throw new NotFoundException(__('Invalid mentor'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Mentor->delete()) {
			$this->Session->setFlash(__('The mentor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The mentor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
