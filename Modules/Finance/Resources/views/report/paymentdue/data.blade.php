<!-- table-responsive -->
<table class="table table-striped table-hover dt">
    <thead>
    <tr>
        <th scope="col">{{ __('common.Date') }}</th>
        <th scope="col">{{ __('finance.Client') }}</th>
        <th scope="col">{{ __('Case No') }}</th>
        <th scope="col" >{{ __('finance.Invoice No') }}</th>
        <th scope="col" >{{ __('Invoice Amount') }}</th>
        <th scope="col" >{{ __('Balance Due Amount') }}</th>
    </tr>
    </thead>
    <tbody>
      @foreach($data as $invoice)

    <tr>
       <td>
           {{ formatDate($invoice['invoice_date']) }}
       </td>

        <td>
            @if($invoice->clientable)
              {{$invoice->clientable->name}}
            @endif
        </td>
        <td>
            @if($invoice->case)
              {{$invoice->case->id}}
            @endif
        </td>
        <td>
            {{$invoice->invoice_no}}
        </td>
        <td>
            {{amountFormat($invoice->grand_total)}}
        </td>
        <td>
            {{amountFormat($invoice->due)}}
        </td>
    </tr>
      @endforeach

    </tbody>
</table>
