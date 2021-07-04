@extends('Templates')
@section('content')
@include('Createtraining')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Testing</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Testing</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{url('/algorithm/upload')}}" method="POST" id="formData">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>L CORE</label>
                                        <select name="l_core" id="l_core" class="form-control select2" required style="width: 100%;">
                                            <option value="" selected>--Choose--</option>
                                            <option value="high">HIGH > 37</option>
                                            <option value="mid">MID <= 37 and >= 36</option>
                                            <option value="low">LOW < 36</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>L SURF</label>
                                        <select name="l_surf" id="l_surf" class="form-control select2" required style="width: 100%;">
                                            <option value="">--Choose--</option>
                                            <option value="high">HIGH > 36.5 </option>
                                            <option value="mid">MID <= 36.5 and >= 35 </option>
                                            <option value="low">LOW < 35</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>L 02</label>
                                        <select name="l_o2" id="l_o2" class="form-control select2" required style="width: 100%;">
                                            <option value="">--Choose--</option>
                                            <option value="excellent">EXCELLENT >= 98%</option>
                                            <option value="good">GOOD >= 90% and < 98%</option>
                                            <option value="fair">FAIR >= 80% and < 90%</option>   
                                            <option value="poor">POOR < 80%</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>L BP</label>
                                        <select name="l_bp" id="l_bp" class="form-control select2" required style="width: 100%;">
                                            <option value="">--Choose--</option>
                                            <option value="high">HIGH > 130/90</option>
                                            <option value="mid">MID <= 130/90 and >= 90/70</option>
                                            <option value="low">LOW < 90/70</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>SURF STBL</label>
                                        <select name="surf_stbl" id="surf_stbl" class="form-control select2" required style="width: 100%;">
                                            <option value="">--Choose--</option>
                                            <option value="stable">STABLE</option>
                                            <option value="mod-stable">MOD-STABLE</option>
                                            <option value="unstable">UNSTABLE</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>CORE STBL</label>
                                        <select name="core_stbl" id="core_stbl" class="form-control select2" required style="width: 100%;">
                                            <option value="">--Choose--</option>
                                            <option value="stable">STABLE</option>
                                            <option value="mod-stable">MOD-STABLE</option>
                                            <option value="unstable">UNSTABLE</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>BP STBL</label>
                                        <select name="bp_stbl" id="bp_stbl" class="form-control select2" required style="width: 100%;">
                                            <option value="">--Choose--</option>
                                            <option value="stable">STABLE</option>
                                            <option value="mod-stable">MOD-STABLE</option>
                                            <option value="unstable">UNSTABLE</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>COMFORT</label>
                                        <input type="number" name="comfort" id="comfort" class="form-control" required min="1" max="20">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" id="submit" class="btn btn-success float-right">Proses</button>
                </div>
                <!-- /.row -->
            </div>
            <!--/. container-fluid -->
    </section>


</div>
@endsection
@push('content-js')
<script>
    $('#formData').validate({
        messages: {
            l_core: 'l core harus diChoose',
            l_surf: 'l surf harus diChoose',
            l_o2: 'l o2 harus diChoose',
            l_bp: 'l bp harus diChoose',
            surf_stbl: 'surf stbl harus diChoose',
            core_stbl: 'core stbl harus diChoose',
            bp_stbl: 'bp stbl harus diChoose',
            comfort: 'comfort harus diisi',
            decision_adm_decs: 'decision adm decs harus diChoose',
        },
        highlight: function(e) {
            $(e).closest('.form-control').addClass('is-invalid');
        },
        unhighlight: function(e) {
            $(e).closest('.form-control').removeClass('is-invalid');
            $(e).closest('.form-control').addClass('is-valid');
        },
        success: function(e) {
            $(e).closest('.form-control').removeClass('is-invalid');
            $(e).closest('.form-control').addClass('is-valid');
        },
    });

    $('#submit').on('click', function() {
        if ($('#formData').valid()) {
            $.ajax({
                url: $('#formData').attr('action'),
                type: $('#formData').attr('method'),
                data: $('#formData').serialize(),
                success: function(data) {
                    if (data == 'success') {
                        Toast.fire({
                            icon: 'success',
                            title: 'Berhasil Disimpan'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 750);
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'Gagal Disimpan'
                        });
                    }
                }
            });
        }
    })
</script>
@endpush