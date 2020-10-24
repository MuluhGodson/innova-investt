<?php

namespace Malico\MeSomb\Helper;

use Malico\MeSomb\Builder\DepositBuilder;

trait HasDeposits
{
    /**
     * Model Deposits
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function deposits()
    {
        return $this->morphMany('Malico\MeSomb\Model\Deposit', 'depositable');
    }

    /**
     * Make Deposit
     *
     * @param string|int $receiver
     * @param int|float $amount
     *
     * @return Malico\MeSomb\Builder\DepositBuilder
     */
    public function deposit($receiver = null, $amount = null)
    {
        return new DepositBuilder($this, $receiver, $amount);
    }
}
