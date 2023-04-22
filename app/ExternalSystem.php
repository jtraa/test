<?php

namespace App;

class ExternalSystem {

    public function getPrice($partId) {

        $prices = array(
            '1' => 10.5,
            '2' => 20.0,
            '3' => 5.5,
        );

        return isset($prices[$partId]) ? $prices[$partId] : 0;
    }

}
