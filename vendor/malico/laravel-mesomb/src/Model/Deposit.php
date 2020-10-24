<?php

namespace Malico\MeSomb\Model;

use Illuminate\Database\Eloquent\Model;
use Malico\MeSomb\Helper\HasTransactions;
use Malico\MeSomb\Helper\ModelUUID;

class Deposit extends Model
{
    use ModelUUID, HasTransactions;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';
    
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    
    /**
     * Guarded Properties
     *
     * @var array
     */
    protected $guarded = ['id'];
    
    
    /**
     * Transaction Model Table
     *
     * @var string
     */
    protected $table = 'mesomb_deposits';

    /**
     * Deposits Morph
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function depositable()
    {
        return $this->morphTo();
    }
}
