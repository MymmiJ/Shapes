<?php

namespace MymmiJ\Shapes;

/*
* It should be possible to extend later for highly irregular polygonal prisms & mixed polygonal/curved shapes
* Since a pyramid = 1/3*height*base and a cylinder = height * base, we can use this for both classes
*/
trait Prismatic
{
    //the apothem is the distance from the centre of a side of a regular polygon to the centre of the polygon - analogous to the radius of a circle
    public function calculate_apothem($sides,$length) { 
        $result = $length;

        if($sides === 0) {
            return $result;
        } else {
            $quotient = 180/$sides;


            $two_tan = 2*tan(deg2rad($quotient));

            $result = $length/$two_tan;

            return $result;
        }
    }
    public function calculate_perimeter($sides,$length) {
        $result = null;
        //A cylinder is effectively a prism with no sides
        if($sides === 0) {
            $result = 2 * M_PI * $length;

            return $result;
        } else {
            $result = $sides * $length;
            return $result;
        }
    }

    public function calculate_face_area($sides,$length) {
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

trait Pyramidic
{
    use Prismatic;

    public function calculate_volume($sides,$length,$height) {
        $result = null;

        $area = $this->calculate_face_area($sides,$length);

        //echo "<p>Area : " . $area . "</p>";

        $result = ($area * $height) / 3;

        //echo "<p>Volume : " . $result . "</p>";

        return $result;
    }
}

?>