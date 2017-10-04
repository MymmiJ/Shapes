<?php

namespace MymmiJ\Shapes;

require_once 'shapeTraits.php';
require_once 'Exceptions.php';

class Cuboid
{
    use Prismatic;

    private $width;
    private $depth;
    private $height;
    private $face_area;
    private $volume;

    const CUBOID_FACE_SIDES = 4;
    
    function __construct($width, $depth, $height) {
        if($width <= 0 || $depth <=0 || $height <=0) {
            throw new ParamException("Value of both radius: " . $radius . " |and height: " . $height ." must be positive when creating a " . get_class($this));
        }

        //for square cuboids
        $this->width = $width;
        $this->depth = $depth;
        $this->height = $height;
        $this->volume = 1; //as fall-back value in case we need to overload to create generic unit cuboids later

        //calculating the volume assuming the cuboid is square
        $this->volume = $this->calculate_volume($this::CUBOID_FACE_SIDES,$this->width,$this->height);
        //adjusting for rectangles
        if($width !== $depth) {
            $this->volume = $this->volume * ($this->depth / $this->width);
        }
        //this method is less efficient than the obvious method, but generalizes to higher-n polygonal prisms more easily        

    }

    public function get_volume() {
        return $this->volume;
    }
}

class Cylinder
{
    use Prismatic;

    private $radius;
    private $height;
    private $face_area;
    private $volume;

    const CYLINDER_FACE_SIDES = 0;

    function __construct($radius,$height) {
        if($radius <= 0 || $height <=0) {
            throw new ParamException("Value of both radius: " . $radius . " |and height: " . $height ." must be positive when creating a " . get_class($this));
        }


        $this->radius = $radius;
        $this->height = $height;
        $this->volume = 1;

        $this->volume = $this->calculate_volume($this::CYLINDER_FACE_SIDES,$this->radius,$this->height);
    }

    public function get_volume() {
        return $this->volume;
    }
}

class RectangularPyramid extends Cuboid
{
    use Pyramidic;
}

class Cone extends Cylinder
{
    use Pyramidic;
}

class TrianglePyramid
{
    use Pyramidic;

    private $side1,$side2,$side3;
    private $face_height;
    private $height;
    private $volume;

    const TRIANGLE_FACE_SIDES = 3;

    function __construct($side1,$side2,$side3,$height) {
        if($side1 <= 0 || $side2 <=0 || $side3 <=0 || $height <=0) {
            throw new ParamException("Value of all sides: " . $side1 . " | ". $side2 . " | " . $side3 . " |and height: " . $height ." must be positive when creating a " . get_class($this));
        }

        $this->side1 = $side1;
        $this->side2 = $side2;
        $this->side3 = $side3;
        $this->height = $height;

        $this->volume = $this->calculate_volume($this::TRIANGLE_FACE_SIDES,$this->side1,$this->height); //equilateral triangle only at present
    }

    public function get_volume() {
        return $this->volume;
    }
}

class Runner
{

    public function quick_debug_shape($the_shape) {
        echo "<p>" . get_class($the_shape) . " volume:" . $the_shape->get_volume() . "</p>" . PHP_EOL;
    }

    public function quick_debug_shapes($the_shapes) {
        foreach($the_shapes as $i => $value) {
            $this->quick_debug_shape($value);
        }

    }

    public function run() {
        try {
            $array = array(
                new Cuboid(5.5,4.5,10),
                new Cylinder(5,10),
                new TrianglePyramid(3,3,3,10),
                new RectangularPyramid(5,5,10),
                new RectangularPyramid(5,7,10),
                new Cone(5,10),
            );

            try {
                $error_cone = new Cone(-5,10);
            } catch (ParamException $e) {
                echo $e->getMessage() . PHP_EOL;
            }

            $this->quick_debug_shapes($array);

            
        } catch (Exception $e)
        {
            echo $e->getMessage() . PHP_EOL;
        }
    }
}

$runner = new Runner();
$runner->run();
