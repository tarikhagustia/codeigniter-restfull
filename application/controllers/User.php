<?php

require APPPATH.'/libraries/REST_Controller.php';
/*

@ param : id = ID di tabel User
@ link :

*/
class User extends REST_Controller
{
    public function __construct($config = 'rest')
    {
        parent::__construct($config);
    }
    public function index_post()
    {
        $id = $this->post('id');
        if ($id == null):
          $this->response([
            'status' => 400,
            'response' => 'Parameter id diperlukan',
          ], 200);
          exit();
        endif;
        $data = $this->db->get_where('user', ['id' => $id]);
        if (count($data->result()) > 0):
          $this->response([
            'status' => 200,
            'response' => 'success',
            'result' => $data->result(),
            ], 200); else:
        $this->response([
          'status' => 400,
          'response' => 'Data dengan ID = '.$id.' tidak ditemukan',
        ], 400);
        endif;
    }
}
