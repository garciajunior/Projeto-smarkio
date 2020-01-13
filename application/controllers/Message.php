<?php


class Message extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->helper('security');
    // Load session library
    $this->load->library('session');

    // Load database
    $this->load->model('Messages');

    $this->load->library('form_validation');

    $this->load->helper('form');
  }
  //Função verifica se o usuario esta logado 
  // senao redireciona para a pagina de login
  public function isLogin()
  {
    if (empty($this->session->userdata['logged_in']) || empty($this->session->userdata['logged_in']['email'])) {
      redirect('/login');
    }
  }

  // Show login page
  //--------------------------------------------------
  public function index()
  {
    $this->isLogin(); // retorna para a pagina de login caso o usuario nao esteja logado

    // $id_user recebe o id do usuario logado  pela variavel de sessao
    $data  = array(
      'id_user' => $this->session->userdata['logged_in']['id']
    );
    /**
     * @result => Select * from Mensagem
     */
    $result = $this->Messages->as_array()->where($data)->get_all();
    /** 
     *  Verifica Se tem mensagens se tiver  carrega a view de Menssagem 
     *    passando o array $data de mensagem
     *  Senao
     *   Carrega a view de Menssgem sem o array $data
     */
    if ($result != FALSE) {
      $data = array(
        'messages' => $result
      );
      //Carrega a view de Menssagem passando o array de mensagens  do usuario  logado
      $this->load->view('Message', $data);
    } else {
      $this->load->view('Message');
    }
  }
  //------------------------------------------------------------------------
  //Method para Criar  um mensagem
  public function create()
  {
    $this->isLogin(); // retorna para a pagina de login caso o usuario nao esteja logado
    //Valida e pre processa  o field text_message       
    $this->form_validation->set_rules('text_message', 'Mensagem', 'required');
    /**
     * Se o field texxt_message estiver vazio
     *  envia uma mensagem de erro
     * Senao
     *  busca com o id_user da sessao  e redeniza todas as mensagens na view de Menssagem
     */
    if ($this->form_validation->run() == FALSE) {
      $data = array(
        'error_message' => "Error message created"
      );
      /**
       * @result => Select * from Mensagem
       */
      $result = $this->Messages->as_array()->where(array('id_user' => $this->session->userdata['logged_in']['id']))->get_all();

      if ($result != FALSE) {
        $data['messages'] = $result;
      }
      //Carrega a view com as Mensagens do Usuario
      $this->load->view('Message', $data);
      /**
       * Senao pega  o id-user da sessao e o text_message
       * Faz  o inserta no Banco usando o Model Messages
       */
    } else {
      $data = array(
        'id_user' => $this->session->userdata['logged_in']['id'],
        'text_message' => $this->input->post('text_message'),
      );

      $insert_table = $this->Messages->insert($data);
      /**
       * @result => Select * from Mensagem
       */
      $result = $this->Messages->as_array()->where(array('id_user' => $this->session->userdata['logged_in']['id']))->get_all();
      /**
       * Se conseguiu inserir no banco 
       *  Mensagem de sucesso
       * Senao mensagem de erro 
       */
      if ($result != FALSE) {
        $data['messages'] = $result;
      }
      if ($insert_table) {
        $data['message_display'] = 'Mensagem criada com sucesso';
        $this->load->view('Message', $data);
      } else {
        $data['error_message'] = 'Falha ao cadastrar mensagem';
        $this->load->view('Message', $data);
      }
    }
  }

  public function delete($id)
  {
    $this->isLogin(); // retorna para a pagina de login caso o usuario nao esteja logado
    /**
     * @id => Id da mensagem
     * @id_user => Id do usuario logado na sessao
     */
    $data = array(
      'id' => $id,
      'id_user' => $this->session->userdata['logged_in']['id']
    );
    /**
     * Deleta na table passando a variavel $data
     */
    $delete_table = $this->Messages->delete($data);
    /**
     * @result => Select * from Mensagem
     */
    $result = $this->Messages->as_array()->where(array('id_user' => $this->session->userdata['logged_in']['id']))->get_all();
    /**
     * Verifica se conseguiu excluir se sim 
     *  Exibe mensagem de sucesso e carrega a view de Mensagem com  todas as Mensagem.
     * Senao
     *  Exibe mensagem de erro e carrega a view de Mensagem com a mensagem de erro.  
     */
    if ($result != FALSE) {
      $data['messages'] = $result;
    }
    if ($delete_table) {
      $data['message_display'] = 'Mensagem ' . $data['id'] . ' apagada com sucesso';
      $this->load->view('Message', $data);
    } else {
      $data['message_display'] = 'Falha ao apagar mensagem';
      $this->load->view('Message', $data);
    }
  }
}
