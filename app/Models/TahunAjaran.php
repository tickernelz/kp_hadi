<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TahunAjaran
 *
 * @property int $id
 * @property string $tahun
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TahunAjaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TahunAjaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TahunAjaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|TahunAjaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TahunAjaran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TahunAjaran whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TahunAjaran whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TahunAjaran extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
}
