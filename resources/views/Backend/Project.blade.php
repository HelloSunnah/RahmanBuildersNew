@extends('Backend.Master')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Manage Projects</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add Project Card -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            <strong>Add New Project</strong>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.projects.store') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" name="title" class="form-control" placeholder="Project Title" required>
                    </div>
                    <div class="col-md-6">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-12">
                        <textarea name="description" class="form-control" rows="3" placeholder="Project Description" required></textarea>
                    </div>
                </div>
                <button class="btn btn-success mt-3">Add Project</button>
            </form>
        </div>
    </div>

    <!-- Project Cards -->
    <h3 class="mb-3">All Projects</h3>
    <div class="row">
        @foreach($projects as $project)
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <p class="card-text">{{ Str::limit($project->description, 100) }}</p>

                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid rounded mb-2" style="max-width: 150px;">
                        @endif

                        <div class="d-flex gap-2 mt-2">
                            <!-- Edit Modal Trigger -->
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $project->id }}">Edit</button>

                            <!-- Delete Modal Trigger -->
                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $project->id }}">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $project->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $project->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.projects.update', $project->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Project - {{ $project->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="4" required>{{ $project->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Replace Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @if($project->image)
                                        <img src="{{ asset('storage/' . $project->image) }}" class="img-thumbnail mt-2" width="100">
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary">Update Project</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title">Confirm Delete</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete the project "<strong>{{ $project->title }}</strong>"?</p>
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
