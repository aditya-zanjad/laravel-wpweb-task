@extends('layouts.default')

@section('title', 'Developer Dashboard | View Task List')

@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
        <div class=" ml-auto mt-3 mr-3">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left mr-1"></i>
                Dashboard
            </a>
        </div>
        <div class="card card-primary" style="margin-top: 3%; margin-bottom: 12%;">
            <div class="card-header">
                <h3 class="card-title">
                    Add Task
                </h3>
            </div>

            <!-- Begin: Form -->
            <form method="POST" action="{{ route('tasks.store') }}">
                {{-- Hidden inputs for CSRF token & POST method --}}
                @csrf
                @method('POST')
                {{-- Hidden inputs for CSRF token & POST method --}}

                <div class="card-body">
                    <!-- Begin: Name -->
                    <div class="form-group">
                        <label for="name">
                            {{ __('Task') }}
                        </label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Enter Your Name..." old="{{ old('name') }}" required>
                    </div>
                    @error('name')
                        <small class="text-danger font-weight-bolder">
                            {{ $message }}
                        </small>
                    @enderror
                    <!-- End: Name -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </form>
            <!-- End: Form -->
        </div>
    </div>
</div>
@endsection
