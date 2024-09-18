<?php

namespace App\Http\Services\V1;

use App\Http\Services\BaseQueryFilter;

class CustomerQuery extends BaseQueryFilter
{
  protected $safeParams = [
      'id' => ['equal', 'greater_than', 'less_than', 'greater_than_equal', 'less_than_equal'],
      'name' => ['equal'],
      'type' => ['equal'],
      'address' => ['equal', 'less_than_equal'],
      'city' => ['eq'],
      'postalCode' => ['equal', 'greater_than', 'less_than']
    ];

    protected $columnMap = [
      'postalCode' => 'postal_code',
    ];

    protected $operatorMap = [
      'equal' => '=',
      'greater_than' => '>',
      'less_than' => '<',
      'greater_than_equal' => '>=',
      'less_than_equal' => '<=',
      'not_equal' => '!='
    ];
}



