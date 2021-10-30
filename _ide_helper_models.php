<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MataPelajaran[] $mata_pelajaran
 * @property-read int|null $mata_pelajaran_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\WaliKelas[] $wali_kelas
 * @property-read int|null $wali_kelas_count
 */
	class Kelas extends \Eloquent {}
}

namespace App\Models{
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
 */
	class MataPelajaran extends \Eloquent {}
}

namespace App\Models{
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
	class Siswa extends \Eloquent {}
}

namespace App\Models{
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
	class TahunAjaran extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $nama
 * @property string $username
 * @property string $password
 * @property string $level
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Siswa[] $siswa
 * @property-read int|null $siswa_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\WaliKelas[] $wali_kelas
 * @property-read int|null $wali_kelas_count
 */
	class User extends \Eloquent {}
}

namespace App\Models{
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
	class WaliKelas extends \Eloquent {}
}

