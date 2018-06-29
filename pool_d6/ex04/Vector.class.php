<?php
// require_once 'Vertex.class.php';
Class Vector
{
    private $_x;
    private $_y;
    private $_z;
    private $_w = 0.0;
    static $verbose = false;

    public function __construct($array)
    {
        if (!$array['orig']) {
            $this->_x = $array['dest']->x - 0;
            $this->_y = $array['dest']->y - 0;
            $this->_z = $array['dest']->z - 0;
        } else {
            $this->_x = $array['dest']->getX() - $array['orig']->getX();
            $this->_y = $array['dest']->getY() - $array['orig']->getY();
            $this->_z = $array['dest']->getZ() - $array['orig']->getZ();
        }
        if (Vector::$verbose == True)
          printf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
    }

    public static function doc(){
      $homepage = file_get_contents('Vector.doc.txt');
      return $homepage;
    }
    public function __toString()
    {
        $vertex = sprintf("");
        return (sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
    }
    public function getX(){
        return ($this->_x);
    }
    public function getY() {
        return($this->_y);
    }
    public function getZ(){
        return($this->_z);
    }
    public function getW(){
        return($this->_w);
    }
    public function magnitude(){
      return (float)(sqrt(pow($this->getX(), 2) + pow($this->getY(), 2) + pow($this->getZ(), 2)));
    }
    public function normalize() {
        $mag = $this->magnitude();
        return new Vector( array ( 'dest' => new Vertex ( array ( 'x' => ($this->getX() / $mag), 'y' => ($this->getY() / $mag), 'z' => ($this->getZ() / $mag)))));
    }
    public function add( Vector $rhs ) {
      return (new Vector ( array ( 'dest' => new Vertex ( array ('x' => $this->getX() + $rhs->getX(), 'y' => $this->getY() + $rhs->getY(), 'z' => $this->getZ() + $rhs->getZ())))));
    }
    public function sub( Vector $rhs ) {
      return (new Vector ( array ( 'dest' => new Vertex ( array ('x' => $this->getX() - $rhs->getX(), 'y' => $this->getY() - $rhs->getY(), 'z' => $this->getZ() - $rhs->getZ())))));
    }

    public function opposite() {
      return (new Vector ( array ( 'dest' => new Vertex ( array ('x' => $this->getX() * -1, 'y' => $this->getY() * -1, 'z' => $this->getZ() * -1)))));
    }

    public function scalarProduct($k) {
       return (new Vector(array('dest' => new Vertex(array('x' => $this->getX() * $k, 'y' => $this->getY() * $k, 'z' => $this->getZ() * $k)))));
    }

    public function dotProduct( Vector $rhs ) {
       return ( $this->getX() * $rhs->getX() +  $this->getY() * $rhs->getY() +  $this->getZ() * $rhs->getZ());
    }

    public function cos(Vector $rhs) {
        return ((($this->getX() * $rhs->getX()) + ($this->getY() * $rhs->getY()) + ($this->getZ() * $rhs->getZ())) / sqrt((($this->getX() * $this->getX()) + ($this->getY() * $this->getY()) + ($this->getZ() * $this->getZ())) * (($rhs->getX() * $rhs->getX()) + ($rhs->getY() * $rhs->getY()) + ($rhs->getZ() * $rhs->getZ()))));
    }


    public function crossProduct(Vector $rhs) {
        return new Vector(array('dest' => new Vertex( array ( 'x' => $this->getY() * $rhs->getZ() - $this->getZ() * $rhs->getY(),'y' => $this->getZ() * $rhs->getX() - $this->getX() * $rhs->getZ(),'z' => $this->getX() * $rhs->getY() - $this->getY() * $rhs->getX()))));
    }

    function __destruct()
    {
      if (Vector::$verbose == True)
          printf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
    }
}
?>
