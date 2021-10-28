<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Siswa
 *
 * @property int $id
 * @property int $user_id
 * @property int $kelas_id
 * @property string|null $nis
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TahunAjaran $tahun_ajaran
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereNis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Kelas $kelas
 */
class Siswa extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
