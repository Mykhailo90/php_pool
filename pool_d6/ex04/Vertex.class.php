<?php
 require_once 'Color.class.php';
Class Vertex{
    private $_x;
    private $_y;
    private $_z;
    private $_w;
    private $_color;
    static $verbose = false;
    public function __construct($coord)
    {
            $this->_x = floatval($coord['x']);
            $this->_y = floatval($coord['y']);
            $this->_z = floatval($coord['z']);
            if (floatval($coord['w'])){
                $this->_w = floatval($coord['w']);
            }
            else{
                $this->_w = 1.0;
            }
            if ($coord['color']){
                $this->_color = $coord['color'];
            }
                else{
                $this->_color = new Color(array('red'=>255, 'green'=>255, 'blue'=>255));
                }
        if (self::$verbose == TRUE) {
            printf($this->__toString());
            printf("constructed\n");
        }
    }
    public function __toString()
    {
        if (self::$verbose == TRUE)
        {
            $ret = sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f, %s )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
        }
        else{
            $ret = sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
        }
        return ($ret);
    }
    function __destruct()
    {
        if (self::$verbose == TRUE) {
            printf($this->__toString());
            printf("destructed\n");
        }
    }
    public static function doc(){
      $homepage = file_get_contents('Vertex.doc.txt');
      return $homepage;
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
    public function setX($var){
        $this->_x = $var;
    }
    public function setY($var) {
        $this->_y = $var;
    }
    public function setZ($var){
        $this->_z - $var;
    }
    public function setW($var){
        $this->_w = $var;
    }
    public function opposite()
   {
       return new Vector(array('dest' => new Vertex(array('x' => $this->_x * -1, 'y' => $this->_y * -1, 'z' => $this->_z * -1))));
   }

}
