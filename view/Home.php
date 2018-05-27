<?php

/**
 * Description of SimpleResourceList
 *
 * @author fede
 */


class Home extends TwigView {
    
    public function show($pagina) {
        
        echo self::getTwig()->render($pagina);
        
        
    }

    public function errorLogin($dato){
    	echo self::getTwig()->render("login.html.twig", array("errorTipo" => $dato));
    }
	
	 public function registrarVehiculo($dato){
    	echo self::getTwig()->render("registrar_vehiculo.html.twig", array("tiposVehiculos" => $dato));
    }
	
	public function mostrarNombre($dato){
		$vector["nombre"] = $dato["nombre"];
		$vector["email"] = $dato["email"];
		echo self::getTwig()->render("perfil.html.twig", $vector );
	}
	
	public function formularioTipoVehiculos($datos){
		echo self::getTwig()->render("registrar_vehiculo.html.twig", array("tipoVehiculo" => $datos));
	}
	
	public function camposModificarPerfil($datos){
		echo self::getTwig()->render("modificar_perfil.html.twig", array("campoPerfil" => $datos));
	}
}
