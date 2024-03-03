<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
    @property int $tag_id tag assoc id
    @property int $mood_id mood id
    @property bigint $user_id user id
    @property timestamp $created_at created at
    @property timestamp $updated_at updated at
    @property User $user belongsTo
    @property Mood $mood belongsTo
    @property Tag $tag belongsTo
 */
class Vote extends Model
{

    /**
     * Database table name
     */
    protected $table = 'vote';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'tag_id',
        'mood_id',
        'user_id'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * mood
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mood()
    {
        return $this->belongsTo(Mood::class, 'mood_id');
    }

    /**
     * tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }

}