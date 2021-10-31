<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Nilai
 *
 * @property int $id
 * @property int $siswa_id
 * @property int $kelompok_nilai_id
 * @property float|null $nilai
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\KelompokNilai $kelompok_nilai
 * @property-read \App\Models\Siswa $siswa
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai query()
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereKelompokNilaiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereNilai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $tahun_ajaran_id
 * @property-read \App\Models\TahunAjaran $tahun_ajaran
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereTahunAjaranId($value)
 * @property string $semester
 * @method static \Illuminate\Database\Eloquent\Builder|Nilai whereSemester($value)
 */
class Nilai extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function kelompok_nilai()
    {
        return $this->belongsTo(KelompokNilai::class);
    }

    public function tahun_ajaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }
}
