<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAttendies extends Model
{
    use HasFactory;

    protected $table = 'event_attendees';
    
    protected $fillable = [
        'title', 'name','email','phone','description','event_type'
    ];
}