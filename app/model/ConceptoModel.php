<?php
namespace App\Model;

use App\Lib\Database;
use App\Lib\Response;

class ConceptoModel
{
    private $db;
    private $table = 'Concepto';
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

			$stm = $this->db->prepare("SELECT * FROM $this->table");
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

    public function GetAllWeight()
    {
		try
		{
			$result = array();

            $stm = $this->db->prepare("
                SELECT distinct palabra,
                    (
                        SELECT COUNT(*)
                        FROM $this->table
                        WHERE palabra= c1.palabra
                    ) AS count
                FROM $this->table AS c1
                order by count desc;
            ");
			$stm->execute();
            
			$this->response->setResponse(true);
            $this->response->result = $stm->fetchAll();
            
            foreach ($this->response->result as $key => $value) {
                $stmasignatura = $this->db->prepare(
                    "select a.idAsignatura, a.nombre from concepto c 
                        join asignatura a on c.idasignatura = a.idasignatura
                    where c.palabra like ?;
                ");
                $stmasignatura->execute(
                        array(
                            $value->palabra
                        )
                    );
                $value->asignatura = $stmasignatura->fetchAll();
                
            }



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

			$stm = $this->db->prepare("SELECT * FROM $this->table WHERE idConcepto = ?");
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
    
    public function InsertOrUpdate($data)
    {
		try 
		{
            if(isset($data['idConcepto']))
            {
                $sql = "UPDATE $this->table SET 
                            palabra          = ?, 
                            registro = (select now())
                        WHERE idAsignatura = ?";
                
                $this->db->prepare($sql)
                     ->execute(
                        array(
                            $data['palabra'], 
                            $data['idAsignatura']
                        )
                    );
            }
            else
            {
                $sql = "INSERT INTO $this->table
                            (palabra, registro, idAsignatura)
                            VALUES (?,(select now()),?)";
                
                $this->db->prepare($sql)
                     ->execute(
                        array(
                            $data['palabra'], 
                            $data['idAsignatura'],
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

    
}