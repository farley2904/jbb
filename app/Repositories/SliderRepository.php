<?php

namespace Jbb\Repositories;

use Jbb\Slider;

class SliderRepository extends Repository
{
    public function __construct(Slider $slider)
    {
        $this->model = $slider;
    }
}
