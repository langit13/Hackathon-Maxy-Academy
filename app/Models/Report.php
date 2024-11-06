<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'classification', 'title', 'category', 'content', 
        'event_date', 'location', 'institution', 'attachment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}