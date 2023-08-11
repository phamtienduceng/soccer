<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teams;

class Player extends Model
{
    use HasFactory;
    protected $table = 'players';

    protected $primaryKey = 'player_id';

    protected $fillable = [
        'player_name',
        'player_photo',
        'nationality',
        'team_id',
        'position',
        'birthday',
        'biography',
        'club_number',
        'goals',
        'assists',
        'clean_sheets',
    ];


    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at'];

    
    public function team()
    {
        return $this->belongsTo(Teams::class, 'team_id');
    }
}