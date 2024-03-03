<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $label label
@property \Illuminate\Database\Eloquent\Collection $vote hasMany
   
 */
class Mood extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'mood';

    /**
    * Mass assignable columns
    */
    protected $fillable=['label',
'label'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * votes
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function votes()
    {
        return $this->hasMany(Vote::class,'mood_id');
    }



}