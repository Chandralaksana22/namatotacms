<?php namespace TisielCorp\NamatotaVillage\Models;

use Model;

/**
 * Model
 */
class Homestay extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string table in the database used by the model.
     */
    public $table = 'tisielcorp_namatotavillage_homestay';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];
    public $attachMany = [
        'images' => ['System\Models\File']
    ];
    public $jsonable = ['facilities'];
}
