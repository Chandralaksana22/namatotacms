<?php namespace TisielCorp\NamatotaVillage\Models;

use Model;

/**
 * Model
 */
class Blog extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'tisielcorp_namatotavillage_blog';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

    public $attachMany = [
        'images' => ['System\Models\File']
    ];

    // Allow mass-assignment
    public $fillable = ['view', 'like'];
}
