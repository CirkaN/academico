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

    <div class="col-sm-6">
        @include('partials.default_periods_info')
    </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">                          
                    <strong>@lang('Jobs Queue')</strong>
                </div>

                <div class="card-body">
                    <ul>
                        <li>Number of jobs in queue (should be 0) : {{ $queue }}</li>
                        <li>Number of failed jobs : {{ $failed }}</li>
                    </ul>
                </div>
            </div>
        </div>

</div>
<div class="row" id="app">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>@lang('Uptime Monitor')</strong>
            </div>

            <div class="card-body">
            <table class="table">
                <tr>
                    <th>URL</th>
                    <th>Status</th>
                    <th>since</th>
                    <th>last check</th>
                </tr>
                @foreach ($uptime as $server)
                <tr>
                    <td>{{ $server->url}}</td>
                    <td>
                        <span class="badge {{$server->uptime_status == 'up' ? 'badge-success' : 'badge-danger'}}">{{ $server->uptime_status }}</span>
                        {{ $server->uptime_check_failure_reason }}
                    </td>
                    <td>{{ \Carbon\Carbon::parse($server->uptime_status_last_change_date)->diffForHumans() }}</td>
                    <td>{{ \Carbon\Carbon::parse($server->uptime_last_check_date)->diffForHumans() }}</td>
                </tr>
                @endforeach
            </table>
            </div>
        </div>
    </div>

    </div>
@endsection

@section('after_scripts')
    <script src="/js/app.js"></script>
@endsection
