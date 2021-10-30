<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WaliKelas
 *
 * @property int $id
 * @property int $user_id
 * @property int $kelas_id
 * @property string|null $nip
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kelas $kelas
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|WaliKelas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WaliKelas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WaliKelas query()
 * @method static \Illuminate\Database\Eloquent\Builder|WaliKelas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WaliKelas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WaliKelas whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WaliKelas whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WaliKelas whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WaliKelas whereUserId($value)
 * @mixin \Eloquent
 */
class WaliKelas extends Model
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
