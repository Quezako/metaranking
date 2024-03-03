<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
    @property varchar $label label
    @property int $tag1_id tag1 id
    @property int $tag2_id tag2 id
    @property timestamp $created_at created at
    @property timestamp $updated_at updated at
    @property Tag2 $tag belongsTo
    @property Tag1 $tag belongsTo
    @property \Illuminate\Database\Eloquent\Collection $tag hasMany
    @property \Illuminate\Database\Eloquent\Collection $tag hasMany
    @property \Illuminate\Database\Eloquent\Collection $vote hasMany
 */
class Tag extends Model
{

    /**
    * Database table name
    */
    protected $table = 'tag';

    /**
    * Mass assignable columns
    */
    protected $fillable=[
        'label',
        'tag1_id',
        'tag2_id'
    ];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * tag1
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function tag1()
    {
        return $this->belongsTo(Tag::class,'tag1_id');
    }

    /**
    * tag2
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function tag2()
    {
        return $this->belongsTo(Tag::class,'tag2_id');
    }

    /**
    * tags
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function tags1()
    {
        return $this->hasMany(Tag::class,'tag1_id');
    }
    /**
    * tags
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function tags2()
    {
        return $this->hasMany(Tag::class,'tag2_id');
    }
    /**
    * votes
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function votes()
    {
        return $this->hasMany(Vote::class,'tag_id');
    }



}