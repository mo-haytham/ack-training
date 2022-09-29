<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcknowledgementAttachment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'acknowledgement_attachments';
    protected $primaryKey = 'id';

    public $fillable = [
        'id',
        'acknowledgement_id',
        'file_name',
        'created_at',
        'updated_at'
    ];

    public function acknowledgement()
    {
        return $this->belongsTo(Acknowledgement::class, 'acknowledgement_id', 'id');
    }
}
