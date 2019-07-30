<?php

namespace App\Model\Entity;

/**
 * @property int note_id
 * @property float hours
 * @property string spent_at
 * @property string description
 */
class Spent extends EntityAbstract
{

    /**
     * {@inheritdoc}
     */
    protected $table = 'spent';

    /**
     * {@inheritdoc}
     */
    protected $primaryKey = 'note_id';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'note_id',
        'hours',
        'spent_at',
        'description',
    ];

    public function note()
    {
        return $this->belongsTo(Note::class, 'note_id', 'id');
    }

    public function getHumanHoursAttribute()
    {
        return $this->hours ?  sprintf('%02d:%02d', (int) $this->hours, fmod($this->hours, 1) * 60) : '';
    }


}
