<?php
Class Color
{
    public $red;
    public $green;
    public $blue;
    public static $verbose = False;

    public function __construct($array)
    {
        if (isset($array['red']) && isset($array['blue']) && isset($array['green'])) {
            $this->red = $array['red'];
            $this->green = intval($array['green'], 16);
            $this->blue = intval($array['blue'], 16);
        } else if (isset($array['rgb'])) {
            $this->red = ($array['rgb'] >> 16);
            $this->green = ($array['rgb'] >> 8) - ($this->red << 8);
            $this->blue = ($array['rgb']) - ($this->red << 16) - ($this->green << 8);
        }
        if (self::$verbose == TRUE) {
            printf($this->__toString());
            printf("constructed\n");
        }
    }
    public function __toString()
    {
        return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
    }

    public function add($object)
    {
        return (new Color(array('red' => $this->red + $object->red,
            'green' => $this->green + $object->green, 'blue' => $this->blue + $object->blue)));
    }

    public function sub($object)
    {
        return (new Color(array('red' => $this->red - $object->red, 'green' => $this->green - $object->green,
            'blue' => $this->blue - $object->blue)));
    }

    public function mult($object)
    {
        $newObj = new Color(array('red' => $this->red * $object, 'green' => $this->green * $object, 'blue' => $this->blue * $object));
        return ($newObj);
    }

    function __destruct()
    {
        if (self::$verbose == TRUE) {
            printf($this->__toString());
            printf("destructed\n");
        }
    }
    public static function doc(){
        $fd = fopen("Color.doc.txt", r);
        $vivod =fread($fd, filesize("Color.doc.txt"));
        printf($vivod);
    }
}
