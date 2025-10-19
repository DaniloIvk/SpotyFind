<?php

namespace App\Models;

use Database\Factories\ParkingPlaceFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $info
 * @property int $taken_spots
 * @property int $total_spots
 * @property float $latitude
 * @property float $longitude
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static ParkingPlaceFactory factory($count = null, $state = [])
 * @method static Builder<static>|ParkingPlace newModelQuery()
 * @method static Builder<static>|ParkingPlace newQuery()
 * @method static Builder<static>|ParkingPlace query()
 * @method static Builder<static>|ParkingPlace whereCreatedAt($value)
 * @method static Builder<static>|ParkingPlace whereId($value)
 * @method static Builder<static>|ParkingPlace whereLatitude($value)
 * @method static Builder<static>|ParkingPlace whereLongitude($value)
 * @method static Builder<static>|ParkingPlace whereName($value)
 * @method static Builder<static>|ParkingPlace whereTakenSpots($value)
 * @method static Builder<static>|ParkingPlace whereTotalSpots($value)
 * @method static Builder<static>|ParkingPlace whereUpdatedAt($value)
 * @method static Builder<static>|ParkingPlace whereInfo($value)
 * @mixin Eloquent
 */
class ParkingPlace extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'info',
        'taken_spots',
        'total_spots',
        'latitude',
        'longitude',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [];

    /**
     * Get the attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];
}
