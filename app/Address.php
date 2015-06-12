<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

    /**
     * ORM function - Address belongs to an user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
