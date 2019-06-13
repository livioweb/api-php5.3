<?php

include_once '../config/database.php';

// instantiate database and product object
$database = new Database();
$tasksStmt = new Tasks($database->getConn());
//$tasks = $tasksStmt->getTasks();

//var_dump($tasks);die("morreu na model");


class Tasks
{

    private $conn;
    private $tableName = "tasks";

    public $id;
    public $titulo;
    public $description;
    public $priority;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getTasks()
    {

        $query = $this->conn->prepare("SELECT * FROM tasks ORDER BY priority ASC");
        $query->execute();
        return $query->fetchAll();

    }

    function createTasks(){


        //var_dump($this->titulo);die("morreu na propriedade");

        $query = "INSERT INTO
                " . $this->tableName . "
            SET
                titulo=:titulo,description=:description, priority=:priority";

        $stmt = $this->conn->prepare($query);

        $this->titulo=htmlspecialchars(strip_tags($this->titulo));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->priority=htmlspecialchars(strip_tags($this->priority));

        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":priority", $this->priority);

       // var_dump($stmt);die("morreu no create");

        if($stmt->execute()){
            return true;
        }

        return false;

    }

    public function readOneTask(){

        $query = "SELECT * FROM  " . $this->tableName . "

                
            WHERE
                id = ?
            LIMIT
                0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->titulo = $row['titulo'];
        $this->description = $row['description'];
        $this->priority = $row['priority'];

    }

    // update the product
    function updateTask(){

        // update query
        $query = "UPDATE
                " . $this->tableName . "
            SET
                titulo = :titulo,
                description = :description,
                priority = :priority
            WHERE
                id = :id";

        $stmt = $this->conn->prepare($query);
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->titulo=htmlspecialchars(strip_tags($this->titulo));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->priority=htmlspecialchars(strip_tags($this->priority));

        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":priority", $this->priority);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    public function deleteTask(){

        // delete query
        $query = "DELETE FROM " . $this->tableName . " WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }

    // update the product
    function updatePriorityTask(){

        // update query
        $query = "UPDATE
                " . $this->tableName . "
            SET
                priority = :priority
            WHERE
                id = :id";

        $stmt = $this->conn->prepare($query);
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->priority=htmlspecialchars(strip_tags($this->priority));

        $stmt->bindParam(":priority", $this->priority);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

}
/*
CREATE TABLE IF NOT EXISTS `tasks` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `priority` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;


INSERT INTO `tasks` (`id`, `titulo`, `description`, `priority`) VALUES
(1, 'Concluir Projeto', 'Concluir o projeto no tempo da sprint.','2'),
(2, 'Inserir botao na pagina inicial', 'Gadgets, inserir botas de impressao na pagina inicial do boleto.', '3'),
(3, 'Verificar sql criando index', 'melhorar consultas sql', '1')

*/
