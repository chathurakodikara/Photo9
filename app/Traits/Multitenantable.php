<?php
namespace App\Traits;
use Illuminate\Database\Eloquent\Builder;

trait Multitenantable {

    public static function bootMultitenantable() {

        if (auth()->check()) {

            static::addGlobalScope('user_id', function (Builder $builder) {
                    return $builder->where('user_id', auth()->id());
            });
        }

    }

}