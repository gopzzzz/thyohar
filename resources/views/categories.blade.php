@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Categories</h1>
                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Categories
                        </li>

                    </ol>

                </div>

            </div>

        </div>
    </section>


    <!-- Main Content -->
    <section class="content">

        <div class="container-fluid">


            <!-- SUCCESS MESSAGE -->
            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    {{ session('success') }}

                    <button type="button"
                            class="close"
                            data-dismiss="alert">

                        &times;

                    </button>

                </div>

            @endif


            <!-- ERROR MESSAGE -->
            @if(session('error'))

                <div class="alert alert-danger alert-dismissible fade show">

                    {{ session('error') }}

                    <button type="button"
                            class="close"
                            data-dismiss="alert">

                        &times;

                    </button>

                </div>

            @endif


            <!-- VALIDATION ERRORS -->
            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- CATEGORY CARD -->
            <div class="card">


                <!-- CARD HEADER -->
                <div class="card-header">

                    <h3 class="card-title">
                        Category List
                    </h3>


                    <button type="button"
                            class="btn btn-primary float-right"
                            data-toggle="modal"
                            data-target="#addCategoryModal">

                        <i class="fas fa-plus"></i>

                        New Record

                    </button>

                </div>


                <!-- CARD BODY -->
                <div class="card-body">


                    <table class="table table-bordered table-striped">

                        <thead>

                            <tr>

                                <th style="width: 10%;">
                                    ID
                                </th>

                                <th>
                                    Category Name
                                </th>

                                <th>
                                    Image
                                </th>

                                <th style="width: 18%;">
                                    Action
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            @forelse($categories as $categoryItem)

                                <tr>


                                    <!-- ID -->
                                    <td>
                                        {{ $categoryItem->id }}
                                    </td>


                                    <!-- CATEGORY NAME -->
                                    <td>
                                        {{ $categoryItem->category_name }}
                                    </td>


                                    <!-- IMAGE -->
                                    <td>

                                        @if($categoryItem->image)

                                            <img src="{{ asset('uploads/categories/' . $categoryItem->image) }}"
                                                 width="70"
                                                 height="70"
                                                 style="object-fit: cover; border-radius: 5px;">

                                        @else

                                            No Image

                                        @endif

                                    </td>


                                    <!-- ACTION -->
                                    <td>

                                        <a href="{{ route('categories.edit', $categoryItem->id) }}"
                                           class="btn btn-primary btn-sm">

                                            <i class="fas fa-edit"></i>

                                            Edit

                                        </a>

                                    </td>


                                </tr>


                            @empty

                                <tr>

                                    <td colspan="4"
                                        class="text-center">

                                        No categories found.

                                    </td>

                                </tr>

                            @endforelse


                        </tbody>

                    </table>


                </div>

            </div>

        </div>

    </section>

</div>



<!-- ================================================= -->
<!-- ADD CATEGORY MODAL -->
<!-- ================================================= -->

<div class="modal fade"
     id="addCategoryModal"
     tabindex="-1"
     role="dialog">

    <div class="modal-dialog"
         role="document">

        <div class="modal-content">


            <form action="{{ route('categories.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                <!-- HEADER -->
                <div class="modal-header">

                    <h4 class="modal-title">
                        Add Category
                    </h4>

                    <button type="button"
                            class="close"
                            data-dismiss="modal">

                        <span>&times;</span>

                    </button>

                </div>


                <!-- BODY -->
                <div class="modal-body">


                    <!-- CATEGORY NAME -->
                    <div class="form-group">

                        <label>
                            Category Name
                        </label>

                        <input type="text"
                               name="category_name"
                               class="form-control"
                               value="{{ old('category_name') }}"
                               placeholder="Enter category name"
                               required>

                    </div>


                    <!-- IMAGE -->
                    <div class="form-group">

                        <label>
                            Image
                        </label>

                        <input type="file"
                               name="image"
                               class="form-control"
                               accept="image/*"
                               required>

                    </div>


                </div>


                <!-- FOOTER -->
                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">

                        Close

                    </button>


                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>

                        Save Record

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>



<!-- ================================================= -->
<!-- EDIT CATEGORY MODAL -->
<!-- ================================================= -->

@if(isset($category))


<div class="modal fade show"
     id="editCategoryModal"
     tabindex="-1"
     role="dialog"
     style="display: block; padding-right: 17px;"
     aria-modal="true">


    <div class="modal-dialog"
         role="document">


        <div class="modal-content">


            <form action="{{ route('categories.update', $category->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @method('PUT')


                <!-- HEADER -->
                <div class="modal-header">

                    <h4 class="modal-title">
                        Edit Category
                    </h4>


                    <a href="{{ route('categories.index') }}"
                       class="close">

                        <span>&times;</span>

                    </a>

                </div>


                <!-- BODY -->
                <div class="modal-body">


                    <!-- CATEGORY NAME -->
                    <div class="form-group">

                        <label>
                            Category Name
                        </label>


                        <input type="text"
                               name="category_name"
                               class="form-control"
                               value="{{ $category->category_name }}"
                               required>

                    </div>


                    <!-- CURRENT IMAGE -->
                    <div class="form-group">

                        <label>
                            Current Image
                        </label>

                        <br>


                        @if($category->image)

                            <img src="{{ asset('uploads/categories/' . $category->image) }}"
                                 width="100"
                                 height="100"
                                 style="object-fit: cover; border-radius: 5px;">

                        @else

                            <p>
                                No Image
                            </p>

                        @endif

                    </div>


                    <!-- NEW IMAGE -->
                    <div class="form-group">

                        <label>
                            Change Image
                        </label>


                        <input type="file"
                               name="image"
                               class="form-control"
                               accept="image/*">

                    </div>


                </div>


                <!-- FOOTER -->
                <div class="modal-footer">


                    <a href="{{ route('categories.index') }}"
                       class="btn btn-secondary">

                        Cancel

                    </a>


                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>

                        Update Record

                    </button>


                </div>


            </form>


        </div>

    </div>

</div>


<!-- MODAL BACKDROP -->

<div class="modal-backdrop fade show"></div>


@endif


@endsection