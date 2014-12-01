<?php
App::uses('AppController', 'Controller');
/**
 * Tasks Controller
 *
 * @property Task $Task
 * @property PaginatorComponent $Paginator
 */
class TasksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','CsvView.CsvView');
	
	public $paginate = array(
        'limit' => 500000,
        'order' => array(
            'Post.title' => 'asc'
        )
    );
	
	public function export() {
		$results = $this->Task->find('all',array('fields'=>array('id','title','description','tags','category','mentors','length','beginner')));
		foreach($results as $key => $value) {
			$results[$key]['Task']['category'] = implode(", ",$value['Task']['category']);
			if($value['Task']['beginner']){
				$results[$key]['Task']['tags'] = "@beginner,".$value['Task']['tags'];
			}
			unset($results[$key]['Task']['beginner']);
		}
		$extract = $this->CsvView->prepareExtractFromFindResults($results);
		$headings = array(
				'Task.id'=>'Sync Key',
				'Task.title'=>'Title',
				'Task.description'=>'Description',
				'Task.mentors'=>'Mentors',
				'Task.category'=>'Types',
				'Task.tags'=>'Tags',
				'Task.length'=>'Time to Complete');
		
		$this->response->download('export'.date('mdy_His').'.csv'); // <= setting the file name
    	$this->viewClass = 'CsvView.Csv';
		$this->CsvView->quickExport($results,array(),$headings);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Paginator->settings = $this->paginate;
		$this->Task->recursive = 0;
		$this->set('tasks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		$options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
		$this->set('task', $this->Task->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		if ($this->request->is(array('post', 'put'))) {
			$this->Task->create();
			if ($this->Task->save($this->request->data)) {
				$this->Session->setFlash(__('The task has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The task could not be saved. Please, try again.'));
			}
		}
		if ($this->Task->exists($id)) {
			$options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
			$this->request->data = $this->Task->find('first', $options);
			
			if(isset($this->request->data['Task']['parent'])){
				$task = $this->Task->find('first',array('conditions'=>array('id'=> $this->request->data['Task']['parent'])));
				$this->request->data['Task']['title'] = $task['Task']['title'];
				$this->request->data['Task']['copies'] = $task['Task']['copies'];
			}
			unset($this->Task->id);
			$this->request->data['Task']['parent']=$this->request->data['Task']['id'];
			$this->request->data['Task']['title']=$this->request->data['Task']['title'].' #'.(1+$this->request->data['Task']['copies']);
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
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Task->save($this->request->data)) {
				$this->Session->setFlash(__('The task has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The task could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
			$this->request->data = $this->Task->find('first', $options);
		}
	}
	
	public function replicate($id = null, $count = 0) {
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		if ($count>0) {
			$task = $this->Task->find('first',array('conditions'=>array('id'=> $id)));
			if(isset($task['Task']['parent'])){
				$task = $this->Task->find('first',array('conditions'=>array('id'=> $task['Task']['parent'])));
			}
			for($i = 1; $i <= $count; $i++){
				unset($this->Task->id);
				$newTask = $task;
				unset($newTask['Task']['id']);
				$newTask['Task']['parent']=$task['Task']['id'];
				$newTask['Task']['title']=$task['Task']['title'].' #'.($i+$task['Task']['copies']);
				$this->Task->save($newTask);
			}
			$task['Task']['copies'] += $count;
			$this->Task->save($task);
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Task->id = $id;
		if (!$this->Task->exists()) {
			throw new NotFoundException(__('Invalid task'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Task->delete()) {
			$this->Session->setFlash(__('The task has been deleted.'));
		} else {
			$this->Session->setFlash(__('The task could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
