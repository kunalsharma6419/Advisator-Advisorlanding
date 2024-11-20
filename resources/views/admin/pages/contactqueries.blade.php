@extends('admin.layouts.app')

@section('admincontent')
    <div class="container-scroller">
        @include('admin.components.sidebar')
        <div class="container-fluid page-body-wrapper">
            @include('admin.components.navbar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Contact Queries</h4>
                                <p class="card-description"> Advisator Enquiries<code>.table-striped</code></p>
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
                                                placeholder="Search Queries" value="{{ $search }}">
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
                                                <th> Name </th>
                                                <th> Email </th>
                                                <th> Message </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contacts as $contact)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($contact->created_at)->isoFormat('Do MMMM YYYY') }}
                                                    </td>
                                                    <td>{{ $contact->name }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>{{ $contact->message }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown">
                                                                <i class="fa fa-caret-square-o-down"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="confirmDeletion('{{ $contact->id }}'); return false;">
                                                                    <i class="bx bx-trash me-1"></i> Delete
                                                                </a>
                                                                <form id="delete-form-{{ $contact->id }}"
                                                                    action="{{ route('advisatoradmin.contactqueries.destroy', $contact->id) }}"
                                                                    method="POST" style="display: none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
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
                                        <p class="mb-0">Showing {{ $contacts->firstItem() }} to
                                            {{ $contacts->lastItem() }} of {{ $contacts->total() }} entries</p>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        {{ $contacts->appends(request()->input())->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.components.footer')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDeletion(contactId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show success message after deletion
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Contact query deleted successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Submit the form to delete the contact after confirming
                        document.getElementById('delete-form-' + contactId).submit();
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Show message if the user cancels the deletion
                    Swal.fire(
                        'Cancelled',
                        'Contact query is safe.',
                        'error'
                    );
                }
            });
        }
    </script>
@endsection
