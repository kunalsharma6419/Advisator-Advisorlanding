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
                                <h1 align="center">Evaluation of Advisors</h1>
                                {{-- <h4 class="card-title">Horizontal Two column</h4> --}}
                                <h4 class="card-title" style="margin-top: 30px;">Nomination Details</h4>
                                <p class="card-description"> Details For Nomination<code>.table-bordered</code>
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

                                        </tbody>
                                    </table>
                                </div>

                                <form class="form-sample"
                                    action="{{ route('advisatoradmin.nominations.evaluate.submit', $nomination->id) }}"
                                    method="POST">
                                    @csrf
                                    <p class="card-description" align="center" style="margin-top: 30px;"> Evaluate the
                                        Advsior on Below Factors:- </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Experience (15%)</label>
                                                <div class="col-sm-5 d-flex align-items-center">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" name="experience_score"
                                                                    class="form-check-input" value="{{ $i }}"
                                                                    {{ $i == 5 ? 'checked' : '' }}>
                                                                {{ $i }}
                                                            </label>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Availability (15%)</label>
                                                <div class="col-sm-5 d-flex align-items-center">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" name="availability_score"
                                                                    class="form-check-input" value="{{ $i }}"
                                                                    {{ $i == 5 ? 'checked' : '' }}>
                                                                {{ $i }}
                                                            </label>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Expertise (20%)</label>
                                                <div class="col-sm-5 d-flex align-items-center">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" name="expertise_score"
                                                                    class="form-check-input" value="{{ $i }}"
                                                                    {{ $i == 5 ? 'checked' : '' }}>
                                                                {{ $i }}
                                                            </label>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Industry Recognition (15%)</label>
                                                <div class="col-sm-5 d-flex align-items-center">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" name="industry_recognition_score"
                                                                    class="form-check-input" value="{{ $i }}"
                                                                    {{ $i == 5 ? 'checked' : '' }}>
                                                                {{ $i }}
                                                            </label>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">LinkedIn Profile (10%)</label>
                                                <div class="col-sm-5 d-flex align-items-center">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" name="linkedin_score"
                                                                    class="form-check-input" value="{{ $i }}"
                                                                    {{ $i == 5 ? 'checked' : '' }}>
                                                                {{ $i }}
                                                            </label>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Recommendations (15%)</label>
                                                <div class="col-sm-5 d-flex align-items-center">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" name="recommendations_score"
                                                                    class="form-check-input" value="{{ $i }}"
                                                                    {{ $i == 5 ? 'checked' : '' }}>
                                                                {{ $i }}
                                                            </label>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Published Content
                                            and Thought Leadership (5%)</label>
                                                <div class="col-sm-5 d-flex align-items-center">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" name="content_leadership_score"
                                                                    class="form-check-input" value="{{ $i }}"
                                                                    {{ $i == 5 ? 'checked' : '' }}>
                                                                {{ $i }}
                                                            </label>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Connections and
                                            Network (5%)</label>
                                                <div class="col-sm-5 d-flex align-items-center">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" name="connections_score"
                                                                    class="form-check-input" value="{{ $i }}"
                                                                    {{ $i == 5 ? 'checked' : '' }}>
                                                                {{ $i }}
                                                            </label>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-6 col-form-label">Published Content
                                            and Thought Leadership (5%)</label>
                                        <div class="col-sm-6 d-flex align-items-center">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="content_leadership_score"
                                                            class="form-check-input" value="{{ $i }}"
                                                            {{ $i == 5 ? 'checked' : '' }}>
                                                        {{ $i }}
                                                    </label>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputEmail2" class="col-sm-6 col-form-label">Connections and
                                            Network (5%)</label>
                                        <div class="col-sm-6 d-flex align-items-center">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="connections_score"
                                                            class="form-check-input" value="{{ $i }}"
                                                            {{ $i == 5 ? 'checked' : '' }}>
                                                        {{ $i }}
                                                    </label>
                                                </div>
                                            @endfor
                                        </div>
                                    </div> --}}
                                    <hr>
                                    <div align="center" style="margin-top: 30px;">
                                        <button type="submit" class="btn btn-md btn-primary me-2">Submit</button>
                                        <a href="{{ route('advisatoradmin.nominations.list') }}"
                                            class="btn btn-light">Cancel</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @include('admin.components.footer')
            </div>
        </div>
    </div>
@endsection
