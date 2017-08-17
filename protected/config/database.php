<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',

	'connectionString' => 'mysql:host=localhost;dbname=lanbuddy-db',
	'emulatePrepare' => true,
	'username' => 'lanbuddy',
	'password' => 'ur4nus',
	'charset' => 'utf8',
);