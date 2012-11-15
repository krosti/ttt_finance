<?php
App::uses('AppModel', 'Model');
/**
 * Banner Model
 *
 * @property BannerTipo $BannerTipo
 */
class Banner extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'image' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'banner_tipo_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'BannerTipo' => array(
			'className' => 'BannerTipo',
			'foreignKey' => 'banner_tipo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
