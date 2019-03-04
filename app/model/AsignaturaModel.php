<?php
namespace App\Model;

use App\Lib\Database;
use App\Lib\Response;

class AsignaturaModel
{
    private $db;
    private $table = 'Asignatura';
    private $response;
    
    public function __CONSTRUCT()
    {
        $this->db = Database::StartUp();
        $this->response = new Response();
    }
    
    public function GetAll()
    {
		try
		{
			$result = array();

			$stm = $this->db->prepare("SELECT idAsignatura, nombre, cuatrimestre, duracion FROM $this->table");
			$stm->execute();
            
			$this->response->setResponse(true);
            $this->response->result = $stm->fetchAll();
            
            return $this->response;
		}
		catch(Exception $e)
		{
			$this->response->setResponse(false, $e->getMessage());
            return $this->response;
		}
    }
    
    public function Get($id)
    {
		try
		{
			$result = array();

			$stm = $this->db->prepare("SELECT idAsignatura, nombre, cuatrimestre, duracion FROM $this->table WHERE idAsignatura = ?");
			$stm->execute(array($id));

			$this->response->setResponse(true);
            $this->response->result = $stm->fetch();
            
            return $this->response;
		}
		catch(Exception $e)
		{
			$this->response->setResponse(false, $e->getMessage());
            return $this->response;
		}  
    }
	
	public function GetByCode($code)
    {
		try
		{
			$result = array();

			$stm = $this->db->prepare("SELECT * FROM $this->table WHERE codigo = ?");
			$stm->execute(array($code));

			$this->response->setResponse(true);
            $this->response->result = $stm->fetch();
            
            $stmConcepto = $this->db->prepare("
                select c.palabra, c.registro from $this->table a
                        join concepto c on  a.idasignatura = c.idasignatura
                    where a.idasignatura = ?
                    order by c.registro desc
            ");
            $stmConcepto->execute(array($this->response->result->idAsignatura));
            $this->response->result->Concepto = $stmConcepto->fetchAll();

            return $this->response;
		}
		catch(Exception $e)
		{
			$this->response->setResponse(false, $e->getMessage());
            return $this->response;
		}  
    }

	/*
    public function InsertOrUpdate($data)
    {
		try 
		{
            if(isset($data['idCategory']))
            {
                $sql = "UPDATE $this->table SET 
                            CategoryName           = ?, 
                            CategoryDescription    = ?
                        WHERE idCategory = ?";
                
                $this->db->prepare($sql)
                     ->execute(
                        array(
                            $data['CategoryName'], 
                            $data['CategoryDescription'],
                            $data['idCategory']
                        )
                    );
            }
            else
            {
                $sql = "INSERT INTO $this->table
                            (CategoryName, CategoryDescription)
                            VALUES (?,?)";
                
                $this->db->prepare($sql)
                     ->execute(
                        array(
                            $data['CategoryName'], 
                            $data['CategoryDescription'],
                            $data['idCategory']
                        )
                    ); 
            }
            
			$this->response->setResponse(true);
            return $this->response;
        }catch (Exception $e) 
        {
            $this->response->setResponse(false, $e->getMessage());
		}
    }
    */
	
	/*
    public function Delete($id)
    {
		try 
		{
			$stm = $this->db
			            ->prepare("DELETE FROM $this->table WHERE idCategory = ?");			          

			$stm->execute(array($id));
            
			$this->response->setResponse(true);
            return $this->response;
		} catch (Exception $e) 
		{
			$this->response->setResponse(false, $e->getMessage());
		}
    }
	*/
}