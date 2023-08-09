<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $primaryKey = 'team_id';

    protected $fillable = [
        'team_name',
        'tournament_id',
        'win',
        'draw',
        'lose',
        'points',
        'country',
        'logo'
    ];

    protected $casts = [
        'team_id' => 'integer',
        'win' => 'integer',
        'draw' => 'integer',
        'lose' => 'integer',
        'points' => 'integer'
    ];
}
