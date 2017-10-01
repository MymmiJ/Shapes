<?php

namespace MymmiJ\Shapes;

const TEST_VARIABLE = "Testing";

//Cylinders have prismatic properties, and this should be useful to extend later - so the fact that we need exceptions for the circle shouldn't matter
abstract class Prismatic
{
    //the apothem is the distance from the centre of a side of a regular polygon to the centre of the polygon - it is analogous to the radius of a circle
    public function calculate_apothem($sides,$length) { 
        $result = $length;

        if($sides === 0) {
            return $result;
        } else {
            $quotient = 180/$sides;

            $two_tan = 2*tan($quotient);

            $result = $length/$two_tan;

            return $result;
        }
    }
    public function calculate_perimeter($sides,$length) {
        $result = null;

        if($sides === 0) {
            $result = 2 * M_PI * $length;
            return $result;
        } else {
            $result = $sides * $length;
            return $result;
        }
    }

    public function calculate_face_area($sides,$length) {
    //A cylinder is effectively a prism with no sides
        $apothem = $this->calculate_apothem($sides,$length);

        $perimeter = $this->calculate_perimeter($sides,$length);

        $area = ($apothem * $perimeter) / 2; //since pi*r^2 === 2*pi*r * r / 2, (radius * perimeter / 2) = area

        return $area;
    }

    public function calculate_volume($sides,$length,$height) {
        $result = null;

        $area = $this->calculate_face_area($sides,$length);

        $result = $area * $height;

        return $result;
    }
}

class Cuboid extends Prismatic
{
    //for the case where Cuboid is a regular polygonal prism
    function __construct($length,$height) {

    }
    //for the case where Cuboid is an irregular polygonal prism
    function __construct($length1,$length2,$height) {

    }

}

class Cylinder extends Prismatic
{
    function __construct() {
        
    }
}


class Runner
{
    public function run($test) {
        try {
            $construct_cuboid_test = new Cuboid();
            $construct_cylinder_test = new Cylinder();

            echo $construct_cuboid_test->calculate_perimeter(5,4) . PHP_EOL;
            echo $construct_cylinder_test->calculate_volume(0,5,10) . PHP_EOL;
        } catch (Exception $e)
        {
            echo $e->getMessage(). PHP_EOL;
        }
    }
}

$runner = new Runner(); //according to style guide this should be in a separate file, as should the active classes; however for convenience of reading it is included here to be refactored at a later date
$runner->run(TEST_VARIABLE);
