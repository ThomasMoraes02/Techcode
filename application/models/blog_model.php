<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //Modelo de dados - Login

    public function acesso($email, $senha) //Login para acesso a admin
    {
        $this->db->where('email', $email);
        $this->db->where('senha', $senha);
        $usuario = $this->db->get("usuario")->row_array();
        return $usuario;
    }

    //Modelo de dados - Conteudo

    public function cadastrarConteudo($conteudo) //Cadastra conteúdo
    {
        $this->db->insert("conteudo", $conteudo);
    }

    public function listarConteudo() //Pega todos os conteúdos cadastrados
    {
        return $this->db->get("conteudo")->result_array();
    }

    public function getIdConteudo($id) //Busca por ID
    {
        $this->db->where("id", $id);
        $conteudo = $this->db->get("conteudo")->row_array();
        return $conteudo;
    }

    public function alterarConteudo($id, $conteudo) //Altera conteúdo do blog
    {
        $this->db->where("id", $id);
        $this->db->update("conteudo", $conteudo);
    }

    public function deletarConteudo($id) //Deleta conteúdo do blog
    {
        $this->db->where("id", $id);
        $this->db->delete("conteudo");
    }

    //Modelo de dados - Usuário

    public function cadastrarUsuario($usuario) //Cadastra usuário novo
    {
        $this->db->insert("usuario", $usuario);
    }

    public function getUsuario()
    {
       return $this->db->get("usuario");
    }
}