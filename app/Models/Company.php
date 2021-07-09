<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model {
    use HasFactory;

    protected $table = "companies";
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'rif',
        'email',
        'phone',
        'address',
    ];

    public function user () {
        return $this->hasOne(User::class);
    }
}
