<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;

class Teams extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $primaryKey = 'team_id';

    protected $fillable = [
        'team_name',
        'isPremierLeague',
        'isFA',
        'isCommunityShield',
        'logo'
    ];

    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at'];

    public function players()
    {
        return $this->hasMany(Player::class, 'team_id');
    }
}
