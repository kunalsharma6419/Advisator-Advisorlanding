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
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Nominations</h4>
                                <p class="card-description"> Advisor Nominations<code>.table-striped</code>
                                </p>
                                <div class="row">
                                    <form style="margin-top: 10px; margin-botton: 10px;" action="{{ url()->current() }}"
                                        method="GET" class="col-sm-6">
                                        <label for="entries">Show</label>
                                        <select name="entries" id="entries" onchange="this.form.submit()">
                                            <option value="10" {{ request('entries', 10) == 10 ? 'selected' : '' }}>10
                                            </option>
                                            <option value="25" {{ request('entries') == 25 ? 'selected' : '' }}>25
                                            </option>
                                            <option value="50" {{ request('entries') == 50 ? 'selected' : '' }}>50
                                            </option>
                                            <option value="100" {{ request('entries') == 100 ? 'selected' : '' }}>100
                                            </option>
                                        </select>
                                        <span>entries</span>
                                    </form>
                                    <!-- Add the search input field within the form -->
                                    <form style="margin-top: 10px; float:right;" action="{{ url()->current() }}"
                                        method="GET" class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="search"
                                                    placeholder="Search Nominations" value="{{ $search }}">
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-primary" type="submit"><i
                                                        class="menu-icon tf-icons bx bx-search-alt"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th> Nomation Id </th>
                                                <th> User Id </th>
                                                <th> Full Name </th>
                                                <th> Email </th>
                                                <th> Phone Number </th>
                                                <th> Location </th>
                                                <th> Submittion Date </th>
                                                <th> Status </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($nominations as $nomination)
                                                <tr>
                                                    <td>{{ $nomination->nominee_id }}</td>
                                                    <td>{{ $nomination->user_id }}</td>
                                                    <td>{{ $nomination->full_name }}</td>
                                                    <td>{{ $nomination->email }}</td>
                                                    <td>{{ $nomination->mobile_number }}</td>
                                                    <td>{{ $nomination->location }}</td>
                                                    <td>{{ $nomination->created_at->format('Y-m-d') }}</td>
                                                    <td>{{ ucfirst($nomination->nomination_status) }}</td>
                                                    <td>
                                                        {{-- <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                   href="{{ route('superadmin.advisorNominations.edit', $nomination->id) }}"><i
                                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                <a class="dropdown-item"
                                                                   onclick="return confirm('Are you sure to delete this?')"
                                                                   href="{{ route('superadmin.advisorNominations.destroy', $nomination->id) }}"><i
                                                                        class="bx bx-trash me-1"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="section-header col-sm-6">
                                    <p class="mb-0">Showing {{ $nominations->firstItem() }} to
                                        {{ $nominations->lastItem() }} of
                                        {{ $nominations->total() }} entries</p>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card-footer text-right">
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
