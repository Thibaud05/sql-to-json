<?php
/**
 * User: TGRA
 * Date: 23/06/15
 * Time: 09:23
 */
class sqlToJson {

	var $sqlList;
	var $mysqli;
	var $varList;

	function sqlToJson (){
		$this->sqlList = array();
		$this->mysqli = new mysqli("127.0.0.1", "root", "", "demo");
	}

	function addSql($store,$sql){
		$this->sqlList[$store] = $sql;
	}

	function addVar($key,$value){
		$this->varList[$key] = $value; 
	}
	
	function get(){
		$json = "";
		foreach ($this->sqlList as $store => $sql) {
			$json .= ($json == "") ? "" : ",";
			$json .= $this->getStoreJson($store,$sql);
		}
		foreach ($this->varList as $key => $value) {
			$json .= ($json == "") ? "" : ",";
			$json .= '"'.$key.'":"'.$value.'"';
		}
		echo "{".$json."}";
	}

	function getStoreJson($store,$sql){
		$json = "";
		$res = $this->mysqli->query($sql);
		if($res){
			$fields = $res->fetch_fields();
			while ($row = $res->fetch_assoc()) {
				$objArray = array();
				foreach ($fields as $val) {
					$objArray[$val->name] = $row[$val->name];
				}
				$json .= ($json == "") ? "" : ",";
				$json .= json_encode((object) $objArray);
			}
		}
		return '"'.$store.'":['.$json.']';
	}
}
?>