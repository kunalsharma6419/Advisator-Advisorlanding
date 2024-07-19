@extends('admin.layouts.app')

@section('admincontent')
    <div class="container-scroller">
        @include('admin.components.sidebar')

        <div class="container-fluid page-body-wrapper">
            @include('admin.components.navbar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h1 align="center">Nomination Details</h1>
                                {{-- <h4 class="card-title">Horizontal Two column</h4> --}}
                                <div class="border border-primary rounded p-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="card-title mb-0">Details of Nomination</h4>
                                        </div>
                                        @if (session('warning'))
                                            <div class="alert alert-warning">
                                                <strong>Warning:</strong> {{ session('warning') }}<br>
                                                Nomination Full Name: {{ session('nomination_full_name') }}<br>
                                                Nomination Status: {{ session('nomination_status') }}
                                            </div>
                                        @endif

                                        <div class="col-md-6 text-md-right">
                                            <div class="btn-group mt-2 mt-md-0">
                                                <a href="{{ route('advisatoradmin.nominations.list') }}"
                                                    class="btn btn-primary">Back to Nominations</a>
                                                {{-- <a href="{{ route('advisatoradmin.nominations.evaluate', $nomination->id) }}"
                                                    class="btn btn-success ml-2">Proceed To Evaluation</a> --}}
                                                @if ($nomination->nomination_status === 'inprogress')
                                                    <a href="{{ route('advisatoradmin.nominations.evaluate', $nomination->id) }}"
                                                        class="btn btn-success ml-2">Proceed To Evaluation</a>
                                                @elseif ($nomination->nomination_status === 'selected')
                                                    {{-- Show overall score --}}
                                                    @php
                                                        $evaluation = App\Models\AdvisorEvaluation::where(
                                                            'advisor_nomination_id',
                                                            $nomination->nominee_id,
                                                        )->first();
                                                        $overallScore = $evaluation ? $evaluation->overall_score : null;
                                                    @endphp
                                                    {{-- Show re-evaluate button --}}
                                                    <a href="{{ route('advisatoradmin.nominations.evaluate', $nomination->id) }}"
                                                        class="btn btn-warning ml-2">Re-evaluate</a>
                                                    {{-- <p>Overall Score: {{ $overallScore }}</p> --}}
                                                    <button type="button"
                                                        class="btn btn-primary btn-rounded btn-fw">Overall Score : {{ $overallScore }}</button>
                                                @elseif ($nomination->nomination_status === 'rejected')
                                                    {{-- Show overall score --}}
                                                    @php
                                                        $evaluation = App\Models\AdvisorEvaluation::where(
                                                            'advisor_nomination_id',
                                                            $nomination->nominee_id,
                                                        )->first();
                                                        $overallScore = $evaluation ? $evaluation->overall_score : null;
                                                    @endphp
                                                    {{-- Show re-evaluate button --}}
                                                    <a href="{{ route('advisatoradmin.nominations.evaluate', $nomination->id) }}"
                                                        class="btn btn-warning ml-2">Re-evaluate</a>
                                                    <button type="button"
                                                        class="btn btn-primary btn-rounded btn-fw">Overall Score : {{ $overallScore }}</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <p class="card-description" align="center"> <code>Details For Nomination</code>
                                </p>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th> Full Name:</th>
                                                <td> {{ $nomination->full_name }} </td>
                                            </tr>
                                            <tr>
                                                <th> Nominee ID:</th>
                                                <td> {{ $nomination->nominee_id }} </td>

                                            </tr>
                                            <tr>
                                                <th> Email: </th>
                                                <td> {{ $nomination->email }} </td>

                                            </tr>
                                            <tr>
                                                <th> Mobile Number: </th>
                                                <td> {{ $nomination->mobile_number }} </td>

                                            </tr>
                                            <tr>
                                                <th> Location:</th>
                                                <td> {{ $nomination->location }} </td>

                                            </tr>
                                            <tr>
                                                <th> LinkedIn Profile: </th>
                                                <td> <a href="{{ $nomination->linkedin_profile }}"
                                                        target="_blank">{{ $nomination->linkedin_profile }}</a> </td>

                                            </tr>
                                            <tr>
                                                <th> Nomination Status:</th>
                                                <td>
                                                    @if ($nomination->nomination_status == 'inprogress')
                                                        <span
                                                            class="text-warning">{{ $nomination->nomination_status }}</span>
                                                    @elseif ($nomination->nomination_status == 'selected')
                                                        <span
                                                            class="text-success">{{ $nomination->nomination_status }}</span>
                                                    @elseif ($nomination->nomination_status == 'rejected')
                                                        <span
                                                            class="text-danger">{{ $nomination->nomination_status }}</span>
                                                    @else
                                                        {{ $nomination->nomination_status }}
                                                    @endif
                                                </td>


                                            </tr>
                                            <tr>
                                                <th>Business Function:</th>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-primary btn-rounded btn-fw">{{ $nomination->businessFunctionCategory->name }}</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Sub Function 1:</th>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-secondary btn-rounded btn-fw">{{ optional($nomination->subFunctionCategory1)->name }}</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Sub Function 2:</th>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-success btn-rounded btn-fw">{{ optional($nomination->subFunctionCategory2)->name }}</button>
                                                </td>
                                            </tr>
                                            @php
                                                $buttonClasses = [
                                                    'btn-primary',
                                                    'btn-secondary',
                                                    'btn-success',
                                                    'btn-danger',
                                                    'btn-warning',
                                                    'btn-info',
                                                    'btn-light',
                                                    'btn-dark',
                                                ];
                                            @endphp
                                            <tr>
                                                <th>Industry Verticals:</th>
                                                <td>
                                                    @foreach ($industries as $industry)
                                                        @php
                                                            $randomClass = $buttonClasses[array_rand($buttonClasses)];
                                                        @endphp
                                                        <button type="button"
                                                            class="btn btn-rounded btn-fw {{ $randomClass }}">{{ $industry->name }}</button>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Geographical Locations:</th>
                                                <td>
                                                    @foreach ($geographies as $geography)
                                                        @php
                                                            $randomClass = $buttonClasses[array_rand($buttonClasses)];
                                                        @endphp
                                                        <button type="button"
                                                            class="btn btn-rounded btn-fw {{ $randomClass }}">{{ $geography->name }}</button>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Discovery Call:</th>
                                                <td>
                                                    <div class="card-body py-3 px-4">
                                                        <p class="m-0 survey-head">Per Minute Pricing: </p>
                                                        <div
                                                            class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                                                            <div>
                                                                <h3 class="m-0 survey-value">₹
                                                                    {{ $nomination->discovery_call_price_per_minute }} /min
                                                                </h3>
                                                                <p class="text-success m-0">Current Rate</p>
                                                            </div>
                                                            <div id="discoveryCallChart" class="flot-chart"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">

                                                        <div class="card-body py-3 px-4">
                                                            <p class="m-0 survey-head">Per Hour Pricing:</p>
                                                            <div
                                                                class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                                                                <div>
                                                                    <h3 class="m-0 survey-value">₹
                                                                        {{ $nomination->discovery_call_price_per_hour }}
                                                                        /hour</h3>
                                                                    <p class="text-danger m-0">Current Rate</p>
                                                                </div>
                                                                <div id="hourlyPricingChart" class="flot-chart"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Consultation Call:</th>
                                                <td>

                                                    <div class="card-body py-3 px-4">
                                                        <p class="m-0 survey-head">Per Minute Pricing: </p>
                                                        <div
                                                            class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                                                            <div>
                                                                <h3 class="m-0 survey-value">₹
                                                                    {{ $nomination->conference_call_price_per_minute }}
                                                                    /min
                                                                </h3>
                                                                <p class="text-success m-0">Current Rate</p>
                                                            </div>
                                                            <div id="discoveryCallChart" class="flot-chart"></div>
                                                        </div>
                                                    </div>



                                                    <div class="col-sm-6">
                                                        <div class="card-body py-3 px-4">
                                                            <p class="m-0 survey-head">Per Hour Pricing:</p>
                                                            <div
                                                                class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                                                                <div>
                                                                    <h3 class="m-0 survey-value">₹
                                                                        {{ $nomination->conference_call_price_per_hour }}
                                                                        /hour
                                                                    </h3>
                                                                    <p class="text-danger m-0">Current Rate</p>
                                                                </div>
                                                                <div id="hourlyPricingChart" class="flot-chart"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <hr>
                                {{-- @php
                                    $buttonClasses = [
                                        'btn-primary',
                                        'btn-secondary',
                                        'btn-success',
                                        'btn-danger',
                                        'btn-warning',
                                        'btn-info',
                                        'btn-light',
                                        'btn-dark',
                                    ];
                                @endphp

                                <h4>Industry Verticals</h4>
                                <div class="row">
                                    @foreach ($industries as $industry)
                                        <div class="col-md-3 mb-3">
                                            <div class="card" style="background: #f5f5f5;">
                                                <div class="card-body text-center">
                                                    @php
                                                        $randomClass = $buttonClasses[array_rand($buttonClasses)];
                                                    @endphp
                                                    <i class="fa fa-industry fa-2x mb-2" style="color: #333;"></i>
                                                    <button type="button"
                                                        class="btn btn-rounded btn-fw {{ $randomClass }}"
                                                        style="width: 100%;">{{ $industry->name }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <h4>Geography Locations</h4>
                                <div class="row">
                                    @foreach ($geographies as $geography)
                                        <div class="col-md-3 mb-3">
                                            <div class="card" style="background: #f5f5f5;">
                                                <div class="card-body text-center">
                                                    @php
                                                        $randomClass = $buttonClasses[array_rand($buttonClasses)];
                                                    @endphp
                                                    <i class="fa fa-globe fa-2x mb-2" style="color: #333;"></i>
                                                    <button type="button"
                                                        class="btn btn-rounded btn-fw {{ $randomClass }}"
                                                        style="width: 100%;">{{ $geography->name }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div> --}}

                                {{-- <hr> --}}
                                {{-- <div class="row">
                                    <h3>Discovery Call: </h3>
                                    <div class="col-sm-6">
                                        <div class="card mb-3">
                                            <div class="card-body py-3 px-4">
                                                <p class="m-0 survey-head">Per Minute Pricing: </p>
                                                <div
                                                    class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                                                    <div>
                                                        <h3 class="m-0 survey-value">₹
                                                            {{ $nomination->discovery_call_price_per_minute }} /min
                                                        </h3>
                                                        <p class="text-success m-0">Current Rate</p>
                                                    </div>
                                                    <div id="discoveryCallChart" class="flot-chart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card mb-3">
                                            <div class="card-body py-3 px-4">
                                                <p class="m-0 survey-head">Per Hour Pricing:</p>
                                                <div
                                                    class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                                                    <div>
                                                        <h3 class="m-0 survey-value">₹
                                                            {{ $nomination->discovery_call_price_per_hour }} /hour</h3>
                                                        <p class="text-danger m-0">Current Rate</p>
                                                    </div>
                                                    <div id="hourlyPricingChart" class="flot-chart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h3>Conference Call: </h3>
                                    <div class="col-sm-6">
                                        <div class="card mb-3">
                                            <div class="card-body py-3 px-4">
                                                <p class="m-0 survey-head">Per Minute Pricing: </p>
                                                <div
                                                    class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                                                    <div>
                                                        <h3 class="m-0 survey-value">₹
                                                            {{ $nomination->conference_call_price_per_minute }} /min
                                                        </h3>
                                                        <p class="text-success m-0">Current Rate</p>
                                                    </div>
                                                    <div id="discoveryCallChart" class="flot-chart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card mb-3">
                                            <div class="card-body py-3 px-4">
                                                <p class="m-0 survey-head">Per Hour Pricing:</p>
                                                <div
                                                    class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                                                    <div>
                                                        <h3 class="m-0 survey-value">₹
                                                            {{ $nomination->conference_call_price_per_hour }} /hour
                                                        </h3>
                                                        <p class="text-danger m-0">Current Rate</p>
                                                    </div>
                                                    <div id="hourlyPricingChart" class="flot-chart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h3>Chat: </h3>
                                    <div class="col-sm-6">
                                        <div class="card mb-3">
                                            <div class="card-body py-3 px-4">
                                                <p class="m-0 survey-head">Per Minute Pricing: </p>
                                                <div
                                                    class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                                                    <div>
                                                        <h3 class="m-0 survey-value">₹
                                                            {{ $nomination->chat_price_per_minute }} /min</h3>
                                                        <p class="text-success m-0">Current Rate</p>
                                                    </div>
                                                    <div id="discoveryCallChart" class="flot-chart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card mb-3">
                                            <div class="card-body py-3 px-4">
                                                <p class="m-0 survey-head">Per Hour Pricing:</p>
                                                <div
                                                    class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                                                    <div>
                                                        <h3 class="m-0 survey-value">₹
                                                            {{ $nomination->chat_price_per_hour }} /hour</h3>
                                                        <p class="text-danger m-0">Current Rate</p>
                                                    </div>
                                                    <div id="hourlyPricingChart" class="flot-chart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>


                        @include('admin.components.footer')
                    </div>
                </div>
            </div>
        @endsection
