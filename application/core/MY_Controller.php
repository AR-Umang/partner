<?php

class My_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function render($uid, $view, $header = null, $body = null, $footer = null)
    {
        // $uid = $_SESSION['partner']['partner_id'];
        // print_r($header);die;
        // echo $uid;die;
        $header['trans'] = $this->Api_model->get_where_order_by_D('tbl_partner_request', array('request_partner_id' => $uid), 'request_sr');
        $header['kapedCCA'] = $this->Api_model->get_where_order_by_D('tbl_unicorn_applications', array('reference_id' => $uid), 'sr');
        $profile = $this->Api_model->get_where('tbl_partner', array('partner_id' => $uid))[0];
        $profile['partner_password'] = '';
        $header['profile'] = $profile;
        $this->load->view('common/header', $header);
        $this->load->view($view, $body);
        $this->load->view('common/footer', $footer);
    }

    function getRandomString($n)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    function ApiKey($key)
    {
        $signature = hash_hmac('sha256', Salt, $key, true);
        $encodedSignature = base64_encode($signature);
        // urlencode...
        // $encodedSignature = urlencode($encodedSignature);
        return $encodedSignature;
    }
}
