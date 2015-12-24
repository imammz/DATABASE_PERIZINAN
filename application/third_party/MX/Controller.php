<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions * */
require dirname(__FILE__) . '/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link	http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright	Copyright (c) 2011 Wiredesignz
 * @version 	5.4
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * */
class MX_Controller {

    public $autoload = array();

    public function __construct() {
        $class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
        log_message('debug', $class . " MX_Controller Initialized");
        Modules::$registry[strtolower($class)] = $this;

        /* copy a loader instance and initialize */
        $this->load = clone load_class('Loader');
        $this->load->initialize($this);

        /* autoload module items */
        $this->load->_autoloader($this->autoload);
        $this->checkLogin();
    }

    public function __get($class) {
        return CI::$APP->$class;
    }

    function _outputjson($data) {
        $data = json_encode($data);
        $length = strlen($data);
        header('Content-Type: application/json; charset=utf-8');
        header('Content-Length: ' . $length);
        header('Access-Control-Allow-Origin: *');
        echo $data;
        exit();
    }

    function _outputjsonpost($data) {
        $data = json_encode($data);
        $length = strlen($data);
        header('Content-Type: application/json; charset=utf-8');
        header('Content-Length: ' . $length);
        echo $data;
        exit();
    }

    function _outputcurl($data) {
        $length = strlen($data);
        header('Content-Type: application/json');
        header('Content-Length: ' . $length);
        echo $data;
        exit();
    }

    function _checkMessage() {

        if (isset($_SESSION['message'])) {
            echo '<script>alert("' . $_SESSION['message'] . '"); closeModal();</script>';
            echo '<meta http-equiv="refresh" content="0">';
        }

        unset($_SESSION['message']);
    }

    function encrypt_callback($text) {
        $encrypt = new Encrypt_2015();
        $ency = $encrypt->_base64_encrypt($text, $this->config->item('encryption_key'));
        return $ency;
    }

    function decrypt_callback($text) {
        $encrypt = new Encrypt_2015();
        $ency = $encrypt->_base64_decrypt($text, $this->config->item('encryption_key'));
        return $ency;
    }

    function checkLogin() {

        if (!isset($_SESSION['login'])) {

            redirect('config/login');
        } elseif (!isset($_SESSION['user'])) {

            redirect('config/login');
        }elseif (!isset($_SESSION['user']['id_pejabat'])) {

            redirect('config/login');
        }
    }

    function checkLogout() {

        if (isset($_SESSION['login'])) {
            if ($_SESSION['login']) {
                redirect('home');
            }
        }
    }

}
