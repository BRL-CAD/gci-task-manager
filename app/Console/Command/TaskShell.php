<?php
class TaskShell extends AppShell {
    public $uses = array('Task');

    public function assign_mentors() {
        $tasks = $this->Task->find('list');
        $mentors = $this->Task->Mentor->find('list');
        $tasks = array_keys($tasks);
        $mentors = array_keys($mentors);
        foreach($tasks as $task) {
$m1 = $mentors[rand(0,count($mentors)-1)];
            $m2 = $mentors[rand(0,count($mentors)-1)];
            while($m1 == $m2){
                $m2 = $mentors[rand(0,count($mentors)-1)];
                }
                        $taskSv = array('Task'=> array('id' => $task),'Mentor'=>array('Mentor'=>array($m1,$m2)));
            $this->out(print_r($this->Task->save($taskSv), true));	
        }
    }
}
