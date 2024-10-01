<?PHP
class estudiante{
    private $id;
    private $nombre;
    private $apellido;
    private $telefono;
    private $correo;
    private $direccion;
    private $tipoIdentificacion;
    private $fechaNacimiento;
    private $cedula;
    private $estado;

    public function __construct($id = null, $nombre = "", $apellido = "", $telefono = "", $correo = "", $direccion = "", $tipoIdentificacion = "", $fechaNacimiento = "", $cedula = "", $estado = ''){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->direccion = $direccion;
        $this->tipoIdentificacion = $tipoIdentificacion;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->cedula = $cedula;
        $this->estado = $estado;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }


    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getTipoIdentificacion(){
        return $this->tipoIdentificacion;
    }

    public function setTipoIdentificacion($tipoIdentificacion){
        $this->tipoIdentificacion = $tipoIdentificacion;
    }

    public function getFechaNacimiento(){
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento($fechaNacimiento){
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getCedula(){
        return $this->cedula;
    }

    public function setCedula($cedula){
        $this->cedula = $cedula;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }



}
?>