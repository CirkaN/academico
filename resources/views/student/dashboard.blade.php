@extends('backpack::blank')

@section('header')
    <section class="container-fluid">
	  <h2>
        {{ trans('backpack::base.dashboard') }}
      </h2>
    </section>
@endsection


@section('content')
    <div class="row">

        @foreach ($enrollments as $enrollment)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">                          
                    <strong>{{ $enrollment->course->name }}</strong>
                </div>

                <div class="card-body">
                    <p>@lang('Period') : {{ $enrollment->course->period->name }}</p>
                   
                    @if(isset($enrollment->result_name))
                        <p>@lang('Result') : <a href="/result/{{ $enrollment->id }}/show">{{ $enrollment->result_name }}</a></p>
                    @endif

                    <p>@lang('Status') : {{ $enrollment->status }}</p>

                    @if($enrollment->pre_invoice->count() > 0)
                        <p>@lang('Invoice') : @foreach($enrollment->pre_invoice as $invoice) {{ $invoice->invoice_number }} @endforeach</p>
                    @endif
                </div>
            </div>
        </div>
        @endforeach

    </div>
@endsection
