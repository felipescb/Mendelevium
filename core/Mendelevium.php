<?php

	require 'Predis/Autoloader.php';
	Predis\Autoloader::register();

	class Mendelevium
	{

		/* Redis Configuration Info */

		private $_redisScheme = 'tcp';
		private $_redisHost = 'localhost';
		private $_redisPort = 6379;
		public $redis;


		/* Integer Var used as helper so I can discover how many logs really exists in memory */
		public $num_helper;

		/* Project Name , used by Melenevium for creating beauty semantic internal log getters */
		public $projName;
		private $traceName;


		function __construct($_projName){
			try {
				$this->redis = new Predis\Client(array(
	   			 'scheme' =>  $this->_redisScheme,
	    		 'host'   => $this->_redisHost,
	    		 'port'   => $this->_redisPort,
				));

				if(!$this->redis->exists('Mendelevium'.$_projName.'EC')){
					$this->redis->set('Mendelevium'.$_projName.'EC',0);
					$this->num_helper = $this->redis->get('Mendelevium'.$_projName.'EC');
				}else{
					$this->num_helper = $this->redis->get('Mendelevium'.$_projName.'EC');
				}


				$this->projName = $_projName;
				$this->traceName = $_projName."F";

			}
			catch (Exception $e) {
			    echo "Couldn't connected to Redis";
			    echo $e->getMessage();
			}
		}

		function log($message = NULL){
			try {
				$trace = debug_backtrace();
				if(is_null($message) || trim($message) == '') throw new Exception("Invalid Log Message");
				else{
					$this->redis->set($this->projName.'LogN'.$this->num_helper,$message);
					$this->redis->rpush($this->projName, $message);
					$this->redis->rpush($this->traceName,$trace[0]['file'].' on line '.$trace[0]['line']);
					if($this->redis->incr('Mendelevium'.$this->projName.'EC')){
						$this->num_helper++;
					} else throw new Exception("Can't Elevate Internal Helper. \n It Should Never Get This Error Since Logic is Perfect!");
				}
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}

		function getAll(){
			$matrixAux[] = $this->redis->lrange($this->projName, 0, -1);
			$matrixAux[] = $this->redis->lrange($this->traceName, 0, -1);
			return $matrixAux;
		}

	}