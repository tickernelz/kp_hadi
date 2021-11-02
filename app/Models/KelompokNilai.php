<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\KelompokNilai
 *
 * @property int $id
 * @property int $mata_pelajaran_id
 * @property int $kelas_id
 * @property string $nama_kelompok
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kelas $kelas
 * @property-read \App\Models\MataPelajaran $mata_pelajaran
 * @method static \Illuminate\Database\Eloquent\Builder|KelompokNilai newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KelompokNilai newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KelompokNilai query()
 * @method static \Illuminate\Database\Eloquent\Builder|KelompokNilai whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KelompokNilai whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KelompokNilai whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KelompokNilai whereMataPelajaranId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KelompokNilai whereNamaKelompok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KelompokNilai whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Nilai[] $nilai
 * @property-read int|null $nilai_count
 */
class KelompokNilai extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
