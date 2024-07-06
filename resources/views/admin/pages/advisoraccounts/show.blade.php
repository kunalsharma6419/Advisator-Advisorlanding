@extends('admin.layouts.app')

@section('admincontent')
    <div class="container-scroller">
        @include('admin.components.sidebar')

        <div class="container-fluid page-body-wrapper">
            @include('admin.components.navbar')

            <div class="main-panel">
                <div class="container">
                    <h1>Advisor Details</h1>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $advisor->full_name }}</h4>
                            <p><strong>Nominee ID:</strong> {{ $advisor->nominee_id }}</p>
                            <p><strong>Email:</strong> {{ $advisor->email }}</p>
                            <p><strong>Mobile Number:</strong> {{ $advisor->mobile_number }}</p>
                            <p><strong>Location:</strong> {{ $advisor->location }}</p>
                            <p><strong>LinkedIn Profile:</strong> <a href="{{ $advisor->linkedin_profile }}"
                                    target="_blank">{{ $advisor->linkedin_profile }}</a></p>
                            <p><strong>Discovery Call Price per Minute:</strong>
                                Rs. {{ $advisor->discovery_call_price_per_minute }}</p>
                            <p><strong>Discovery Call Price per Hour:</strong>
                                Rs. {{ $advisor->discovery_call_price_per_hour }}</p>
                            <p><strong>Conference Call Price per Minute:</strong>
                                Rs. {{ $advisor->conference_call_price_per_minute }}</p>
                            <p><strong>Conference Call Price per Hour:</strong>
                                Rs. {{ $advisor->conference_call_price_per_hour }}</p>
                            <p><strong>Chat Price per Minute:</strong> Rs. {{ $advisor->chat_price_per_minute }}</p>
                            <p><strong>Chat Price per Hour:</strong> Rs. {{ $advisor->chat_price_per_hour }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($advisor->nomination_status) }}</p>

                            <p><strong>Business Function:</strong> {{ $advisor->businessFunctionCategory->name }}</p>
                            <p><strong>Sub Function 1:</strong> {{ optional($advisor->subFunctionCategory1)->name }}</p>
                            <p><strong>Sub Function 2:</strong> {{ optional($advisor->subFunctionCategory2)->name }}</p>

                            <h4>Industry Verticals</h4>
                            <div class="row">
                                @foreach ($industries as $industry)
                                    <div class="col-md-3 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="card-text">{{ $industry->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <h4>Geography Locations</h4>
                            <div class="row">
                                @foreach ($geographies as $geography)
                                    <div class="col-md-3 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="card-text">{{ $geography->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <a href="{{ route('advisatoradmin.advisoraccounts.list') }}" class="btn btn-primary mt-3">Back to
                                Advisor Accounts</a>
                        </div>
                    </div>
                </div>


                @include('admin.components.footer')
            </div>
        </div>
    </div>
@endsection
