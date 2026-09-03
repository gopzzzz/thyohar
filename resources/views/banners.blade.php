@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Banners</h1>
                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Banners
                        </li>

                    </ol>

                </div>

            </div>

        </div>

    </section>


    <!-- Main Content -->
    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <!-- Card Header -->
                        <div class="card-header d-flex justify-content-between align-items-center">

                            <h3 class="card-title">
                                Banner List
                            </h3>

                            <button
                                type="button"
                                class="btn btn-primary btn-sm"
                                data-toggle="modal"
                                data-target="#newBannerModal"
                            >
                                <i class="fas fa-plus"></i>
                                New Record
                            </button>

                        </div>


                        <!-- Success Message -->
                        @if(session('success'))

                            <div class="alert alert-success alert-dismissible fade show m-3">

                                {{ session('success') }}

                                <button
                                    type="button"
                                    class="close"
                                    data-dismiss="alert"
                                >
                                    <span>&times;</span>
                                </button>

                            </div>

                        @endif


                        <!-- Error Message -->
                        @if(session('error'))

                            <div class="alert alert-danger alert-dismissible fade show m-3">

                                {{ session('error') }}

                                <button
                                    type="button"
                                    class="close"
                                    data-dismiss="alert"
                                >
                                    <span>&times;</span>
                                </button>

                            </div>

                        @endif


                        <!-- Validation Errors -->
                        @if($errors->any())

                            <div class="alert alert-danger m-3">

                                <ul class="mb-0">

                                    @foreach($errors->all() as $error)

                                        <li>
                                            {{ $error }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        <!-- Banner Table -->
                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered table-striped table-hover">

                                    <thead>

                                        <tr>

                                            <th style="width: 60px;">
                                                #
                                            </th>

                                            <th style="width: 180px;">
                                                Banner Image
                                            </th>

                                            <th>
                                                Banner Content
                                            </th>

                                            <th>
                                                Banner Link
                                            </th>

                                            <th style="width: 150px;">
                                                Action
                                            </th>

                                        </tr>

                                    </thead>


                                    <tbody>

                                        @forelse($banners as $banner)

                                            <tr>

                                                <!-- ID -->
                                                <td>
                                                    {{ $banner->id }}
                                                </td>


                                                <!-- Banner Image -->
                                                <td class="text-center">

                                                    @if($banner->bannerimage)

                                                        <img
                                                            src="{{ asset($banner->bannerimage) }}"
                                                            width="150"
                                                            height="80"
                                                            style="object-fit: cover;"
                                                            class="border rounded"
                                                            alt="Banner Image"
                                                        >

                                                    @else

                                                        <span class="text-muted">
                                                            No Image
                                                        </span>

                                                    @endif

                                                </td>


                                                <!-- Banner Content -->
                                                <td>

                                                    {{ $banner->bannercontent }}

                                                </td>


                                                <!-- Banner Link -->
                                                <td>

                                                    @if($banner->bannerlink)

                                                        <a
                                                            href="{{ $banner->bannerlink }}"
                                                            target="_blank"
                                                        >
                                                            {{ $banner->bannerlink }}
                                                        </a>

                                                    @else

                                                        <span class="text-muted">
                                                            No Link
                                                        </span>

                                                    @endif

                                                </td>


                                                <!-- Action -->
                                                <td class="text-center">

                                                    <!-- EDIT BUTTON -->

                                                    <button
                                                        type="button"
                                                        class="btn btn-primary btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#editBannerModal{{ $banner->id }}"
                                                    >

                                                        <i class="fas fa-edit"></i>
                                                        Edit

                                                    </button>

                                                   <br><br>
                                                    <!-- DELETE BUTTON -->

                                                    <form
                                                        action="{{ route('banners.destroy', $banner->id) }}"
                                                        method="POST"
                                                        style="display:inline-block;"
                                                        onsubmit="return confirm('Are you sure you want to delete this record?');"
                                                    >

                                                        @csrf

                                                        @method('DELETE')

                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger btn-sm"
                                                        >

                                                            <i class="fas fa-trash"></i>
                                                            Delete

                                                        </button>

                                                    </form>

                                                </td>

                                            </tr>


                                            <!-- ================================================= -->
                                            <!-- EDIT BANNER MODAL -->
                                            <!-- ================================================= -->

                                            <div
                                                class="modal fade"
                                                id="editBannerModal{{ $banner->id }}"
                                                tabindex="-1"
                                                role="dialog"
                                                aria-hidden="true"
                                            >

                                                <div
                                                    class="modal-dialog modal-lg"
                                                    role="document"
                                                >

                                                    <form
                                                        action="{{ route('banners.update', $banner->id) }}"
                                                        method="POST"
                                                        enctype="multipart/form-data"
                                                    >

                                                        @csrf

                                                        @method('PUT')


                                                        <div class="modal-content">


                                                            <!-- Modal Header -->

                                                            <div class="modal-header">

                                                                <h5 class="modal-title">

                                                                    Edit Banner

                                                                </h5>

                                                                <button
                                                                    type="button"
                                                                    class="close"
                                                                    data-dismiss="modal"
                                                                >

                                                                    <span>
                                                                        &times;
                                                                    </span>

                                                                </button>

                                                            </div>


                                                            <!-- Modal Body -->

                                                            <div class="modal-body">


                                                                <!-- Banner Content -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Banner Content

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>

                                                                    <textarea
                                                                        name="bannercontent"
                                                                        class="form-control"
                                                                        rows="4"
                                                                        required
                                                                    >{{ $banner->bannercontent }}</textarea>

                                                                </div>


                                                                <!-- Current Image -->

                                                                <div class="form-group">

                                                                    <label>
                                                                        Current Banner Image
                                                                    </label>

                                                                    <br>

                                                                    @if($banner->bannerimage)

                                                                        <img
                                                                            src="{{ asset($banner->bannerimage) }}"
                                                                            width="250"
                                                                            height="120"
                                                                            style="object-fit: cover;"
                                                                            class="border rounded"
                                                                            alt="Current Banner"
                                                                        >

                                                                    @else

                                                                        <p class="text-muted">
                                                                            No image uploaded.
                                                                        </p>

                                                                    @endif

                                                                </div>


                                                                <!-- New Image -->

                                                                <div class="form-group">

                                                                    <label>
                                                                        Change Banner Image
                                                                    </label>

                                                                    <input
                                                                        type="file"
                                                                        name="bannerimage"
                                                                        class="form-control"
                                                                        accept=".jpg,.jpeg,.png,.webp"
                                                                    >

                                                                    <small class="text-muted">

                                                                        Leave empty to keep the current image.

                                                                    </small>

                                                                </div>


                                                                <!-- Banner Link -->

                                                                <div class="form-group">

                                                                    <label>
                                                                        Banner Link
                                                                    </label>

                                                                    <input
                                                                        type="url"
                                                                        name="bannerlink"
                                                                        class="form-control"
                                                                        value="{{ $banner->bannerlink }}"
                                                                        placeholder="https://example.com"
                                                                    >

                                                                </div>


                                                            </div>


                                                            <!-- Modal Footer -->

                                                            <div class="modal-footer">

                                                                <button
                                                                    type="button"
                                                                    class="btn btn-secondary"
                                                                    data-dismiss="modal"
                                                                >

                                                                    Close

                                                                </button>


                                                                <button
                                                                    type="submit"
                                                                    class="btn btn-primary"
                                                                >

                                                                    <i class="fas fa-save"></i>

                                                                    Update Record

                                                                </button>

                                                            </div>


                                                        </div>

                                                    </form>

                                                </div>

                                            </div>


                                        @empty

                                            <tr>

                                                <td
                                                    colspan="5"
                                                    class="text-center text-muted"
                                                >

                                                    No banners found.

                                                </td>

                                            </tr>

                                        @endforelse

                                    </tbody>

                                </table>

                            </div>

                        </div>


                        <!-- Card Footer -->

                        <div class="card-footer clearfix">

                            <span class="text-muted">

                                Total Banners:
                                {{ $banners->count() }}

                            </span>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </section>

</div>



<!-- ===================================================== -->
<!-- ADD NEW BANNER MODAL -->
<!-- ===================================================== -->

<div
    class="modal fade"
    id="newBannerModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="newBannerModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-lg"
        role="document"
    >

        <form
            action="{{ route('banners.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="modal-content">


                <!-- Modal Header -->

                <div class="modal-header">

                    <h5
                        class="modal-title"
                        id="newBannerModalLabel"
                    >

                        Add New Banner

                    </h5>


                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                    >

                        <span>
                            &times;
                        </span>

                    </button>

                </div>


                <!-- Modal Body -->

                <div class="modal-body">


                    <!-- Banner Content -->

                    <div class="form-group">

                        <label>

                            Banner Content

                            <span class="text-danger">
                                *
                            </span>

                        </label>

                        <textarea
                            name="bannercontent"
                            class="form-control"
                            rows="4"
                            placeholder="Enter banner content"
                            required
                        >{{ old('bannercontent') }}</textarea>

                    </div>


                    <!-- Banner Image -->

                    <div class="form-group">

                        <label>

                            Banner Image

                            <span class="text-danger">
                                *
                            </span>

                        </label>

                        <input
                            type="file"
                            name="bannerimage"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp"
                            required
                        >

                        <small class="text-muted">

                            Allowed: JPG, JPEG, PNG, WEBP.
                            Maximum 2 MB.

                        </small>

                    </div>


                    <!-- Banner Link -->

                    <div class="form-group">

                        <label>
                            Banner Link
                        </label>

                        <input
                            type="url"
                            name="bannerlink"
                            class="form-control"
                            value="{{ old('bannerlink') }}"
                            placeholder="https://example.com"
                        >

                        <small class="text-muted">

                            Enter the page URL that should open
                            when the banner is clicked.

                        </small>

                    </div>


                </div>


                <!-- Modal Footer -->

                <div class="modal-footer">


                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >

                        Close

                    </button>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="fas fa-save"></i>

                        Save Record

                    </button>


                </div>


            </div>

        </form>

    </div>

</div>


@endsection