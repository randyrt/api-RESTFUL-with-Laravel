<?php

namespace App\Http\Services\V1;

use App\Http\Services\BaseQueryFilter;

class customerQuery extends BaseQueryFilter
{
  protected $safeParams = [
      'id' => ['eq', 'gt', 'lt', 'gte', 'lte'],
      'name' => ['eq'],
      'type' => ['eq'],
      'address' => ['eq', 'lt'],
      'city' => ['eq'],
      'postalCode' => ['eq', 'gt', 'lt']
    ];

    protected $columnMap = [
      'postalCode' => 'postal_code',
    ];

    protected $operatorMap = [
      'eq' => '=',
      'gt' => '>',
      'lt' => '<',
      'gte' => '>=',
      'lte' => '<=',
      'ne' => '!='
    ];
}



