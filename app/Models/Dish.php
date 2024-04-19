<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;

class Dish extends Model
{
    use HasFactory;

    protected $table = 'dishes';

    protected $fillable = [
        'name', 'description', 'price', 'weight', 'weight_unit_id', 'amount', 'amount_unit_id', 'group_id', 'active', 'spicy', 'sort', 'img'
    ];

    public function group() 
    {
        return $this->belongsTo(Group::class);
    }

    public function weightUnit()
    {
        return $this->belongsTo(Unit::class, 'weight_unit_id');
    }

    public function amountUnit()
    {
        return $this->belongsTo(Unit::class, 'amount_unit_id');
    }

}
