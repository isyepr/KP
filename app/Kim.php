<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kim extends Model
{
    //
    protected $table = "kims";
     protected $fillable = ['PLANT','NOPOL','PERUSAHAAN','KIM','KETERANGAN'];	

}
