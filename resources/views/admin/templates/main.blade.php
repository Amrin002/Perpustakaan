@include('admin/templates/header')
@include('admin/templates/sidebar')

<!-- Begin Page Content -->
<div class="content-wrapper">
    <div class="content-header">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $navbar }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ $navbar }}</li>
                        </ol>
                    </div><!-- /.col -->
                    <div class="col-md-6 mt-2">
                        @if ($pesan = Session::get('sukses'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $pesan }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
    <section class="content">
        @yield('content')
    </section>
</div>
<!-- end of content -->

<!-- footer -->
@include('admin/templates/footer')
