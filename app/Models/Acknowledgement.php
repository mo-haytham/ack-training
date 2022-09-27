<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acknowledgement extends Model
{
    use HasFactory;

    protected $table = 'acknowledgements';
    protected $primaryKey = 'id';

    public $fillable = [
        'id',
        'title',
        'description',
        'created_at',
        'updated_at'
    ];

    public function getCreateDateAttribute()
    {
        return  date('Y-m-d', strtotime($this->created_at));
    }

    public function attachments()
    {
        return $this->hasMany(AcknowledgementAttachment::class, 'acknowledgement_id', 'id');
    }
}
