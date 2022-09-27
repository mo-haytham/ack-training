<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcknowledgementAttachment extends Model
{
    use HasFactory;

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
