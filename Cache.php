<?php
/** 
* Classe Cache
*
* Cria um arquivo de cache no formato JASON,
*adiciona um cache caso o arquivo de cache ja exista
*ou subscreve um cache com o mesmo nome.
*
*@author Davi Duarte <daviduartedf@gmail.com>
*@version 1.0
*/

class Cache{
	private $cache;

	//Cria, adiciona ou subscreve um cache
	public function setVar($nome, $val){
		$this->readCache();
		$this->cache->$nome = $val;
		$this->saveCache();
	}
	//Retorna o cache
	public function getVar($nome){
		$this->readCache();
		return $this->cache->$nome;
	}
	 
	private function readCache(){
		$this->cache = new stdClass();
		if(file_exists('cache.cache')){
			$this->cache = json_decode(file_get_contents("cache.cache"));
		}
	}

	private function saveCache(){
		file_put_contents("cache.cache", json_encode($this->cache));
	}
}