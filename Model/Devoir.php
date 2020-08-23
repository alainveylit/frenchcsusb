<?php
App::uses('AppModel', 'Model');
/**
 * Devoir Model
 *
 * @property Lesson $Lesson
 */
class Devoir extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Lesson' => array(
			'className' => 'Lesson',
			'foreignKey' => 'lesson_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
