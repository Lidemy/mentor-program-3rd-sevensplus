<?php
require_once('./conn.php');
class utilsFunction extends conn {
	public function readAllData(){
		$sql = "SELECT * FROM todolist";
		$rawData = $this->conn->query($sql);
		$arr = array();
		while($row = $rawData->fetch_assoc()){
			$item = array(
				"id" => $row['id'],
				"text" => $row['text'],
				"type" => $row['type']
			);
			array_push($arr,$item);
		}
		echo json_encode($arr);
	}
	public function readOneList($a){
		$stmt = $this->conn->prepare("SELECT * FROM todolist where id = ?");
		$stmt->bind_param("i",$a);
		$stmt->execute();
		$data = $stmt->get_result()->fetch_assoc();
		$stmt->close();
		if (empty($data)){
			http_response_code(404);
			return;
		}
		$arr = array("id" => $data['id'], "text" => $data['text'], "type" => $data['type']);
		echo json_encode($arr);
	}
	public function create($a){
		$stmt = $this->conn->prepare("INSERT INTO `todolist`(`text`) VALUES (?)");
		$stmt->bind_param("s",$a);
		$stmt->execute();
		$id = $this->conn->insert_id;
		$stmt->close();
		$arr = array("mode" => "successful", "id" => $id);
		echo json_encode($arr);
	}
	public function delete($a){
		$stmt = $this->conn->prepare("DELETE FROM `todolist` WHERE `id` = ?");
		$stmt->bind_param("i",$a);
		$stmt->execute();
		$stmt->close();
		$arr = array("mode"=>"successful");
		echo json_encode($arr);
	}
	public function edit($a,$b){
		if (empty($b)){
			http_response_code(404);
			return;
		}
		$stmt = $this->conn->prepare("UPDATE `todolist` SET `type`= ? WHERE id = ?");
		$stmt->bind_param("si",$b,$a);
		$stmt->execute();
		$stmt->close();
		$arr = array("mode"=>"successful");
		echo json_encode($arr);
	}
}
?>