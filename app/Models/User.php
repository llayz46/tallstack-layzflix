<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'slug',
        'password',
        'profile_photo_path',
        'biography',
        'xp',
        'level',
        'premium',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected array $levels = [
        1 => 0,
        2 => 50,
        3 => 120,
        4 => 200,
        5 => 300,
        6 => 450,
        7 => 600,
        8 => 800,
        9 => 1050,
        10 => 1350,
        11 => 1700,
        12 => 2100,
        13 => 2550,
        14 => 3050,
        15 => 3600,
        16 => 4200,
        17 => 5000,
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function favoriteMedias(): BelongsToMany
    {
        return $this->belongsToMany(Media::class);
    }

    public function playlists(): HasMany
    {
        return $this->hasMany(Playlist::class);
    }

    public function isPremium(): bool
    {
        return $this->premium;
    }

    public function following(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function isFollowing(User $user): bool
    {
        return $this->following->contains($user);
    }

    public function getProfilePhoto(): string
    {
        return $this->profile_photo_path ? asset('storage/' . $this->profile_photo_path) : 'https://ui-avatars.com/api/?background=ebf4ff&name='. $this->username .'&color=d5294d&font-size=0.5&semibold=true&format=svg';
    }

    public function addXp(int $amount): void
    {
        $this->xp += $amount;

        $this->levelUp();

        $this->save();
    }

    protected function levelUp(): void
        {
        foreach ($this->levels as $level => $xpRequired) {
            if ($this->xp >= $xpRequired) {
                $this->level = $level;
            }
        }
    }
}
