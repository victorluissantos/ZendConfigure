<?php
namespace Application\Model;
use Zend\Db\TableGateway\TableGateway;

  class UsuarioTable
  {
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
      $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
       $resultSet = $this->tableGateway->select();
       return $resultSet;
    }
    public function findUserById($id)
    {
      $id  = (int) $id;
      $rowset = $this->tableGateway->select(array('id' => $id));
      $row = $rowset->current();
      if (!$row) {
        throw new \Exception("Could not find row $id");
      }
      return $row;
    }

    public function saveUser(Usuario $usuario)
    {
      $data = array(
        'email' => $usuario->artist,
        'senha'  => $usuario->title,
      );

      $id = (int) $usuario->id;
      if ($id == 0) {
         $this->tableGateway->insert($data);
      } else {
        if ($this->findUserById($id)) {
            $this->tableGateway->update($data, array('id' => $id));
        } else {
            throw new \Exception('Usuário id does not exist');
        }
      }
    }

    public function deleteUser($id)
    {
       $this->tableGateway->delete(array('id' => (int) $id));
    }

     public function findUserByEmailAndPass($email, $senha)
     {
         $email  = (string) $email;
         $senha  = (string) $senha;
         
         $rowset = $this->tableGateway->select(array('email' => $email, 'senha' => $senha));
         $row = $rowset->current();

         if (!$row) {
            return false;
         }
         return $row;
     }

}
?>