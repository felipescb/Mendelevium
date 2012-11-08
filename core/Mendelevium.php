<?php

	require 'Predis/Autoloader.php';
	Predis\Autoloader::register();

	class Mendelevium
	{

		private $_redisScheme = 'Mendelevium';
		private $_redisHost = 'localhost';
		private $_redisPort = 6379;

		function __construct(){
			$redis = new Predis\Client(array(
   			 'scheme' =>  $this->_redisScheme,
    		 'host'   => $this->_redisHost,
    		 'port'   => $this->_redisPort,
			));

		}

		function log(){

		}

	}