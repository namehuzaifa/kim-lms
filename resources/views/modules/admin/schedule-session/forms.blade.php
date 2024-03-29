@extends('layouts.master')
@section('title',($isEdit) ? "Edit Schedule Session" : 'Add Schedule Session'.' | '.config('app.name'))

@section('content')

    <!-- BEGIN: Content-->

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0"> {{ ($isEdit) ? "Edit Schedule Session" : 'Add Schedule Session' }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">

                <!-- Basic Vertical form layout section start -->

                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form form-vertical" method="POST" action="{{ ($isEdit) ?  route('schedule-session-update', $id) : route('schedule-session-store') }}" enctype="multipart/form-data" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="grade_id">Select Grade</label>
                                                    <select class="form-select" id="grade_id" name="grade_id" required>
                                                        @foreach ($grades as $grade)
                                                            <option value="{{ $grade?->id }}" {{ ($isEdit && $grade?->id == $session?->grade_id) ? 'selected' : '' }}>{{ $grade?->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('grade_id')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4  col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="title" >Title</label>
                                                    <input type="text" id="title" class="form-control" value="{{ ($isEdit) ? $session?->title : old('title')  }}" name="title" placeholder="10 hours: $50/ hour" />
                                                    @error('title')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4  col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="status">Session Status</label>
                                                    <select class="form-select" id="status" name="status" required>
                                                        <option value="1" {{ ($isEdit && $session?->status) ? 'selected' : '' }}>active</option>
                                                        <option value="0" {{ ($isEdit && !$session?->status) ? 'selected': '' }}>Inactive</option>
                                                    </select>
                                                    @error('status')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-3  col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="plan_price">Plan Price $</label>
                                                    <input type="number" id="plan_price" class="form-control" value="{{ ($isEdit) ? $session?->plan_price : (old('plan_price') ? old('plan_price') : "0")  }}" name="plan_price" placeholder="Price Per Session" />
                                                    @error('plan_price')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-3  col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="plan_hours">Plan hours</label>
                                                    <input type="number" id="plan_hours" class="form-control" value="{{ ($isEdit) ? $session?->plan_hours : (old('plan_hours') ? old('plan_hours') : "")  }}" name="plan_hours" placeholder="Price Per Session" />
                                                    @error('plan_hours')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4  col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="customize_hour">Customize Hour</label>
                                                    <input type="number" id="customize_hour" class="form-control" value="{{ ($isEdit) ? $session?->customize_hour : (old('customize_hour') ? old('customize_hour') : "")  }}" name="customize_hour" placeholder="eg. 1-10" />
                                                    @error('customize_hour')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-2  col-12">
                                                <div class="mb-1">
                                                    <div class="form-check">
                                                       <label class="form-label" for="recommended">Recommended</label>
                                                        <input {{ ($isEdit && $session?->recommended) ? 'checked' : '' }}  type="checkbox" class="form-check-input select-all" name="recommended" id="recommended" value="1">
                                                        {{-- <label class="form-check-label" for="select-all">Recommended</label> --}}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12  col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="description">Description</label>
                                                    <textarea class="form-control" name="description" id="description" placeholder="Session description" rows="8">{{ ($isEdit) ? $session?->description : old('description')  }}</textarea>
                                                    @error('description')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

                <!-- Basic Vertical form layout section end -->

            </div>
        </div>
    </div>

    <!-- END: Content-->

@endsection

@section('scripts')

@endsection

