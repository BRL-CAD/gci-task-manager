<?php
App::uses('AppModel', 'Model');
/**
 * Mentor Model
 *
 * @property Task $Task
 */
class Mentor extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'melange_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'melange_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Task' => array(
			'className' => 'Task',
			'joinTable' => 'mentors_tasks',
			'foreignKey' => 'mentor_id',
			'associationForeignKey' => 'task_id',
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
