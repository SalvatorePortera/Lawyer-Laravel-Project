<tr id="row_{{ $row }}">
    <td>
        <input type="hidden" id="service_ids_{{ $row }}" data-id="{{$row}}"  class="service_ids" value="{{ $service->id }}" name="item_row[{{ $row }}][service]" readonly/>
        <p>{{ $service->name }}</p>
    </td>
    <td>
        <div class="primary_input">
            <input name="item_row[{{ $row }}][description]" value="{{ $service->description }}"  class="form-control" id="description{{ $row }}" type="text">
        </div>
    </td>

    <td>
        <div class="primary_input">
            <input type="text" min="1" name="item_row[{{ $row }}][qty]" class="form-control qty input_number" value="1" id="qty_{{ $row }}" maxlength="8" required>
        </div>
    </td>

    <td>
        <div class="primary_input">
            <input name="item_row[{{ $row }}][amount]" value="{{ $service->charge }}" step="0.1" class="form-control amount input_number" id="amount_{{ $row }}" type="text" maxlength="8" required>
        </div>
    </td>

    <td>
        <div class="primary_input">
            <input name="item_row[{{ $row }}][line_total]" value="{{ $service->charge }}" class="form-control line_total input_number" id="line_total_{{ $row }}" type="text" readonly maxlength="8" required>
        </div>
    </td>

    <td>
        <button type="button" name="remove" class="primary-btn primary-circle delete_row fix-gr-bg"> <i class="ti-trash"></i></button>
    </td>
</tr>
