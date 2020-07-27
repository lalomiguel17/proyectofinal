<?

function getTest($request){
    $final= new Test();
return $final->getTest($request);
}

class Test{

    private $conexion;
    
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    //buscar
    function getTest(){
        $registro;
        $response;
       // $sql="SELECT * FROM Respuestas;";    

       $sql="SELECT   Nombre_Tratamiento
       from Pacientes P, Respuestas R, Tratamientos T 
       where (T.idTratamiento = R.idTratamiento) AND (R.idPaciente = P.idPaciente)  AND  P.Nombre_Paciente = 'Tomas';";  

        try{            
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);            
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }
 //fin de buscar
}