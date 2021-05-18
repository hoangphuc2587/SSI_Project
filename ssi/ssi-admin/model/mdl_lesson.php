<?php
include 'classes/TLesson.php';

class LessonModel extends baseModel
{

	public function getAllLesson($area = null, $record_skip, $limit)
	{
		$listLesson = array();

		$sql = "SELECT * FROM t_lesson WHERE delete_flag=0";
		if ($area != null) {
			$sql .= " AND area=" . $area . " ";
		}
		$sql .= " LIMIT " . $record_skip . "," . $limit . " ";

		$result = $this->db->query($sql);
		if ($result['success'] == true) {
			$data =  $result['rows'];
			foreach ($data as $row) {

				if ($row['time_01_from'] != "") {
					$time01FromVal = date('H:i', strtotime($row['time_01_from']));
				} else {
					$time01FromVal = "";
				}

				if ($row['time_01_to'] != "") {
					$time01FromTo = date('H:i', strtotime($row['time_01_to']));
				} else {
					$time01FromTo = "";
				}

				if ($row['time_02_from'] != "") {
					$time02FromVal = date('H:i', strtotime($row['time_02_from']));
				} else {
					$time02FromVal = "";
				}

				if ($row['time_02_to'] != "") {
					$time02FromTo = date('H:i', strtotime($row['time_02_to']));
				} else {
					$time02FromTo = "";
				}

				if ($row['time_03_from'] != "") {
					$time03FromVal = date('H:i', strtotime($row['time_03_from']));
				} else {
					$time03FromVal = "";
				}

				if ($row['time_03_to'] != "") {
					$time03FromTo = date('H:i', strtotime($row['time_03_to']));
				} else {
					$time03FromTo = "";
				}

				$lesson = new TLesson();
				$lesson->setId($row['id']);
				$lesson->setArea($row['area']);
				$lesson->setTitle($row['title']);
				$lesson->setTargetAge01($row['target_age_01']);
				$lesson->setTargetAge02($row['target_age_02']);
				$lesson->setTargetAge03($row['target_age_03']);
				$lesson->setTime01From($time01FromVal);
				$lesson->setTime01To($time01FromTo);
				$lesson->setTime02From($time02FromVal);
				$lesson->setTime02To($time02FromTo);
				$lesson->setTime03From($time03FromVal);
				$lesson->setTime03To($time03FromTo);
				$lesson->setAddress($row['address']);
				$lesson->setPickUp($row['pick_up']);
				if (strlen($row['google_map_link']) > 50) {
					$excerpt   = substr($row['google_map_link'], 0, 50 - 3);
					$excerpt  .= '...';
				} else {
					$excerpt = $row['google_map_link'];
				}
				$lesson->setGoogleMapLink($excerpt);
				$lesson->setRemark($row['remark']);

				array_push($listLesson, $lesson);
			}
		} else {
			echo "An error has occurred: " . $result['error'] . "<br />";
		}
		return $listLesson;
	}

	public function addLesson($area, $title, $targetAge01, $targetAge02, $targetAge03, $time01From, $time01To, $time02From, $time02To, $time03From, $time03To, $address, $pickUp, $googleMapLink, $remark, $userId)
	{
		if ($time01From == "") {
			$time01From = null;
		} else {
			$time01From = date("G:i", strtotime($time01From));
		}
		if ($time01To == "") {
			$time01To = null;
		} else {
			$time01To = date("G:i", strtotime($time01To));
		}
		if ($time02From == "") {
			$time02From = null;
		} else {
			$time02From = date("G:i", strtotime($time02From));
		}
		if ($time02To == "") {
			$time02To = null;
		} else {
			$time02To = date("G:i", strtotime($time02To));
		}
		if ($time03From == "") {
			$time03From = null;
		} else {
			$time03From = date("G:i", strtotime($time03From));
		}
		if ($time03To == "") {
			$time03To = null;
		} else {
			$time03To = date("G:i", strtotime($time03To));
		}

		$sql = "INSERT INTO t_lesson (`area`, `title`, `target_age_01`, `target_age_02`, `target_age_03`, `address`,`pick_up`,`google_map_link`,`remark`, `create_date`, `create_user` , `delete_flag`, `time_01_from`, `time_01_to`, `time_02_from`, `time_02_to`, `time_03_from`, `time_03_to` ) VALUES ('" . str_replace("'", "\'", $area) . "', '" . str_replace("'", "\'", $title) . "', '" . str_replace("'", "\'", $targetAge01) . "', '" . str_replace("'", "\'", $targetAge02) . "', '" . str_replace("'", "\'", $targetAge03) . "', '" . str_replace("'", "\'", $address) . "','" . str_replace("'", "\'", $pickUp) . "','" . str_replace("'", "\'", $googleMapLink) . "','" . str_replace("'", "\'", $remark) . "', NOW(), '" . str_replace("'", "\'", $userId) . "',0";

		if ($time01From == "") {
			$time01FromVal = ", null";
		} else {
			$time01FromVal = ", '" . $time01From . "'";
		}
		$sql .= $time01FromVal;

		if ($time01To == "") {
			$time01ToVal = ", null";
		} else {
			$time01ToVal = ", '" . $time01To . "'";
		}
		$sql .= $time01ToVal;

		if ($time02From == "") {
			$time02FromVal = ", null ";
		} else {
			$time02FromVal = ", '" . $time02From . "'";
		}
		$sql .= $time02FromVal;

		if ($time02To == "") {
			$time02ToVal = ", null ";
		} else {
			$time02ToVal = ", '" . $time02To . "'";
		}
		$sql .= $time02ToVal;

		if ($time03From == "") {
			$time03FromVal = ", null ";
		} else {
			$time03FromVal = ", '" . $time03From . "'";
		}
		$sql .= $time03FromVal;

		if ($time03To == "") {
			$time03ToVal = ", null ";
		} else {
			$time03ToVal = ", '" . $time03To . "'";
		}
		$sql .= $time03ToVal;

		$condition = ")";
		$sql .= $condition;

		$result = $this->db->query($sql);
		// $result = $this->db->query("INSERT INTO t_lesson (`area`, `title`, `target_age_01`, `target_age_02`, `target_age_03`, `time_01_from`, `time_01_to`, `time_02_from`, `time_02_to`, `time_03_from`, `time_03_to`, `address`,`pick_up`,`google_map_link`,`remark`, `create_date`, `create_user` , `delete_flag`) VALUES ('" . str_replace("'", "\'", $area) . "', '" . str_replace("'", "\'", $title) . "', '" . str_replace("'", "\'", $targetAge01) . "', '" . str_replace("'", "\'", $targetAge02) . "', '" . str_replace("'", "\'", $targetAge03) . "', '$time01From', '$time01To', '$time02From', '$time02To', '$time03From', '$time03To', '" . str_replace("'", "\'", $address) . "','" . str_replace("'", "\'", $pickUp) . "','" . str_replace("'", "\'", $googleMapLink) . "','" . str_replace("'", "\'", $remark) . "', NOW(), '" . str_replace("'", "\'", $userId) . "',0)");
	}

	public function editLesson($id, $area, $title, $targetAge01, $targetAge02, $targetAge03, $time01From, $time01To, $time02From, $time02To, $time03From, $time03To, $address, $pickUp, $googleMapLink, $remark, $userId)
	{
		$sql = "UPDATE t_lesson set area='$area', title='" . str_replace("'", "\'", $title) . "', target_age_01='$targetAge01', target_age_02='$targetAge02', target_age_03='$targetAge03', address='" . str_replace("'", "\'", $address) . "', pick_up='" . str_replace("'", "\'", $pickUp) . "', google_map_link='" . str_replace("'", "\'", $googleMapLink) . "', remark='" . str_replace("'", "\'", $remark) . "', update_user='" . str_replace("'", "\'", $userId) . "',update_date=NOW()";

		if ($time01From == "") {
			$time01From = null;
		} else {
			$time01From = date("G:i", strtotime($time01From));
		}
		if ($time01To == "") {
			$time01To = null;
		} else {
			$time01To = date("G:i", strtotime($time01To));
		}
		if ($time02From == "") {
			$time02From = null;
		} else {
			$time02From = date("G:i", strtotime($time02From));
		}
		if ($time02To == "") {
			$time02To = null;
		} else {
			$time02To = date("G:i", strtotime($time02To));
		}
		if ($time03From == "") {
			$time03From = null;
		} else {
			$time03From = date("G:i", strtotime($time03From));
		}
		if ($time03To == "") {
			$time03To = null;
		} else {
			$time03To = date("G:i", strtotime($time03To));
		}


		if ($time01From == "") {
			$time01FromVal = ", time_01_from= null";
		} else {
			$time01FromVal = ", time_01_from='" . $time01From . "'";
		}
		$sql .= $time01FromVal;

		if ($time01To == "") {
			$time01ToVal = ", time_01_to= null";
		} else {
			$time01ToVal = ", time_01_to='" . $time01To . "'";
		}
		$sql .= $time01ToVal;

		if ($time02From == "") {
			$time02FromVal = ", time_02_from= null ";
		} else {
			$time02FromVal = ", time_02_from='" . $time02From . "'";
		}
		$sql .= $time02FromVal;

		if ($time02To == "") {
			$time02ToVal = ", time_02_to= null ";
		} else {
			$time02ToVal = ", time_02_to='" . $time02To . "'";
		}
		$sql .= $time02ToVal;

		if ($time03From == "") {
			$time03FromVal = ", time_03_from= null ";
		} else {
			$time03FromVal = ", time_03_from='" . $time03From . "'";
		}
		$sql .= $time03FromVal;

		if ($time03To == "") {
			$time03ToVal = ", time_03_to= null ";
		} else {
			$time03ToVal = ", time_03_to='" . $time03To . "'";
		}
		$sql .= $time03ToVal;

		$condition = "WHERE id='$id'";
		$sql .= $condition;
		$result = $this->db->query($sql);
		// echo $sql;
		// die();
		// $result = $this->db->query("UPDATE t_lesson set area='$area', title='" . str_replace("'", "\'", $title) . "', target_age_01='$targetAge01', target_age_02='$targetAge02', target_age_03='$targetAge03', time_01_from='$time01From', time_01_to='$time01To', time_02_from='$time02From', time_02_to='$time02To', time_03_from='$time03From', time_03_to='$time03To', address='" . str_replace("'", "\'", $address) . "', pick_up='" . str_replace("'", "\'", $pickUp) . "', google_map_link='" . str_replace("'", "\'", $googleMapLink) . "', remark='" . str_replace("'", "\'", $remark) . "', update_user='" . str_replace("'", "\'", $userId) . "',update_date=NOW() WHERE id='$id'");
	}

	public function deleteLesson($id, $userId)
	{
		$result = $this->db->query("UPDATE t_lesson set delete_flag='1', delete_date=NOW(), delete_user='" . str_replace("'", "\'", $userId) . "' WHERE id='$id'");
	}

	public function getLessonDetail($id)
	{

		$lesson = null;

		$result = $this->db->query("SELECT *  FROM t_lesson  WHERE delete_flag = 0 AND id = '" . $id . "'");

		if ($result['success'] == true && $result['count'] > 0) {
			$data =  $result['rows'][0];
			$lesson = new TLesson();
			$lesson->setId($data['id']);
			$lesson->setArea($data['area']);
			$lesson->setTitle($data['title']);
			$lesson->setTargetAge01($data['target_age_01']);
			$lesson->setTargetAge02($data['target_age_02']);
			$lesson->setTargetAge03($data['target_age_03']);
			$lesson->setTime01From($data['time_01_from']);
			$lesson->setTime01To($data['time_01_to']);
			$lesson->setTime02From($data['time_02_from']);
			$lesson->setTime02To($data['time_02_to']);
			$lesson->setTime03From($data['time_03_from']);
			$lesson->setTime03To($data['time_03_to']);
			$lesson->setAddress($data['address']);
			$lesson->setPickUp($data['pick_up']);
			$lesson->setGoogleMapLink($data['google_map_link']);
			$lesson->setRemark($data['remark']);

			return $lesson;
		} else {
			return null;
		}
	}

	public function getTotalPage($area = null, $limit)
	{
		$total_records = $this->countPage($area);

		$total_page = ceil($total_records / $limit);
		return $total_page;
	}

	public function countPage($area = null)
	{
		$sql = "SELECT COUNT(*) AS TOTAL FROM t_lesson WHERE delete_flag=0";
		if ($area != null) {
			$sql .= " AND area='" . $area . "'";
		}
		$result = $this->db->query($sql);
		if ($result['success'] == true && $result['count'] > 0) {
			$data =  $result['rows'][0];
			$count = $data['TOTAL'];
		}
		return $count;
	}
}
