<div>
    @if(isset($edit_pay))
    <div class="mb-3">
        <h4 class="card-title mb-2">Tentant</h4>
        Name : {{$edit_pay->tenant->fullname}} <br>
    </div>
    @endif
    <div class="mb-3">
        <h4 class="card-title">Select Tentant</h4><br>
        <select wire:model="selectedTenant" name="tenant_id" class="form-control">
            <option value="">----- Select a tenant's name -----</option>
            @foreach ($tenants as $data_tenant)
                <option value="{{$data_tenant->id}}">{{$data_tenant->fullname}}</option>
            @endforeach
        </select>
        
    </div>
    <div wire:loading>
        <h4>Loading...</h4>
    </div>
    @if($selectedTenant <> null)
    <div class="input-group">
        <div class="row">
            <large><b>Details</b></large>
            <hr>
            <p>Tenant : <b>{{ $tenants_details->fullname ?? 'N/A'}}</b></p>
            <p>Rental Rate : <b>{{ $tenants_details->phase->priceformat ?? 'N/A'}}</b></p>
            <p>Total Paid : <b>{{ $tenants_details->payment->sum('amount') ?? 'N/A'}}</b></p>
            <hr>
        </div>
    </div>
    @endif
</div>