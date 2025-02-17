<?php namespace October\Rain\Database\Connections;

use October\Rain\Database\QueryBuilder;

/**
 * ExtendsConnection replaces the query builder in the connection,
 * and modifies logging events. This trait must extend a connection
 * class that extends the `Illuminate\Database\Connection` class.
 */
trait ExtendsConnection
{
    /**
     * query builder instance
     * @return \October\Rain\Database\QueryBuilder
     */
    public function query()
    {
        return new QueryBuilder(
            $this,
            $this->getQueryGrammar(),
            $this->getPostProcessor()
        );
    }

    /**
     * logQuery in the connection's query log
     * @param  string  $query
     * @param  array   $bindings
     * @param  float|null  $time
     * @return void
     */
    public function logQuery($query, $bindings, $time = null)
    {
        if (isset($this->events)) {
            $this->events->dispatch('illuminate.query', [$query, $bindings, $time, $this->getName()]);
        }

        parent::logQuery($query, $bindings, $time);
    }

    /**
     * fireConnectionEvent for this connection
     * @param  string  $event
     * @return void
     */
    protected function fireConnectionEvent($event)
    {
        if (isset($this->events)) {
            $this->events->dispatch('connection.'.$this->getName().'.'.$event, $this);
        }

        parent::fireConnectionEvent($event);
    }
}