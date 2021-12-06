<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center  ml-md-auto ">
                    <li class="nav-item d-xl-none">
                        <!-- Sidenav toggler -->
                        <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="<?= base_url('') ?>"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url("$menu") ?>"><?= strtoupper($menu); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= strtoupper($submenu); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card h-100">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Data Harian</h3>
                        <p class="text-sm mb-0">
                            Halaman ini untuk melihat data harian industri.
                        </p>
                        <div class="d-none d-lg-flex d-xl-flex flex-row bd-highlight mb-3 table-responsive">
                            <div class="p-2 bd-highlight  w-30">
                                <select class="form-control" data-toggle="select">
                                    <option>Pilih Kecamatan</option>
                                    <option>Badges</option>
                                    <option>Buttons</option>
                                    <option>Cards</option>
                                    <option>Forms</option>
                                    <option>Modals</option>
                                </select>
                            </div>
                            <div class="p-2 bd-highlight  w-30">
                                <select class="form-control" data-toggle="select">
                                    <option>Pilih Desa</option>
                                    <option>Badges</option>
                                    <option>Buttons</option>
                                    <option>Cards</option>
                                    <option>Forms</option>
                                    <option>Modals</option>
                                </select>
                            </div>
                            <div class="p-2 bd-highlight  w-30">
                                <select class="form-control" data-toggle="select">
                                    <option>Pilih Industri</option>
                                    <option>Badges</option>
                                    <option>Buttons</option>
                                    <option>Cards</option>
                                    <option>Forms</option>
                                    <option>Modals</option>
                                </select>
                            </div>
                            <div class="p-2 bd-highlight  w-30">
                                <select class="form-control" name="export_site" data-toggle="select">
                                    <option value="">Pilih Site</option>
                                    <?php
                                    foreach ($site as $row) {
                                    ?>
                                        <option value="<?= $row["siteWWTPID"]; ?>"><?= $row["name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="p-2 bd-highlight w-32">
                                <div class="form-control reportrange">
                                    <span></span>
                                    <input type="hidden" name="start_date" id="start_date">
                                    <input type="hidden" name="end_date" id="end_date">
                                    <i class="fa fa-caret-down float-right"></i>
                                </div>
                            </div>
                            <div class="p-2 bd-highlight">
                                <button class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                        <!-- MODE HP -->
                        <div class="row  d-lg-none">
                            <div class="col-lg-2 mt-3 pr-1">
                                <select class="form-control" data-toggle="select">
                                    <option>Pilih Kecamatan</option>
                                    <option>Badges</option>
                                    <option>Buttons</option>
                                    <option>Cards</option>
                                    <option>Forms</option>
                                    <option>Modals</option>
                                </select>
                            </div>
                            <div class="col-lg-2 mt-3 pr-1">
                                <select class="form-control" data-toggle="select">
                                    <option>Pilih Desa</option>
                                    <option>Badges</option>
                                    <option>Buttons</option>
                                    <option>Cards</option>
                                    <option>Forms</option>
                                    <option>Modals</option>
                                </select>
                            </div>
                            <div class="col-lg-2 mt-3 pr-1">
                                <select class="form-control" data-toggle="select">
                                    <option>Pilih Industri</option>
                                    <option>Badges</option>
                                    <option>Buttons</option>
                                    <option>Cards</option>
                                    <option>Forms</option>
                                    <option>Modals</option>
                                </select>
                            </div>
                            <div class="col-lg-2 mt-3 pr-1 wrapper-daterange">
                                <div class="form-control reportrange">
                                    <span></span>
                                    <input type="hidden" name="start_date" id="start_date">
                                    <input type="hidden" name="end_date" id="end_date">
                                    <i class="fa fa-caret-down float-right"></i>
                                </div>
                            </div>
                            <div class="col-lg-3 mt-3 pr-1">
                                <button class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse bd-highlight">
                        <div class="p-2 pr-4 bd-highlight">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahHarian">Tambah Laporan Harian</button>
                            <button class="btn btn-warning" id="btn-download">Download</button>
                        </div>
                    </div>
                    <div class="table-responsive py-4">
                        <table id="datatable" class="table table-flush">
                            <thead class="thead-light thead-datatable">
                                <tr>
                                    <th>No</th>
                                    <th>Site Name</th>
                                    <th>Tgl Pelaporan</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL BML -->
<div class="modal fade" id="modalBML" tabindex="-1" role="dialog" aria-labelledby="modalBMLLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBMLLabel">Parameter Tidak Memenuhi Baku Mutu Lingkungan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-flush ">
                        <thead class="thead-light">
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Parameter</th>
                                <th>Standar Baku Mutu Lingkungan</th>
                                <th>Nilai Parameter</th>
                                <th>Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2011/04/25</td>
                                <td>Ph</td>
                                <td>6-7</td>
                                <td>5.1</td>
                                <td>Parameter Ph Dibawah Ambang Batas</td>
                            </tr>
                            <tr>
                                <td>2011/04/25</td>
                                <td>COD</td>
                                <td>0-36</td>
                                <td>37</td>
                                <td>Parameter Ph Melebihi Ambang Batas</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL TAMBAH LAPORAN HARIAN -->
<div class="modal fade" id="modalTambahHarian" tabindex="-1" role="dialog" aria-labelledby="modalTambahHarianLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahHarianLabel">Tambah Laporan Harian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <form method="POST" action="<?= base_url("add_data_harian"); ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <select name="site" id="pilih-site" class="form-control">
                                    <option data-siteWWTPID="" data-company_name="Nama Perusahaan" value="">Pilih Site WWTP</option>
                                    <?php
                                    foreach ($site as $row) {
                                    ?>
                                        <option data-siteWWTPID="<?= $row["siteWWTPID"]; ?>" data-company_name="<?= $row["company_name"]; ?>" value="<?= $row["siteWWTPID"]; ?>"><?= $row["name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div>
                            <table class="table">
                                <tr>
                                    <td style="width:30px"><label for="nama_perusahaan" class="text-left">Nama Perusahaan </label></td>
                                    <td><input type="text" class="form-control" placeholder="Nama Perusahaan" id="nama_perusahaan" name="nama_perusahaan" required readonly></td>
                                </tr>
                                <tr>
                                    <td style="width:30px"><label for="nama_perusahaan" class="text-left">Tambah Form Pelaporan </label></td>
                                    <td><button class="btn btn-warning" type="button" id="add-form-pelaporan" data-toggle="notify2" data-placement="top" data-align="right" data-type="success" data-icon="ni ni-bell-55" data-message="Tambah form berhasil ditambahkan"><i class="ni ni-fat-add"></i></button></td>
                                </tr>

                            </table>
                            <div id="content_form"></div>
                            <table class="table">
                                <tr>
                                    <td colspan="3"><button class="btn btn-primary float-right" type="submit">Submit</button></td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
<script>
    // DATATABLE
    $("select[name=export_site]").change(function() {
        let site = $(this).find(":selected").val();

        $("#datatable").DataTable().destroy();
        $("#datatable tbody").empty();

        if (site == "") {
            alert("Pilih Site WWTP");
        } else {
            get_columns(site);
        }
    });

    function myDataTables(site = "", cols = "") {
        let html;
        let columns = [{
                data: null,
                "sortable": false,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: "siteWWTPID",
                render: $.fn.dataTable.render.text()
            },
            {
                data: "tgl_pelaporan",
                render: $.fn.dataTable.render.text()
            },
        ];

        let j = columns.length;
        for (let i = 0; i < cols.length; i++) {
            columns[j] = {
                data: cols[i],
                render: $.fn.dataTable.render.text()
            };

            j++;
        }

        let table =
            $("#datatable").DataTable({
                language: {
                    paginate: {
                        previous: "<i class='fas fa-angle-left'>",
                        next: "<i class='fas fa-angle-right'>"
                    }
                },
                "columnDefs": [{
                        "orderable": false,
                        "targets": [0, 4]
                    },
                    {
                        "orderable": true,
                        "targets": [1, 2, 3]
                    }
                ],
                "pageLength": 5,
                "lengthMenu": [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100]
                ],
                "bLengthChange": true,
                "bFilter": true,
                "bInfo": true,
                "processing": true,
                "bServerSide": true,
                "order": [
                    [1, "asc"]
                ],
                "ajax": {
                    url: "<?= base_url('get_datatable_data_harian') ?>",
                    type: "POST",
                    data: function(d) {
                        //  d._token = "{{csrf_token()}}"
                        d.site = site
                    },

                },
                columns: columns,
            })

        $(".dataTables_filter input")
            .off()
            .on('keyup change', function(e) {
                if (e.keyCode == 13 || this.value == "") {
                    table.search(this.value)
                        .draw();
                }
            });

    }

    function get_columns(site) {
        let columns = false;

        $.ajax({
            url: "<?= base_url("Data_harian/get_columns") ?>",
            type: "POST",
            dataType: "json",
            data: {
                "siteWWTPID": site,
            },
            success: function(data) {
                if (data) {
                    let html = "";
                    for (let i = 0; i < data.length; i++) {
                        html += `<th class="target-remove-datatable">${data[i]}</th>`;
                    }

                    $(".thead-datatable th.target-remove-datatable").remove();
                    $(".thead-datatable tr").append(html);

                    myDataTables(site, data);
                }
            },

        });

        return columns;
    }

    // SWEETALERT UNTUK DOWNLOAD FILE
    $(function() {
        $("#btn-download").on('click', function() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Apakah anda ingin export data ini?',
                text: "Jika ya, mohon menunggu sebentar...",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Excel',
                cancelButtonText: 'PDF',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    //Download Excel
                    let site = $("select[name=export_site]").find(":selected").val();
                    window.location.href = "<?= base_url("export_data_harian"); ?>/" + site;
                    swalWithBootstrapButtons.fire(
                        'Excel',
                        'Data berhasil di download...',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'PDF',
                        'Data berhasil di download...',
                        'success'
                    )
                }
            })
        })
    })

    $(function() {
        function initDatepicker() {
            $('.datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD HH:mm',
                icons: {
                    time: "fa fa-clock",
                    date: "fa fa-calendar-day",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });
        }
        let num = 0;
        let parameter = "";

        $("select[name=site]").change(function() {
            let siteWWTPID = $(this).find(":selected").data("sitewwtpid");
            let company_name = $(this).find(":selected").data("company_name");
            $("input[name=nama_perusahaan]").val(company_name);

            get_parameter_harian(siteWWTPID);

            parameter = "";
            $("#content_form").empty();
        });

        // get titik penataan
        function get_parameter_harian(siteWWTPID) {
            let html = "";
            $.ajax({
                url: "<?= base_url("get_parameter_harian") ?>",
                type: "POST",
                dataType: "json",
                data: {
                    "siteWWTPID": siteWWTPID,
                },
                success: function(data) {
                    console.log(data);
                    for (let i = 0; i < data.length; i++) {
                        parameter += `
                        <tr>
                        <td style="width:30px"><label class="text-left">Nilai ${data[i]['parameter']}</label></td>
                        <td><input type="text" class="form-control" name="${data[i]['parameter']}" required ></td>
                        </tr>
                        `;
                    }
                },

            });
        };

        $("#add-form-pelaporan").on('click', function() {
            let value = $("#pilih-site").find(":selected").val();

            $("#content_form").empty();

            if (value) {
                let content_form = $("#content_form");
                let html;
                html = `<table class="table">`;
                html += `<h3>FORM Laporan Harian</h3>`;
                html += `
                        <tr>
                            <td style="width:30px"><label for="tanggal_pelaporan" class="text-left">Tanggal Pelaporan </label></td>
                                <td>
                                    <div class="form-group">
                                        <div class='input-group date datetimepicker1' >
                                            <input type='text' class="form-control" placeholder="Tanggal Pelaporan" name="tanggal_pelaporan" id="tanggal_pelaporan" />
                                            <span class="input-group-addon input-group-append">
                                                <button class="btn btn-outline-primary" type="button" id="button-addon2"> <span class="fa fa-calendar"></span></button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                        </tr>
                        `
                html += parameter;

                html += `</table>`

                content_form.append(html)
                initDatepicker()
            } else {
                alert("Pilih Titik Penaatan Terlebih dahulu!");
            }
        })
    });
</script>