<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Kelas
 *
 * @property int $id
 * @property string $nama_kelas
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereNamaKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Siswa[] $siswa
 * @property-read int|null $siswa_count
 */
class Kelas extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
