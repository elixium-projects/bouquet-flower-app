<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        "phone_number",
        "role_id",
        "address",
        "profile_img"
    ];
    protected $with = "Role";

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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

    protected function FullName(): CastsAttribute
    {
        return CastsAttribute::make(
            get: fn(mixed $value, array $attributes) => $attributes["first_name"] . " " . $attributes["last_name"],
        );
    }

    public function profileURL(): CastsAttribute
    {
        return CastsAttribute::make(
            get: function () {
                $profileName = $this->profile_img;

                if ($profileName == "profile.png") {
                    return asset('img/profile.png');
                }

                return Storage::disk("public")->url("images/profile/" . $this->profile_img);
            },
        );
    }

    public function Role()
    {
        return $this->hasOne(Role::class, "id", "role_id");
    }
}
