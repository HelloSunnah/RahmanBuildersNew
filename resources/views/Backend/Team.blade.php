@extends('Backend.Master')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Manage Team Members</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add Team Member Card -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            <strong>Add New Team Member</strong>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.teams.store') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="number" class="form-control" placeholder="Phone Number" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="designation" class="form-control" placeholder="Designation" required>
                    </div>
                    <div class="col-12">
                        <input type="file" name="image" class="form-control" required>
                    </div>
                </div>
                <button class="btn btn-success mt-3">Add Team Member</button>
            </form>
        </div>
    </div>

    <!-- Team Member Cards -->
    <h3 class="mb-3">All Team Members</h3>
    <div class="row">
        @foreach($teams as $member)
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-body d-flex align-items-center">
                        @if($member->image)
                            <img src="{{ asset('storage/' . $member->image) }}" class="rounded-circle me-3" width="80" height="80" alt="{{ $member->name }}">
                        @endif
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-1">{{ $member->name }}</h5>
                            <p class="mb-1"><strong>Email:</strong> {{ $member->email }}</p>
                            <p class="mb-1"><strong>Phone:</strong> {{ $member->number }}</p>
                            <p class="mb-0"><strong>Designation:</strong> {{ $member->designation }}</p>
                        </div>
                        <div class="d-flex flex-column gap-2 ms-3">
                            <!-- Edit Modal Trigger -->
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $member->id }}">Edit</button>

                            <!-- Delete Modal Trigger -->
                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $member->id }}">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $member->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $member->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.teams.update', $member->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Team Member - {{ $member->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $member->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $member->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" name="number" class="form-control" value="{{ $member->number }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Designation</label>
                                    <input type="text" name="designation" class="form-control" value="{{ $member->designation }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Replace Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @if($member->img)
                                        <img src="{{ asset('storage/' . $member->image) }}" class="img-thumbnail mt-2" width="100" alt="{{ $member->name }}">
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary">Update Member</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="deleteModal{{ $member->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $member->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <form method="POST" action="{{ route('admin.teams.destroy', $member->id) }}">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title">Confirm Delete</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete the team member "<strong>{{ $member->name }}</strong>"?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button class="btn btn-danger">Yes, Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        @endforeach
    </div>
</div>
@endsection
