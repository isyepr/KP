<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Spi extends Model
{
	
protected $table = "spi";
 
    protected $fillable = ['PLAN','ACTUAL','LO', 'TRANSPORTIR','PERUSAHAAN','SPA','NOPOL','QUANTITY','KETERANGAN'];
}