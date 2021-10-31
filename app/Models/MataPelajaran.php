<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MataPelajaran
 *
 * @property int $id
 * @property int $kelas_id
 * @property string $nama_mapel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kelas $kelas
 * @method static \Illuminate\Database\Eloquent\Builder|MataPelajaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MataPelajaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MataPelajaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|MataPelajaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MataPelajaran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MataPelajaran whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MataPelajaran whereNamaMapel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MataPelajaran whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\KelompokNilai[] $kelompok_nilai
 * @property-read int|null $kelompok_nilai_count
 */
class MataPelajaran extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function kelompok_nilai()
    {
        return $this->hasMany(KelompokNilai::class);
    }
}
