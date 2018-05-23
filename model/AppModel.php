<?php






//NO TOCAR.





class AppModel extends PDORepository {

    private static $instance;

       private function __construct() {
        
    }

	public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function validateLogin($datos) {
        $answer = $this->queryList("SELECT * FROM usuario where usuario=? and clave=? ;", [ $datos["nomUsr"], $datos["psw"]]);
		return $answer;
    }

    /*public function insertarPedido($datos){n, carta) VALUES (?, ?, ?, ?, ?)" , [ $datos["nombrePN"]
        $answer = $this->queryList("INSERT into pedido (nombre_apellido, tipo_doc_id, numero, direccio, $datos["tipoDoc"], $datos["numero"],  $datos["direccion"], $datos["carta"]]);
        return $answer;
    }*/
	
	public function registrar($datos){
        $answer = $this->queryList("INSERT INTO usuario (nombre, apellido, email, password, fecha_nacimiento) VALUES (:nombre,:apellido,:email,:password,:fecha_nacimiento)" , [ "nombre" => $datos["nombre"], "apellido" => $datos["apellido"], "email" => $datos["email"], "password" => $datos["pass"], "fecha_nacimiento" => $datos["nacimiento"]]);
		return $answer;
    }

	public function existeMail($datos){
		$answer = $this->queryList("SELECT nombre FROM usuario where email=?;", [ $datos ]);
		return $answer;
	}
	
    public function getPerfil($datos){
		$answer = $this->queryList("SELECT * FROM usuario where id=?;", [ $datos ]);
		return $answer;
	}
	
	public function traerPedidos (){
        $answer = $this->queryList("SELECT * FROM pedido");
        var_dump($answer);
        return $answer;
    }
    public function existeUsuario($mail,$contraseña){
        //Busca en la bd el usuario con mail y contraseña ingresado
        $answer = $this->queryList("SELECT id FROM usuario WHERE email=:mail AND password=:contra", ['mail'=>$mail,'contra'=>$contraseña]);
        return $answer;
    }

}
