@extends('layouts.app')

@section('title')
Generated Demand Forecasting
@endsection

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Demand Forecasting Report</h4>
                    </div>
                    <div class="card-body">
                    {!! $chart->container() !!}
                    </div>
                   
                </div>
            </div>
         
        </div>
    </div>
</div>
@endsection

@push('script')
{!! $chart->script() !!}
@endpush