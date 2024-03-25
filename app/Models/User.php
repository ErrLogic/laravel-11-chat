<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\ChatRoom;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $keyType = 'string';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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

    public function canJoinRoom($roomId)
    {
        $granted = false;
        $chatRoom = ChatRoom::findOrFail($roomId);
        $users = explode(':', $chatRoom->participant);

        foreach ($users as $id) {
            if ($this->id == $id) {
                $granted = true;
            } 
        }

        return $granted;
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::orderedUuid();
        });
    }
}
