<?php
require_once 'Conexion.php';


/**
 * Class Class1
 *
 * Clase para probar el phpdocumentor
 *
 * @author Alvaro
 * @version 1.0.0
 */
class Espectaculo{

   /**
   * Codigo espectaculo
   *
   * @var string
   */
    private $cdespec;
    private $nombre;
    private $tipo;
    private $estrellas;
    private $cdgru;
    private $descripcion;
    public static $numEspectaculos = 0;

    function __construct($cdespec, $nombre, $cdgru, $tipo = null) {
        $this->cdespec = $cdespec;
        $this->nombre = $nombre;
        $this->cdgru = $cdgru;
        $this->tipo = $tipo;
        self::$numEspectaculos++;
    }
   /**
   * Returns the greeting message.
   *
   * @return string The greeting message.
   */
    public function getCdespec() {
        return $this->cdespec;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getEstrellas() {
        return $this->estrellas;
    }

    public function getCdgru() {
        return $this->cdgru;
    }

    public function setEstrellas($estrellas): void {
        $this->estrellas = $estrellas;
    }
    
    function alta_espectaculo(){
        $con = new Conexion();
        
        $con->exec("SET FOREIGN_KEY_CHECKS = 0");
        
        $consulta = $con->query("SELECT COUNT(*) FROM `espectaculo` WHERE `cdespec`='$this->cdespec'");
        
        if($consulta->fetch()[0] > 0){
            $resultado = false;
        }else{
            $insert = $con->exec("INSERT INTO `espectaculo`(`cdespec`, `nombre`, `tipo`, `cdgru`) VALUES ('$this->cdespec','$this->nombre','$this->tipo','$this->cdgru')");
        
            if($insert){
                $resultado = true;
            }else{
                $resultado = false;
            }
        }
        
        return $resultado;
    }
    
    function mostrar_espectaculo($cdespec){
        $con = new Conexion();
        
        $consulta = $con->query("SELECT * FROM `espectaculo` WHERE `cdespec`='".$cdespec."'");

        $resultado = $consulta->fetchAll();
        
        return $resultado;
    }
    
    public static function mostrar_todos_espectaculos(){
        $con = new Conexion();
        
        $consulta = $con->query("SELECT * FROM `espectaculo`");
        
        $total = $consulta->fetchAll();
        
        return $total;
    }
    
    public function eliminar_espectaculo($cdespec){
        $con = new Conexion();
        
        $consulta = $con->query("SELECT COUNT(*) FROM `espectaculo` WHERE `cdespec`='$cdespec'");
        
        if($consulta->fetch()[0] > 0){
            $con->exec('DELETE FROM `espectaculo` WHERE `cdespec`="'.$cdespec.'"');
            $resultado = true;
        }else{
            $resultado = false;
        }
        
        return $resultado;
    }
    
    function asignar_estrellas($estrellas){
         $con = new Conexion();
         
         $this->setEstrellas($estrellas);
         
         $consulta = $con->query("SELECT COUNT(*) FROM `espectaculo` WHERE `cdespec`='$this->cdespec'");
         
         if($consulta->fetch()[0] > 0){
             $con->exec("UPDATE `espectaculo` SET `estrellas`='".$estrellas."' WHERE `cdespec`='$this->cdespec'");
             $resultado = true;
         }else{
             $resultado = false;
         }
         
         return $resultado;
    }
 
}
