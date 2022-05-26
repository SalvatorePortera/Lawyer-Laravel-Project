<?php

namespace Modules\Finance\Entities;

use App\Traits\HasCustomFields;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Cases;
class Transaction extends Model
{
    use HasCustomFields;
    protected $guarded = ['id'];

    public function morphable(){
        return $this->morphTo();
    }
    public function servicetype (){
        return $this->belongsTo(Service::class, 'servicetype_id', 'id');
    }
    public function client (){
        return $this->belongsTo(Client::class, 'clientable_id', 'id');
    }
    public function case(){
        return $this->belongsTo(Cases::class, 'case_id', 'id');
    }
    public function bank(){
        return $this->belongsTo(BankAccount::class, 'bank_account_id', 'id');
    }

    public function getPaymentMethodDisplayAttribute(){
        $method = __('list.'.$this->payment_method);
        if ($this->payment_method == 'bank'){
            return "{$method} ({$this->bank->bank_name})";
        }
        return $method;
    }



}
