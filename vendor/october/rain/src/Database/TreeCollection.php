<?php namespace October\Rain\Database;

/**
 * TreeCollection is a custom collection used by NestedTree trait.
 *
 * General access methods:
 *
 *   $collection->toNested(); // Converts collection to an eager loaded one.
 *
 */
class TreeCollection extends Collection
{
    /**
     * toNested converts a flat collection of nested set models to an set where
     * children is eager loaded. removeOrphans removes nodes that exist without
     * their parents.
     * @param bool $removeOrphans
     * @return \October\Rain\Database\Collection
     */
    public function toNested($removeOrphans = true)
    {
        // Multisite
        $keyMethod = 'getKey';
        if (
            ($model = $this->first()) &&
            $model->isClassInstanceOf(\October\Contracts\Database\MultisiteInterface::class) &&
            $model->isAttributePropagatable('children') &&
            $model->isAttributePropagatable('parent')
        ) {
            $keyMethod = 'getMultisiteKey';
        }

        // Get dictionary
        $collection = [];
        foreach ($this as $item) {
            $collection[$item->{$keyMethod}()] = $item;
        }

        // Set new collection for "children" relations
        foreach ($collection as $key => $model) {
            $model->setRelation('children', new Collection);
        }

        // Assign all child nodes to their parents
        $nestedKeys = [];
        foreach ($collection as $key => $model) {
            if (!$parentKey = $model->getParentId()) {
                continue;
            }

            if (array_key_exists($parentKey, $collection)) {
                $collection[$parentKey]->children[] = $model;
                $nestedKeys[] = $model->{$keyMethod}();
            }
            elseif ($removeOrphans) {
                $nestedKeys[] = $model->{$keyMethod}();
            }
        }

        // Remove processed nodes
        foreach ($nestedKeys as $key) {
            unset($collection[$key]);
        }

        return new Collection($collection);
    }

    /**
     * listsNested gets an array with values of a given column. Values are indented according
     * to their depth.
     * @param  string $value  Array values
     * @param  string $key    Array keys
     * @param  string $indent Character to indent depth
     * @return array
     */
    public function listsNested($value, $key = null, $indent = '&nbsp;&nbsp;&nbsp;')
    {
        // Recursive helper function
        $buildCollection = function ($items, $depth = 0) use (&$buildCollection, $value, $key, $indent) {
            $result = [];

            $indentString = str_repeat($indent, $depth);

            foreach ($items as $item) {
                if ($key !== null) {
                    $result[$item->{$key}] = $indentString . $item->{$value};
                }
                else {
                    $result[] = $indentString . $item->{$value};
                }

                // Add the children
                $childItems = $item->getChildren();
                if ($childItems->count() > 0) {
                    $result = $result + $buildCollection($childItems, $depth + 1);
                }
            }

            return $result;
        };

        // Build a nested collection
        $rootItems = $this->toNested();
        return $buildCollection($rootItems);
    }
}
