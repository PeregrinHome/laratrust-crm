<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'content', 'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * @return mixed
     */
    public function getName(){
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getContent(){
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getUser(){
        return User::find($this->user_id);
    }

    /**
     * @return mixed
     */
    public function getUserName(){
        return User::find($this->user_id)->getName();
    }

    /**
     * @param Builder $query
     * @param array $frd
     * @return Builder
     */
    public function scopeFilter(Builder $query, array $frd): Builder
    {
        $fillable = $this->fillable;
        foreach ($frd as $key => $value)
        {
            if ($value === null)
            {
                continue;
            }
            switch ($key)
            {
                case 'search':
                    {
                        $query->search($value);
                    }
                    break;
                default:
                    {
                        if (in_array($key, $fillable))
                        {
                            $query->where($key, $value);
                        }
                    }
                    break;
            }
        }

        return $query;
    }
    public function scopeSearch(Builder $query, string $searchData): Builder
    {
        $query->where(function ($query) use ($searchData) {

            $query->orWhere('name', 'like', '%' . $searchData . '%')
                ->orWhere('content', 'like', '%' . $searchData . '%');

        });

        return $query;
    }
}
