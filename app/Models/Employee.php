<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Employee extends Model
{
protected $table ='employee';
public $timestamps = false;
protected $fillable =[
'username',
'password',
];
}