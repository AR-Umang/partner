<?php
if (!defined('BASEPATH')) exit('No direct script access allowd');
class Api_model extends CI_Model
{

	public function get_where($table, $where)
	{
		$data =	$this->db->where($where)
			->get($table);

		//echo $this->db->last_query();

		if ($res = $data->result_array()) {
			return $res;
		} else {
			return FALSE;
		}
	}

	public function Join($table1, $table, $where)
	{
		$data =	$this->db->where($where)
			->get($table);

		//echo $this->db->last_query();

		if ($res = $data->result_array()) {
			return $res;
		} else {
			return FALSE;
		}
	}

	public function get_where_order_by($table, $where, $order = "")
	{
		$data =	$this->db->where($where)
			->order_by('id', $order)
			->get($table);

		//echo $this->db->last_query();

		if ($res = $data->result_array()) {
			return $res;
		} else {
			return FALSE;
		}
	}

	public function get_where_order_by_D($table, $where, $order)
	{
		$data =	$this->db->where($where)
			->order_by($order, 'DESC')
			->get($table);

		//echo $this->db->last_query();

		if ($res = $data->result_array()) {
			return $res;
		} else {
			return FALSE;
		}
	}

	public function get_where_like($table, $key, $order = "")
	{
		$data =	$this->db->or_like('first_name',$key)
			->or_like('last_name',$key)
			->or_like('phone',$key)
			->or_like('email',$key)
			->order_by('id', $order)
			->get($table);

		//echo $this->db->last_query();

		if ($res = $data->result_array()) {
			return $res;
		} else {
			return FALSE;
		}
	}

	public function get_personal_credit_scores()
	{
		$SQL = "SELECT r.*, u.first_name, u.last_name, u.email FROM `personal_credit_scores` as r LEFT JOIN `users` as u ON r.user_id = u.ID";
		$query_results = $this->db->query($SQL);

		if (empty($this->db->error()->message) && $query_results) {
			$reports_row = $query_results->result_array();
			return ['status' => TRUE, 'data' => $reports_row];
		} else {
			return ['status' => FALSE, 'data' => null];
		}
	}

	public function get_business_credit_scores()
	{
		$SQL = "SELECT r.*, u.first_name, u.last_name, u.email FROM `business_credit_scores` as r LEFT JOIN `users` as u ON r.user_id = u.ID";
		$query_results = $this->db->query($SQL);

		if (empty($this->db->error()->message) && $query_results) {
			$scores_row = $query_results->result_array();
			return ['status' => TRUE, 'data' => $scores_row];
		} else {
			return ['status' => FALSE, 'data' => null];
		}
	}

	public function get_creditsafe_reports()
	{
		$SQL = "SELECT r.*, u.first_name, u.last_name, u.email FROM `creditsafe_history` as r LEFT JOIN `users` as u ON r.userID = u.ID ORDER BY r.sr DESC";
		$query_results = $this->db->query($SQL);

		if (empty($this->db->error()->message) && $query_results) {
			$reports_row = $query_results->result_array();
			return ['status' => TRUE, 'data' => $reports_row];
		} else {
			return ['status' => FALSE, 'data' => null];
		}
	}

	public function get_credit_card_applications()
	{
		$SQL = "SELECT a.ID, a.company_name, a.tax_id, a.sic_code, s.industry as sic_industry, a.physical_address, a.physical_state, a.physcial_city, a.physical_zip_code, a.administrator_email_address, a.administrator_phone_number, a.created_at, a.updated_at FROM `credit_card_applications` as a LEFT JOIN `sic_codes` as s ON a.sic_code = s.sic_code";
		$query_results = $this->db->query($SQL);

		if (empty($this->db->error()->message) && $query_results) {
			$applications = $query_results->result_array();
			return ['status' => TRUE, 'data' => $applications];
		} else {
			return ['status' => FALSE, 'data' => null];
		}
	}

	public function insert_data($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function update_data($table, $data, $where)
	{
		$query = $this->db->where($where)
			->update($table, $data);
		if ($query) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function update_coterie_application_with_quote($table, $quote, $where)
	{
		$query = $this->db->set('quote_data', $quote, FALSE)->where($where)->update($table);
		if ($query) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_all($table, $order = null)
	{
		if ($order) {
			$this->db->order_by($order, 'DESC');
		}
		$data = $this->db->get($table);
		$data = $data->result_array();
		if ($data) {
			return $data;
		} else {
			return FALSE;
		}
	}

	public function humanTiming($time)
	{
		$time = time() - $time; // to get the time since that moment
		$time = ($time < 1) ? 1 : $time;
		$tokens = array(
			31536000 => 'year',
			2592000 => 'month',
			604800 => 'week',
			86400 => 'day',
			3600 => 'hour',
			60 => 'minute',
			1 => 'second'
		);
		foreach ($tokens as $unit => $text) {
			if ($time < $unit) continue;
			$numberOfUnits = floor($time / $unit);
			return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
		}
	}

	function delete_data($table, $where)
	{
		$del = $this->db->where($where)
			->delete($table);
		if ($del) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function generateRandomString($num)
	{
		$length = $num;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	function distance($lat1, $lng1, $lat2, $lng2, $miles = false)
	{
		$pi80 = M_PI / 180;
		$lat1 *= $pi80;
		$lng1 *= $pi80;
		$lat2 *= $pi80;
		$lng2 *= $pi80;
		$r = 6372.797; // mean radius of Earth in km
		$dlat = $lat2 - $lat1;
		$dlng = $lng2 - $lng1;
		$a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
		$c = 2 * atan2(sqrt($a), sqrt(1 - $a));
		$km = $r * $c;
		return ($miles ? ($km * 0.621371192) : $km);
	}
	
	public function getDataWhereD($table, $where, $order)
	{
		$data =	$this->db->where($where)
			->order_by($order, 'DESC')
			->get($table);

		//echo $this->db->last_query();

		if ($res = $data->result_array()) {
			return $res;
		} else {
			return FALSE;
		}
	}
}
