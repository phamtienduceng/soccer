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
        'nationality',
        'team_id',
        'position',
        'birthday',
    ];

    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at'];
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}