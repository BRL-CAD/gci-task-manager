<?php
class TaskShell extends AppShell {
    public $uses = array('Task');

    public function assign_mentors() {
        $tasks = $this->Task->find('list');
        $mentors = $this->Task->Mentor->find('list');
        $tasks = array_keys($tasks);
        foreach($tasks as $task) {
            $taskSv = array('Task'=> array('id' => $task),'Mentor'=>array('Mentor'=>array_rand($mentors,2)));
            $this->out(print_r($this->Task->save($taskSv), true));	
        }
    }
    
    public function force_reparse() {
        $tasks = $this->Task->find('all');
        foreach($tasks as $task) {
            $this->out(print_r($this->Task->save($task), true));
        }
    }
}
