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
                                <select class="form-control" name="districts_id" id="kecamatan">
                                    <option>Pilih Kecamatan</option>
                                    <?php
                                    if ($kecamatan) {
                                        foreach ($kecamatan as $row) {
                                    ?>
                                            <option value="<?= $row["id"]; ?>"><?= $row["name"]; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="p-2 bd-highlight  w-30">
                                <select class="form-control" name="villages_id" id="desa">
                                    <option>Pilih Desa</option>
                                </select>
                            </div>
                            <div class="p-2 bd-highlight  w-30">
                                <select class="form-control" name="company_id" id="company">
                                    <option value="">Pilih Industri</option>
                                    <?php
                                    foreach ($company as $row) {
                                    ?>
                                        <option value="<?= $row["company_id"]; ?>"><?= $row["company_name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="p-2 bd-highlight  w-30">
                                <select class="form-control" name="export_site" id="site">
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
                            <button id="tambah-laporan" class="btn btn-primary">Tambah Laporan Harian</button>
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
                    <form id="form-laporan" method="POST" action="">
                        <div>
                            <table class="table">
                                <tr>
                                    <td style="width:30px"><label class="text-left">Titik Penaatan</label></td>
                                    <td>
                                        <input type="hidden" name="site" id="pilih-site" value="" readonly />
                                        <input type="text" name="site_name" value="" class="form-control" readonly />
                                    </td>
                                </tr>
                            </table>
                            <div id="content_form"></div>
                            <table class="table">
                                <tr>
                                    <td colspan="3"><button id="btn-action" class="btn btn-primary float-right" type="submit">Submit</button></td>
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
    $("#kecamatan").on('change', function() {
        let kecamatanID = $(this).val();
        let html;
        if (kecamatanID == "") {
            html = `<option value="">Pilih Desa</option>`;
        } else {
            html = `<option value="">Pilih Desa</option>`;
            resetOption($("#desa"))
            $.get(`<?= base_url('wilayah/desa_findById') ?>/${kecamatanID}`, function(data) {
                data = JSON.parse(data);
                $.each(data, function(key, value) {
                    html += `<option value="${value.id}">${value.name}</option>`
                });
                $("#desa").html(html)
            });
        }
    });

    function resetOption(option) {
        option.html(`<option value="">Pilih ${option.attr('id').replace(/^\w/, (c) => c.toUpperCase())}</option>`)
    }

    $("#company").on('change', function() {
        let company_id = $(this).find(":selected").val();
        let html;
        if (company_id == "") {
            html = `<option value="">Pilih Site Penaatan</option>`;
            <?php
            foreach ($site as $row) {
            ?>
                html +=`<option value = "<?= $row["siteWWTPID"]; ?>" > <?= $row["name"]; ?> </option>`;
            <?php
            }
            ?>

            $("#site").html(html);
        } else {
            html = `<option value="">Pilih Site Penaatan</option>`;
            resetOption($("#site"))
            $.get(`<?= base_url('Data_harian/get_site') ?>/${company_id}`, function(data) {
                data = JSON.parse(data);
                console.log(data);
                $.each(data, function(key, value) {
                    html += `<option value="${value.siteWWTPID}">${value.name}</option>`;
                });

                 $("#site").html(html);
            });
        }
    });

    // DATATABLE
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
                data: "site_name",
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

        columns[j] = {
            "render": function(data, type, row, meta) {
                html = `<button class="btn btn-sm btn-info btn-view"  data-id="${row.siteWWTPID }" ><i class="far fa-eye"></i> Show </button> `

                html += `<button class="btn btn-sm btn-warning btn-edit"  data-daily_dataID="${row.daily_dataID}" data-id="${row.siteWWTPID }"><i class="far fa-edit"></i> Edit </button> `

                return html
            }
        };

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
                        html += `<th class="target-remove-datatable param">${data[i]}</th>`;
                    }

                    html += `<th class="target-remove-datatable">Aksi</th>`;

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
            let siteWWTPID = $("select[name=export_site]").val();

            if (siteWWTPID != '') {
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
                });
            }
            else{
                notify("Pilih Titik Penaatan Terlebih dahulu!", 'danger', 'top', 'center');
            }
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
                    $("#content_form").empty();

                    let content_form = $("#content_form");
                    let html;
                    html = create_form_pelaporan();
                    for (let i = 0; i < data.length; i++) {
                        html += creat_parameter(data[i]['parameter'])
                    }

                    html += `</table>`

                    content_form.append(html)
                    initDatepicker()
                },

            });
        };

        function creat_parameter(parameter, value = "") {
            let html = `
                        <tr>
                        <td style="width:30px"><label class="text-left">Nilai ${parameter}</label></td>
                        <td><input type="text" class="form-control" name="${parameter}" value="${value}" required ></td>
                        </tr>
                        `;

            return html;
        }

        function create_form_pelaporan(tgl = "") {
            let html = `<table class="table">`;
            html += `
                        <tr>
                            <td style="width:30px"><label for="tanggal_pelaporan" class="text-left">Tanggal Pelaporan </label></td>
                                <td>
                                    <div class="form-group">
                                        <div class='input-group date datetimepicker1' >
                                            <input type='text' class="form-control" placeholder="Tanggal Pelaporan" value="${tgl}" name="tanggal_pelaporan" id="tanggal_pelaporan" />
                                            <span class="input-group-addon input-group-append">
                                                <button class="btn btn-outline-primary" type="button" id="button-addon2"> <span class="fa fa-calendar"></span></button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                        </tr>
                        `;

            return html;
        }

        $("#tambah-laporan").click(function() {
            let siteWWTPID = $("select[name=export_site]").val();

            if (siteWWTPID != '') {
                $("#form-laporan").attr('action', "<?= base_url("add_data_harian"); ?>");
                $("#btn-action").text("Submit").show();
                $('#content_form input').each(function(){$(this).val("")});
                $("#modalTambahHarian").modal("show");
            } else {
                notify("Pilih Titik Penaatan Terlebih dahulu!", 'danger', 'top', 'center');
            }
        });

        $(document).on("click", ".btn-view", function() {
            $("#btn-action").hide();
            $("#content_form").empty();

            let content_form = $("#content_form");
            let selected = $(this).closest("tr");
            let siteWWTPID = $(this).data("id");
            let site_name = $(this).closest("tr").find("td:eq(1)").text();
            let tgl = $(this).closest("tr").find("td:eq(2)").text();

            $("select[name=site]").val(siteWWTPID);

            let html;
            html = create_form_pelaporan(tgl);
            $("#datatable thead tr:eq(0)").find("th.param").each(function() {
                html += creat_parameter($(this).text(), selected.find("td:eq(" + $(this).index() + ")").text());
            });
            html += `</table>`

            content_form.append(html)
            initDatepicker()

            $("#modalTambahHarian").modal("show");
        });

        $(document).on("click", ".btn-edit", function() {
            $("#btn-action").text("Update").show();
            $("#form-laporan").attr('action', "<?= base_url("edit_data_harian"); ?>");
            $("#content_form").empty();

            let content_form = $("#content_form");
            let selected = $(this).closest("tr");
            let siteWWTPID = $(this).data("id");
            let daily_dataID = $(this).data("daily_dataid");
            let site_name = $(this).closest("tr").find("td:eq(1)").text();
            let tgl = $(this).closest("tr").find("td:eq(2)").text();
            console.log(daily_dataID);
            $("select[name=site]").val(siteWWTPID);

            let html = `<input type="hidden" name="daily_dataID" value="${daily_dataID}"`;
            html += create_form_pelaporan(tgl);
            $("#datatable thead tr:eq(0)").find("th.param").each(function() {
                html += creat_parameter($(this).text(), selected.find("td:eq(" + $(this).index() + ")").text());
            });
            html += `</table>`

            content_form.append(html)
            initDatepicker()

            $("#modalTambahHarian").modal("show");
        });

        // this is the id of the form
        $("#form-laporan").submit(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');
            console.log(url);
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: form.serialize(), // serializes the form's elements.
                success: function(data) {
                    notify(data.reason, data.status, 'top', 'center');
                    $('#datatable').DataTable().ajax.reload();
                    $("#modalTambahHarian").modal("hide");
                }
            });


        });

        $("select[name=export_site]").change(function() {
            let site = $(this).find(":selected").val();
            let name = $(this).find(":selected").text();
            
            $("#datatable").DataTable().destroy();
            $("#datatable tbody").empty();

            if (site == "") {
                alert("Pilih Site WWTP");
            } else {
                $("input[name=site]").val(site);
                $("input[name=site_name]").val(name);
                get_parameter_harian(site);
                get_columns(site);
            }
        });

    });
</script>