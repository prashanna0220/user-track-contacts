<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table ='contact';
	protected $fillable = ['name', 'email', 'phone', 'address', 'company', 'dob'];
}
