<?php

class pages extends CI_Controller
{

    public function contact()
    {

        $this->load->view('theme/header');
        $this->load->view('navegador');
        $this->load->view('frm_contact');
        $this->load->view('theme/footer');


    }


    public function vista()
    {

        $this->load->view('theme/header');
        $this->load->view('navegador');
        $this->load->view('vista');
        $this->load->view('theme/footer');


    }

    public function about()
    {

        $this->load->view('theme/header');
        $this->load->view('navegador');
        $this->load->view('about');
        $this->load->view('theme/footer');

    }

    public function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');


    }

    public function login()
    {
        $this->load->view('theme/header');
        $this->load->view('navegador');
        $this->load->view('login');
        $this->load->view('theme/footer');
    }


    public function Check()
    {
    $this->form_validation->set_rules('user', 'user', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required|callback_verifyUser');

    if ($this->form_validation->run() == false){
        $this->load->view('theme/header');
        $this->load->view('navegador');
        $this->load->view('login');
        $this->load->view('theme/footer');

    }else{
        redirect('pages/Home_login');
    }

    }

    public function verifyUser()
    {
    $user = $this->input->post('user');
    $pass = $this->input->post('password');


    if($this->Login_model->login($user,$pass)){
        return true;
    }else{
        $this->form_validation->set_message('verifyUser','<center>The user or password is incorrect please check it</center>');
        return false;
    }
    }

    public function Home_login()
    {

        $this->load->view('theme/header');
        $this->load->view('navegador');
        $this->load->view('Home_login');
        $this->load->view('theme/footer');

    }

    public function pqr()
    {
        $this->load->view('theme/header');
        $this->load->view('navegador');
        $this->load->view('pqr');
        $this->load->view('theme/footer');
    }



    public function menu()
    {
        $this->load->model('Productos_model');
        $data = array('productos' => $this->Productos_model->getProduct(),);
        $this->load->view('theme/header');
        $this->load->view('navegador');
        $this->load->view('menu',$data);
        $this->load->view('theme/footer');

    }
}
