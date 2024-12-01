@extends('admin.layouts.app')

@section('admincontent')
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.components.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.components.navbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    {{-- @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }} Nomination: {{ session('nomination_full_name') }} is now {{ session('nomination_status') }}.
                        </div>
                    @endif --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }} Nomination: {{ session('nomination_full_name') }} is now {{ session('nomination_status') }}.
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }} Nomination: {{ session('nomination_full_name') }} is rejected.
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">In Progress</h4>
                                    <div class="media">
                                        <div class="display-4 text-info d-flex align-self-start me-3">{{ $inProgressCount }}
                                        </div>
                                        <div class="media-body">
                                            <p class="card-text">These are the nominations that are currently being
                                                reviewed.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Selected</h4>
                                    <div class="media">
                                        <div class="display-4 text-info d-flex align-self-center me-3">{{ $selectedCount }}
                                        </div>
                                        <div class="media-body">
                                            <p class="card-text">These nominations have been selected for further
                                                consideration.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Rejected</h4>
                                    <div class="media">
                                        <div class="display-4 text-info d-flex align-self-end me-3">{{ $rejectedCount }}
                                        </div>
                                        <div class="media-body">
                                            <p class="card-text">These nominations did not meet the required criteria.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Nominations</h4>
                                <p class="card-description"> Advisor Nominations<code>.table-striped</code></p>
                                <div class="row mb-4">
                                    <div class="col-md-6 d-flex align-items-center">
                                        <form action="{{ url()->current() }}" method="GET"
                                            class="w-100 d-flex align-items-center">
                                            <label for="entries" class="mr-2 mb-0">Show</label>
                                            <select name="entries" id="entries" class="form-control mr-2 w-auto"
                                                onchange="this.form.submit()">
                                                <option value="10" {{ request('entries', 10) == 10 ? 'selected' : '' }}>
                                                    10</option>
                                                <option value="25" {{ request('entries') == 25 ? 'selected' : '' }}>25
                                                </option>
                                                <option value="50" {{ request('entries') == 50 ? 'selected' : '' }}>50
                                                </option>
                                                <option value="100" {{ request('entries') == 100 ? 'selected' : '' }}>
                                                    100</option>
                                            </select>
                                            <span>entries</span>
                                        </form>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <form action="{{ url()->current() }}" method="GET"
                                            class="w-100 d-flex justify-content-end align-items-center">
                                            <input type="text" class="form-control mr-2" name="search"
                                                placeholder="Search Nominations" value="{{ $search }}">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th> Submission Date </th>
                                                <th> Nomination Id </th>
                                                <th> User Id </th>
                                                <th> Full Name </th>
                                                <th> Email </th>
                                                <th> Phone Number </th>
                                                <th> Location </th>
                                                <th>Overall Score</th>
                                                <th> Status </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($nominations as $nomination)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($nomination->created_at)->isoFormat('Do MMMM YYYY') }}</td>
                                                    <td>{{ $nomination->nominee_id }}</td>
                                                    <td>{{ $nomination->user_id }}</td>
                                                    <td>{{ $nomination->full_name }}</td>
                                                    <td>{{ $nomination->email }}</td>
                                                    <td>{{ $nomination->mobile_number }}</td>
                                                    <td>{{ $nomination->location }}</td>
                                                    @php
                                                        $evaluation = App\Models\AdvisorEvaluation::where(
                                                            'advisor_nomination_id',
                                                            $nomination->nominee_id,
                                                        )->first();
                                                        $overallScore = $evaluation ? $evaluation->overall_score : null;
                                                    @endphp
                                                    <td>{{ $overallScore }}</td>
                                                    <td>{{ ucfirst($nomination->nomination_status) }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown">
                                                                <i class="fa fa-caret-square-o-down"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('advisatoradmin.nominations.show', $nomination->id) }}">
                                                                    <i class="fa fa-eye me-1"></i>Show Details
                                                                </a>
                                                                {{-- <a class="dropdown-item"
                                                                    href="{{ route('superadmin.advisorNominations.edit', $nomination->id) }}">
                                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                                </a>
                                                                <a class="dropdown-item"
                                                                    onclick="return confirm('Are you sure to delete this?')"
                                                                    href="{{ route('superadmin.advisorNominations.destroy', $nomination->id) }}">
                                                                    <i class="bx bx-trash me-1"></i> Delete
                                                                </a> --}}
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <p class="mb-0">Showing {{ $nominations->firstItem() }} to
                                            {{ $nominations->lastItem() }} of {{ $nominations->total() }} entries</p>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        {{ $nominations->appends(request()->input())->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- partial:partials/_footer.html -->
                @include('admin.components.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
