<?php namespace Pixie\QueryBuilder\Adapters;

class Dblib extends BaseAdapter
{
    /**
     * @var string
     */
    protected $sanitizer = '"';

    protected function getLimitOffset($statements){
        // Limit and offset
        $top = isset($statements['limit']) ? 'TOP ' . $statements['limit'] : '';

        pr($statements);
        
        return compact('top');
    }
}
