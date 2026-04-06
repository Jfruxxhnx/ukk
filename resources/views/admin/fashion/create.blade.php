@extends('layout.adminmaster')

@section('content')


<main class="app-main" id="main" tabindex="-1">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Tambah Pakaian Adat</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">General Form</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->

    <section class="content">
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row g-4">
                    <!--begin::Col-->
                    <div class="col-12">
                        <div class="callout callout-info">
                            For detailed documentation of Form visit
                            <a href="https://getbootstrap.com/docs/5.3/forms/overview/" target="_blank"
                                rel="noopener noreferrer" class="callout-link">
                                Bootstrap Form
                            </a>
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-12">
                        <!--begin::Quick Example-->
                        <div class="card card-primary card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Tambah Pakaian Adat</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <form action="/admin/fashion" method="POST">
                                @csrf
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-5 mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Pakaian</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="name">
                                            <input type="hidden" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="id">
                                            <input type="hidden" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="status">
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="validationCustom04" class="form-label">Kategori<span
                                                    class="required-indicator sr-only"> (required)</span></label>
                                            <select class="form-select" id="validationCustom04" required=""
                                                name="category_id">
                                                <option selected="" disabled="" value="">Pilih Kategori</option>
                                                @foreach ($data as $d)
                                                <option value="{{ $d->id }}">{{ $d->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please select a valid state.</div>
                                        </div>
                                        <div class="col-3 mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Harga Per Hari</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="price_per_day">
                                        </div>
                                        
                                        <!--end::Col-->
                                    </div>
                                    <div class="row">
                                        <!--begin::Col-->
                                        
                                        <div class="col-6 mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" aria-label="With textarea"
                                                name="desc"></textarea>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Gambar</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile02" disabled>
                                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                </div>
                                <!--end::Body-->
                                <!--begin::Footer-->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                <!--end::Footer-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Quick Example-->

                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
    </section>

    <!--end::App Content-->
</main>


@endsection
