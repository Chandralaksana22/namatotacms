<?php namespace Tailor\Components;

use Tailor\Classes\ComponentVariable;
use Tailor\Classes\BlueprintIndexer;
use Tailor\Models\GlobalRecord;
use Cms\Classes\ComponentModuleBase;

/**
 * GlobalComponent makes globals available.
 */
class GlobalComponent extends ComponentModuleBase
{
    /**
     * @var array primaryRecordCache
     */
    protected $primaryRecordCache = false;

    /**
     * componentDetails
     */
    public function componentDetails()
    {
        return [
            'name' => 'Global_',
            'description' => 'Makes globals available to the page.',
            'icon' => 'icon-cogs'
        ];
    }

    /**
     * defineProperties
     */
    public function defineProperties()
    {
        return [
            'handle' => [
                'title' => 'Handle',
                'type' => 'dropdown',
                'showExternalParam' => false
            ]
        ];
    }

    /**
     * makePrimaryAccessor returns the PHP object variable for the Twig view layer.
     */
    public function makePrimaryAccessor()
    {
        return new ComponentVariable($this);
    }

    /**
     * getHandleOptions
     */
    public function getHandleOptions()
    {
        $blueprints = BlueprintIndexer::instance()->listGlobals();

        $result = [];
        foreach ($blueprints as $bp) {
            $result[$bp->handle] = $bp->name . ' ('.$bp->handle.')';
        }

        return $result;
    }

    /**
     * getPrimaryRecord
     */
    public function getPrimaryRecord()
    {
        if ($this->primaryRecordCache !== false) {
            return $this->primaryRecordCache;
        }

        return $this->primaryRecordCache = $this->getPrimaryRecordResult();
    }

    /**
     * getPrimaryRecordResult
     */
    public function getPrimaryRecordResult()
    {
        $query = $this->getPrimaryRecordQuery();

        return $query->first();
    }

    /**
     * getPrimaryRecordQuery
     */
    public function getPrimaryRecordQuery()
    {
        $handle = $this->property('handle');

        $model = GlobalRecord::inGlobal($handle);

        return $model;
    }
}
