<?php

	print '<b>' . 'simple SELECT' . '</b><br />';
	$result_name = \NTRNX_MYSQLI\ntrnx_mysqli::select(
			self::$db_account_handle,

			array(	'accounts', 'account_id',
					'accounts', 'name'),

			array(	$db_name, 'accounts')

		);

	print '<b>' . 'simple SELECT with simple WHERE' . '</b><br />';
	$result_name = \NTRNX_MYSQLI\ntrnx_mysqli::select(
			self::$db_account_handle,

			array(	'accounts', 'account_id',
					'accounts', 'name'),

			array(	$db_name, 'accounts'),

			NULL,

			array(	'accounts', 'name', 'EQUAL', 'STRING', $account_name)
		);

	print '<b>' . 'cross SELECT over 3 tables' . '</b><br />';
	$result_name = \NTRNX_MYSQLI\ntrnx_mysqli::select(
			self::$db_account_handle,

			array(	'accounts', 'account_id',
					'accounts', 'name',
					'account_keys', 'passwd',
					'account_strings', 'salt'),

			array(	$db_name, 'accounts',
					$db_name, 'account_keys',
					$db_name, 'account_strings'
			)

		);

	print '<b>' . 'cross SELECT over 3 tables with multiply WHERE' . '</b><br />';
	$result_name = \NTRNX_MYSQLI\ntrnx_mysqli::select(
			self::$db_account_handle,
			array(	'accounts', 'account_id',
					'accounts', 'name',
					'account_keys', 'passwd',
					'account_strings', 'salt'),

			array(	$db_name, 'accounts',
					$db_name, 'account_keys',
					$db_name, 'account_strings'
			),

			NULL,

			array(	'accounts', 'name','EQUAL', 'STRING', $account_name,
					'AND', 'accounts', 'account_id', 'EQUAL', 'account_keys', 'account_id',
					'AND', 'accounts', 'account_id', 'EQUAL', 'account_strings', 'account_id')
		);

	print '<b>' . 'simple SELECT with simple JOIN with simple WHERE' . '</b><br />';
	$result_name = \NTRNX_MYSQLI\ntrnx_mysqli::select(

			self::$db_account_handle,

			array(	'accounts', 'account_id',
					'accounts', 'name',
					'account_keys', 'passwd'),

			array(	$db_name, 'accounts'),

			array(	'INNER', $db_name, 'account_keys',
					'ON', 'accounts', 'account_id',
					'EQUAL', 'account_keys', 'account_id'
			),

			array(	'accounts', 'name','EQUAL', 'STRING', $account_name)

		);

?>