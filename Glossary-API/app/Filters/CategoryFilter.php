<?php 
namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class CategoryFilter extends ApiFilter{

    protected $safeParams = [
        'category' => ['eq', 'lte', 'lt'],
    ];
    protected $columnMap = [];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='
    ];

}