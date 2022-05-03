<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = ['name', 'age', 'sex', 'email','course'];
}
