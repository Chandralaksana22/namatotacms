<?php namespace TisielCorp\NamatotaVillage\Models;

use Model;

/**
 * Model
 */
class BookingRoom extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string table in the database used by the model.
     */
    public $table = 'tisielcorp_namatotavillage_book_room';
    public $fillable = ['nama', 'email', 'date', 'number', 'people', 'enquiry', 'item'];
    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

}
