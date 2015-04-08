<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_dfgamebench_game'] = array(
	'ctrl' => $TCA['tx_dfgamebench_game']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden,title'
	),
	'feInterface' => $TCA['tx_dfgamebench_game']['feInterface'],
	'columns' => array(
		'hidden' => array(		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type'    => 'check',
				'default' => '0'
			)
		),
		'title' => array(		
			'exclude' => 0,		
			'label' => 'LLL:EXT:df_gamebench/locallang_db.xml:tx_dfgamebench_game.title',		
			'config' => array(
				'type' => 'input',	
				'size' => '30',
			)
		),
	),
	'types' => array(
		'0' => array('showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);



$TCA['tx_dfgamebench_result'] = array(
	'ctrl' => $TCA['tx_dfgamebench_result']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden,gameid,resultvalue'
	),
	'feInterface' => $TCA['tx_dfgamebench_result']['feInterface'],
	'columns' => array(
		'hidden' => array(		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type'    => 'check',
				'default' => '0'
			)
		),
		'gameid' => array(		
			'exclude' => 0,		
			'label' => 'LLL:EXT:df_gamebench/locallang_db.xml:tx_dfgamebench_result.gameid',		
			'config' => array(
				'type'     => 'input',
				'size'     => '4',
				'max'      => '4',
				'eval'     => 'int',
				'checkbox' => '0',
				'range'    => array(
					'upper' => '1000',
					'lower' => '10'
				),
				'default' => 0
			)
		),
		'resultvalue' => array(		
			'exclude' => 0,		
			'label' => 'LLL:EXT:df_gamebench/locallang_db.xml:tx_dfgamebench_result.resultvalue',		
			'config' => array(
				'type'     => 'input',
				'size'     => '4',
				'max'      => '4',
				'eval'     => 'int',
				'checkbox' => '0',
				'range'    => array(
					'upper' => '1000',
					'lower' => '10'
				),
				'default' => 0
			)
		),
	),
	'types' => array(
		'0' => array('showitem' => 'hidden;;1;;1-1-1, gameid, resultvalue')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);
?>