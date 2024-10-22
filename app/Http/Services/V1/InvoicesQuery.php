<?php

namespace App\Http\Services\V1;


use App\Http\Services\BaseQueryFilter;

class InvoicesQuery extends BaseQueryFilter
{

  protected $safeParams = [
      'customerId' => ['equal', 'greater_than', 'less_than'],
      'amount' => ['equal', 'greater_than', 'less_than', 'greater_than', 'less_than'],
      'status' => ['not_equal', 'equal'],
      'billedDate' => ['equal', 'greater_than', 'less_than'],
      'paidedDate' => ['equal', 'greater_than', 'less_than']
  ];

  protected $columnMap = [
    'customerId' => 'customer_id',
    'billedDate' => 'billed_date',
    'paidedDate' => 'paided_date'
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

