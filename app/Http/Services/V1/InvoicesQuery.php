<?php

namespace App\Http\Services\V1;


use App\Http\Services\BaseQueryFilter;

class InvoicesQuery extends BaseQueryFilter
{

  protected $safeParams = [
      'customerId' => ['eq', 'gt', 'lt'],
      'amount' => ['eq', 'gt', 'lt', 'gte', 'lte'],
      'status' => ['ne', 'eq'],
      'billedDate' => ['eq', 'gt', 'lt'],
      'paidDate' => ['eq', 'gt', 'lt']
  ];

  protected $columnMap = [
    'customerId' => 'customer_id',
    'billedDate' => 'billed_date',
    'paidDate' => 'paid_date'
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



