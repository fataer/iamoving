<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;


class Barrio extends Model
{
	use Spatial;
     public   $timestamps=false;



}
