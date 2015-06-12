<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model {

	public function seller()
    {
        return $this->belongsTo('App\User', 'seller_id');
    }

    public function winner()
    {
        return $this->belongsTo('App\User', 'winner_id');
    }

}
