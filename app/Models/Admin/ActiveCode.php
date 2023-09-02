<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveCode extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'user_id', 'expired_at'];
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeGenerateCode($query, $user)
    {
        if($code = $this->getAliveCodeForUser($user))
        {
            $code = $code->code;
        }
        else
        {
            do {
                $code = mt_rand(100000, 999999);
            } while ($this->checkCodeIsUnique($code, $user));

            $user->codes()->delete();
            $user->codes()->create([
                'code'       => $code,
                'expired_at' => now()->addMinutes(10)
            ]);
        }

        return $code;
    }

    protected function checkCodeIsUnique($code, $user)
    {
        return !! $user->codes->where('code', $code)->first();
    }

    protected function getAliveCodeForUser($user)
    {
        return $user->codes->where('expired_at', '>', now())->first();
    }

}
