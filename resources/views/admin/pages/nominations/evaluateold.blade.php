@extends('admin.layouts.app')

@section('admincontent')
    <div class="container-scroller">
        @include('admin.components.sidebar')

        <div class="container-fluid page-body-wrapper">
            @include('admin.components.navbar')

            <div class="main-panel">
                <div class="container">
                    <h1>Evaluation of Advisors</h1>
                    <form action="{{ route('advisatoradmin.nominations.evaluate.submit', $nomination->id) }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $nomination->full_name }}</h4>
                                <p><strong>Nominee ID:</strong> {{ $nomination->nominee_id }}</p>
                                <p><strong>Email:</strong> {{ $nomination->email }}</p>
                                <p><strong>Mobile Number:</strong> {{ $nomination->mobile_number }}</p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Experience (15%)</label>
                                            <div class="col-sm-6">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <label>
                                                        <input type="radio" name="experience_score"
                                                            value="{{ $i }}" {{ $i == 5 ? 'checked' : '' }}>
                                                        {{ $i }}
                                                    </label>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Expertise (20%)</label>
                                            <div class="col-sm-6">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <label>
                                                        <input type="radio" name="expertise_score"
                                                            value="{{ $i }}" {{ $i == 4 ? 'checked' : '' }}>
                                                        {{ $i }}
                                                    </label>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">LinkedIn Profile (10%)</label>
                                            <div class="col-sm-6">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <label>
                                                        <input type="radio" name="linkedin_score"
                                                            value="{{ $i }}" {{ $i == 4 ? 'checked' : '' }}>
                                                        {{ $i }}
                                                    </label>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Availability (15%)</label>
                                            <div class="col-sm-6">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <label>
                                                        <input type="radio" name="availability_score"
                                                            value="{{ $i }}" {{ $i == 5 ? 'checked' : '' }}>
                                                        {{ $i }}
                                                    </label>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Industry Recognition (15%)</label>
                                            <div class="col-sm-6">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <label>
                                                        <input type="radio" name="industry_recognition_score"
                                                            value="{{ $i }}" {{ $i == 5 ? 'checked' : '' }}>
                                                        {{ $i }}
                                                    </label>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Recommendations (15%)</label>
                                            <div class="col-sm-6">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <label>
                                                        <input type="radio" name="recommendations_score"
                                                            value="{{ $i }}" {{ $i == 5 ? 'checked' : '' }}>
                                                        {{ $i }}
                                                    </label>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label">Published Content and Thought Leadership
                                        (5%)</label>
                                    <div class="col-sm-6">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <label>
                                                <input type="radio" name="content_leadership_score"
                                                    value="{{ $i }}" {{ $i == 4 ? 'checked' : '' }}>
                                                {{ $i }}
                                            </label>
                                        @endfor
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label">Connections and Network (5%)</label>
                                    <div class="col-sm-6">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <label>
                                                <input type="radio" name="connections_score" value="{{ $i }}"
                                                    {{ $i == 5 ? 'checked' : '' }}> {{ $i }}
                                            </label>
                                        @endfor
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <a href="{{ route('advisatoradmin.nominations.list') }}" class="btn btn-light">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>

                @include('admin.components.footer')
            </div>
        </div>
    </div>
@endsection
