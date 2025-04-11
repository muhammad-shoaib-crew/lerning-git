<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
Use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model {
    use HasFactory;
   protected $table = 'job_listing';

   protected $fillable = ['employer_id', 'title', 'salary'];
   
   //protected $guarded = []; // this empty will tell no field i want to be guarded, every field is fillable, actually this is to disable $fillable mass assign

   public function employer(){
    return $this->belongsTo(Employer::class);
   }
   public function tags(){
    return $this->belongsToMany(Tag::class, foreignPivotKey:'job_listing_id' );
   }
}