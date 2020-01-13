<?php

class UserAuth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('security');

        //$this->load->helper('url');
        //Esse helper será usado para
        //linkar os css tambem

        // Load form helper library
        $this->load->helper('form');

        // Load form validation library
        $this->load->library('form_validation');

        // Load session library
        $this->load->library('session');

        // Load database
        $this->load->model('users');
    }

    // Show login page
    public function index()
    {
        $this->load->view('LoginForm');
    }

    // Mostra a pagina de registro
    public function user_registration_show()
    {
        $this->load->view('RegisterForm');
    }

    // Validate and store registration data in database
    public function new_user_registration()
    {
        // Regras de validação do formulario
        $this->form_validation->set_rules('username', 'Nome', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('password', 'Senha', 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('RegisterForm');
        } else {
            $data = array(
                'name' => $this->input->post('username'),
                'email' => $this->input->post('email_value'),
                'password' => hash('sha256', $this->input->post('password'), false),
                //Utilizando uma função para usar um hash e embaralhar a senha do usuario
                //para guardar ela incriptada  no banco
            );
            /**
             * Inserção no banco e depois mostra a view do Login
             * Senao 
             *  exibe Mensagem de erro e mantem o usuario na pagina de Registro
             */
            if ($this->users->insert($data)) {
                $data['message_display'] = 'Usuário cadastrado com sucesso !';
                $this->load->view('LoginForm', $data);
            } else {
                $data['message_display'] = 'Falha ao cadastrar o usuário';
                $this->load->view('RegisterForm', $data);
            }
        }
    }

    // Check for user login process
    public function user_login_process()
    {
        $this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        /**
         * Se o usuario estiver logado
         * redireciona para a view de Mensagem
         * Senão verifica se ele existe no banco e processa o login
         *  redireciona para a view de Mensagem
         */
        if ($this->form_validation->run() == false) {
            if (isset($this->session->userdata['logged_in'])) {
                redirect('/message');
            } else {
                $this->load->view('LoginForm');
            }
        } else {
            $data = array(
                'email' => $this->input->post('email_value'),
                'password' => hash('sha256', $this->input->post('password'), false),
            );
            $result = $this->users->where($data)->get();

            if ($result != false) {
                $session_data = array(
                    'id' => $result->id,
                    'name' => $result->name,
                    'email' => $result->email,
                );
                // Add user data in session
                $this->session->set_userdata('logged_in', $session_data);
                redirect('/message');
            } else {
                $data = array(
                    'error_message' => 'Invalid Email or Password',
                );
                $this->load->view('LoginForm', $data);
            }
        }
    }

    // Logout from admin page
    public function logout()
    {

        // Removendo a veriavel de sessao e redirecionando para a view de login
        $sess_array = array(
            'email' => '',
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('LoginForm', $data);
    }

}
