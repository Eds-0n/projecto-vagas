<?php

namespace App\Entity;

use \App\Db\Database;

use \PDO;

class Vaga
{
    /**
     * Identificador único da vaga
     * @var integer
     */
    public $id;

    /**
     * Título da vaga
     * @var string
     */
    public $titulo;

    /**
     * Descrição da vaga
     * @var string
     */
    public $descricao;

    /**
     * Define se a vaga está activa
     * @var string (s/n)
     */
    public $activo;

    /**
     * Data de publicação da vaga
     * @var string
     */
    public $data;

    /**
     * Método responsável por cadastrar uma nova vaga no banco
     * @return boolean
     */
    public function cadastrar()
    {
        // DEFINIR A DATA
        $this->data = date('Y-m-d H:i:s');

        // INSERIR A VAGA NO BANCO
        $obDatabase = new Database('vagas');
        $this->id = $obDatabase->insert([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'activo' => $this->activo,
            'data' => $this->data
        ]);

        // RETORNA SUCESSO
        return true;
    }

    /**
     * Método responsável por atualizar a vaga no banco
     * @return boolean
     */
    public function atualizar()
    {
        return (new Database('vagas'))->update('id = ' . $this->id, [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'activo' => $this->activo,
            'data' => $this->data
        ]);
    }

    /**
     * Método responsável por exclior uma vaga do banco
     * @return boolean
     */
    public function excluir()
    {
        return (new Database('vagas'))->delete('id = ' . $this->id);
    }

    /**
     * Método responável por obter as vagas do banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getVagas($where = null, $order = null, $limit = null)
    {
        return (new Database('vagas'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responável por obter a quantidade de vagas do banco de dados
     * @param string $where
     * @return integer
     */
    public static function getQuantidadeVagas($where = null)
    {
        return (new Database('vagas'))->select($where, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;
    }

    /**
     * Método responsável por buscar uma vaga com base ems seu ID
     * @param integer $id
     * @return Vaga
     */
    public static function getVaga($id)
    {
        return (new Database('vagas'))->select('id = ' . $id)->fetchObject(self::class);
    }
}
