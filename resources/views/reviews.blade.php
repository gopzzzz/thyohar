@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Reviews</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Reviews
                        </li>

                    </ol>
                </div>

            </div>

        </div>
    </section>


    <!-- Main Content -->
    <section class="content">

        <div class="container-fluid">


            <!-- Success Message -->
            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    {{ session('success') }}

                    <button type="button"
                            class="close"
                            data-dismiss="alert">

                        <span>&times;</span>

                    </button>

                </div>

            @endif


            <!-- Error Message -->
            @if(session('error'))

                <div class="alert alert-danger alert-dismissible fade show">

                    {{ session('error') }}

                    <button type="button"
                            class="close"
                            data-dismiss="alert">

                        <span>&times;</span>

                    </button>

                </div>

            @endif


            <!-- Validation Errors -->
            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- Card -->
            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">
                        Reviews List
                    </h3>


                    <!-- Add Button -->
                    <button type="button"
                            class="btn btn-primary float-right"
                            data-toggle="modal"
                            data-target="#addReviewModal">

                        <i class="fas fa-plus"></i>

                        Add Review

                    </button>

                </div>


                <!-- Table -->
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th>ID</th>

                                    <th>Vendor ID</th>

                                    <th>Review</th>

                                    <th>Rating</th>

                                    <th>Action</th>

                                </tr>

                            </thead>


                            <tbody>


                                @php
                                    $serial = 1;
                                @endphp


                                @forelse($reviews as $review)

                                    <tr>


                                        <!-- DISPLAY SERIAL NUMBER -->

                                        <td>
                                            {{ $serial }}
                                        </td>


                                        <!-- VENDOR ID -->

                                        <td>
                                            {{ $review->vendor_id }}
                                        </td>


                                        <!-- REVIEW -->

                                        <td>
                                            {{ $review->reviews }}
                                        </td>


                                        <!-- RATING -->

                                        <td>

                                            @for($ratingStar = 1; $ratingStar <= 5; $ratingStar++)

                                                @if($ratingStar <= $review->rating)

                                                    <i class="fas fa-star text-warning"></i>

                                                @else

                                                    <i class="far fa-star text-warning"></i>

                                                @endif

                                            @endfor

                                        </td>


                                        <!-- ACTION -->

                                        <td>


                                            <!-- EDIT BUTTON -->

                                            <button type="button"
                                                    class="btn btn-primary btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#editReview{{ $review->id }}">

                                                <i class="fas fa-edit"></i>

                                                Edit

                                            </button>


                                            <!-- DELETE -->

                                            <form action="{{ route('reviews.destroy', $review->id) }}"
                                                  method="POST"
                                                  style="display:inline;">

                                                @csrf

                                                @method('DELETE')


                                                <button type="submit"
                                                        class="btn btn-primary btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this review?')">

                                                    <i class="fas fa-trash"></i>

                                                    Delete

                                                </button>

                                            </form>


                                        </td>

                                    </tr>


                                    <!-- INCREASE SERIAL NUMBER -->

                                    @php
                                        $serial++;
                                    @endphp


                                    <!-- ========================= -->
                                    <!-- EDIT MODAL -->
                                    <!-- ========================= -->

                                    <div class="modal fade"
                                         id="editReview{{ $review->id }}"
                                         tabindex="-1"
                                         role="dialog">

                                        <div class="modal-dialog"
                                             role="document">

                                            <div class="modal-content">


                                                <div class="modal-header">

                                                    <h4 class="modal-title">
                                                        Edit Review
                                                    </h4>


                                                    <button type="button"
                                                            class="close"
                                                            data-dismiss="modal">

                                                        <span>&times;</span>

                                                    </button>

                                                </div>


                                                <form action="{{ route('reviews.update', $review->id) }}"
                                                      method="POST">

                                                    @csrf

                                                    @method('PUT')


                                                    <div class="modal-body">


                                                        <!-- Vendor ID -->

                                                        <div class="form-group">

                                                            <label>
                                                                Vendor ID
                                                            </label>

                                                            <input type="text"
                                                                   name="vendor_id"
                                                                   class="form-control"
                                                                   value="{{ $review->vendor_id }}"
                                                                   required>

                                                        </div>


                                                        <!-- Review -->

                                                        <div class="form-group">

                                                            <label>
                                                                Review
                                                            </label>

                                                            <textarea name="reviews"
                                                                      class="form-control"
                                                                      rows="4"
                                                                      required>{{ $review->reviews }}</textarea>

                                                        </div>


                                                        <!-- Rating -->

                                                        <div class="form-group">

                                                            <label>
                                                                Rating
                                                            </label>


                                                            <select name="rating"
                                                                    class="form-control"
                                                                    required>

                                                                <option value="1"
                                                                    {{ $review->rating == 1 ? 'selected' : '' }}>

                                                                    1 Star

                                                                </option>


                                                                <option value="2"
                                                                    {{ $review->rating == 2 ? 'selected' : '' }}>

                                                                    2 Stars

                                                                </option>


                                                                <option value="3"
                                                                    {{ $review->rating == 3 ? 'selected' : '' }}>

                                                                    3 Stars

                                                                </option>


                                                                <option value="4"
                                                                    {{ $review->rating == 4 ? 'selected' : '' }}>

                                                                    4 Stars

                                                                </option>


                                                                <option value="5"
                                                                    {{ $review->rating == 5 ? 'selected' : '' }}>

                                                                    5 Stars

                                                                </option>

                                                            </select>

                                                        </div>


                                                    </div>


                                                    <div class="modal-footer">


                                                        <button type="button"
                                                                class="btn btn-secondary"
                                                                data-dismiss="modal">

                                                            Close

                                                        </button>


                                                        <button type="submit"
                                                                class="btn btn-primary">

                                                            <i class="fas fa-save"></i>

                                                            Update Review

                                                        </button>


                                                    </div>


                                                </form>

                                            </div>

                                        </div>

                                    </div>


                                @empty

                                    <tr>

                                        <td colspan="5"
                                            class="text-center">

                                            No reviews found.

                                        </td>

                                    </tr>

                                @endforelse


                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>



<!-- ================================================= -->
<!-- ADD REVIEW MODAL -->
<!-- ================================================= -->

<div class="modal fade"
     id="addReviewModal"
     tabindex="-1"
     role="dialog">

    <div class="modal-dialog"
         role="document">

        <div class="modal-content">


            <div class="modal-header">

                <h4 class="modal-title">
                    Add Review
                </h4>


                <button type="button"
                        class="close"
                        data-dismiss="modal">

                    <span>&times;</span>

                </button>

            </div>


            <form action="{{ route('reviews.store') }}"
                  method="POST">

                @csrf


                <div class="modal-body">


                    <!-- Vendor ID -->

                    <div class="form-group">

                        <label>
                            Vendor ID
                        </label>

                        <input type="text"
                               name="vendor_id"
                               class="form-control"
                               placeholder="Enter Vendor ID"
                               value="{{ old('vendor_id') }}"
                               required>

                    </div>


                    <!-- Review -->

                    <div class="form-group">

                        <label>
                            Review
                        </label>

                        <textarea name="reviews"
                                  class="form-control"
                                  rows="4"
                                  placeholder="Enter Review"
                                  required>{{ old('reviews') }}</textarea>

                    </div>


                    <!-- Rating -->

                    <div class="form-group">

                        <label>
                            Rating
                        </label>


                        <select name="rating"
                                class="form-control"
                                required>

                            <option value="">
                                Select Rating
                            </option>


                            <option value="1">
                                1 Star
                            </option>


                            <option value="2">
                                2 Stars
                            </option>


                            <option value="3">
                                3 Stars
                            </option>


                            <option value="4">
                                4 Stars
                            </option>


                            <option value="5">
                                5 Stars
                            </option>

                        </select>

                    </div>


                </div>


                <div class="modal-footer">


                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">

                        Close

                    </button>


                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>

                        Add Review

                    </button>


                </div>


            </form>

        </div>

    </div>

</div>


@endsection