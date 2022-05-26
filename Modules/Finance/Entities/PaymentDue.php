<?php

namespace Modules\Finance\Entities;

use App\Models\Cases;
use Modules\Finance\Entities\Invoice;
use Illuminate\Database\Eloquent\Model;

class PaymentDue extends Model
{
    protected $table = 'payment_due';
    protected $primaryKey = 'id';
    
    public function case() {
        return $this->belongsTo(Cases::class);
    }

    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }

}
