<?php
App::uses('AppModel', 'Model');
/**
 * Task Model
 *
 */
class Task extends AppModel {
 public $actsAs = array('Containable');
	
public function afterFind($results, $primary = false) {
    foreach ($results as $key => $val) {
		if(isset($results[$key]['Task']['category'])){
        $results[$key]['Task']['category'] = explode(",",$val['Task']['category']);
		}
    }
    return $results;
}

private function isValidURL($url) { return (bool)parse_url($url); }
private function hrefify($url) {
    if($this->isValidURL($url)){
        return "<a href=\"". $url . "\">" . $url . "</a>";
    } else {
        return $url;
    }
}

public function beforeSave($options = array()) {
    if(isset( $this->data['Task']['category'])){
    $this->data['Task']['category'] = implode(",",$this->data['Task']['category']);
    }
    if(!(empty($this->data['Task']['background'])&&
        empty($this->data['Task']['action'])&&
        empty($this->data['Task']['references'])&&
        empty($this->data['Task']['modify']))){
                
    $back = $this->data['Task']['background'];
    $act = $this->data['Task']['action'];
    $ref = $this->data['Task']['references'];
    $mod = $this->data['Task']['modify'];
    $back = "<p>" . implode( "</p>\n\n<p>", preg_split( '/\n(?:\s*\n)+/', $back ) ) . "</p>";
    $act = "<p>" . implode( "</p>\n\n<p>", preg_split( '/\n(?:\s*\n)+/', $act ) ) . "</p>";
    if(strlen($ref)>3) {$ref = "<ul><li>" . implode( "</li>\n\n<li>", array_filter(array_map($this->hrefify,explode( "\n", $ref )))) . "</ul></li>";} else {$ref = '';}
    if(strlen($mod)>3) {$mod = "Code: <ul><li>" . implode( "</li>\n\n<li>", array_filter(array_map($this->hrefify,explode("\n", $mod )))) . "</ul></li>";} else {$mod = '';}
    $this->data['Task']['description'] = $back.$act.$ref.$mod;}
    return true;
}


/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'action' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
		'mentors' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'beginner' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'length' => array(
			'numeric' => array(
				'rule' => array('numeric'),
                                //'message' => 'Your custom message here',
                                //'allowEmpty' => false,
                                //'required' => true,
                                //'last' => false, // Stop validation after this rule
                                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                        ),
			'range' => array(
				'rule' => array('range',71.9,720.1),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public $hasAndBelongsToMany = array(
                'Mentor' => array(
                        'className' => 'Mentor',
                        'joinTable' => 'mentors_tasks',
                        'foreignKey' => 'task_id',
                        'associationForeignKey' => 'mentor_id',
                        'unique' => 'keepExisting',
                        'conditions' => '',
                        'fields' => '',
                        'order' => '',
                        'limit' => '',
                        'offset' => '',
                        'finderQuery' => '',
                )
        );
}


