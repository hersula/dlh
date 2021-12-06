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
                                 <li class="breadcrumb-item"><a href="<?= base_url('')?>"><i class="fas fa-home"></i></a></li>
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
                         <h3 class="mb-0">Pengajuan Pelaporan Industri</h3>
                         <p class="text-sm mb-0">
                             Halaman ini untuk melihat mengajukan pelaporan dari industri yang terdaftar dan tervalidasi.
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
                                         <option value="<?= $row["siteWWTPID"]; ?>" data-name="<?= $row['name']?>"><?= $row["name"]; ?></option>
                                     <?php
                                        }
                                        ?>
                                 </select>
                             </div>
                             <div class="p-2 bd-highlight w-32">
                                 <div class="form-control reportrange_q">
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
                             <div class="col-lg-2 mt-3 pr-1">
                                 <select class="form-control" data-toggle="select">
                                     <option>Pilih Site</option>
                                     <option>Badges</option>
                                     <option>Buttons</option>
                                     <option>Cards</option>
                                     <option>Forms</option>
                                     <option>Modals</option>
                                 </select>
                             </div>
                             <div class="col-lg-2 mt-3 pr-1 wrapper-daterange">
                                 <div class="form-control reportrange_q">
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
                            <button class="btn btn-primary" id="tambah-laporan">Tambah Pengajuan Pelaporan</button>
                            <button class="btn btn-warning" id="btn-download">Download</button>
                         </div>
                     </div>
                     <div class="table-responsive py-4">
                         <table class="table table-flush" id="datatable">
                             <thead class="thead-light">
                                 <tr>
                                     <th>No</th>
                                     <th>Quartal Periode </th>
                                     <th>Tanggal Pelaporan</th>
                                     <th>Nama Industri WWTP</th>
                                     <th>Status</th>
                                     <th>Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <!-- <tr>
                                     <td>1</td>
                                     <td>Q1</td>
                                     <td>2011/03/31 23:59</td>
                                     <td>PT INDUSTRI A</td>
                                     <td>PT INDUSTRI A (WWTP-01)</td>
                                     <td><label class="badge badge-success">Sudah melaporkan</label></td>
                                     <td><a href="<?= base_url()?>/public/documents/pdf/tte121059.pdf" target="_blank"><button class="btn btn-primary">Cetak Lembar LTE</button></a></td>
                                 </tr>
                                 <tr>
                                     <td>2</td>
                                     <td>Q1</td>
                                     <td>2011/03/31 23:59</td>
                                     <td>PT INDUSTRI A</td>
                                     <td>PT INDUSTRI A (WWTP-02)</td>
                                     <td><label class="badge badge-warning">Menunggu Validasi</label></td>
                                     <td><button class="btn btn-primary" disabled>Cetak Lembar LTE</button></td>
                                 </tr> -->
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 
 <!-- MODAL TAMBAH Pengajuan Laporan -->
 <div class="modal fade" id="modalTambahPengajuan" tabindex="-1" role="dialog" aria-labelledby="modalTambahPengajuanLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalTambahPengajuanLabel">Tambah Pengajuan Laporan</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="table-responsive">
                     <div class="row">
                         <div class="col-lg-12">
                             <select name="site_wwtp" id="site_wwtp" class="form-control" readonly>
                                 <option value="">Pilih Site WWTP</option>
                             </select>
                         </div>
                     </div>

                     <form>
                         <table class="table">
                             <tr>
                                 <td style="width:30px"><label for="tipe_pelaporan" class="text-left">Tipe Pelaporan </label></td>
                                 <td>
                                 <select  class="form-control" id="tipe_pelaporan" name="tipe_pelaporan" required readonly >
                                    <option value="">Pilih Tipe Pelaporan</option>
                                    <option value="2" selected>Semester</option>
                                </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="nama_perusahaan" class="text-left">Semester Yang Dilaporkan </label></td>
                                 <td>
                                 <select  class="form-control" id="semester_pelaporan" name="semester_pelaporan" required readonly>
                                    <option value="">Pilih Tipe Pelaporan</option>
                                    <option value="1">Semester 1</option>
                                    <option value="2">Semester 2</option>
                                </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="nama_perusahaan" class="text-left">Data yang dilaporkan </label></td>
                                 <td>
                                     <div class="row">
                                    <div class="custom-control custom-checkbox col-lg-auto">
                                        <input type="checkbox" class="custom-control-input" id="opt_data_harian" name="data_harian">
                                        <label class="custom-control-label" for="opt_data_harian">Data Harian</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-lg-auto">
                                        <input type="checkbox" class="custom-control-input" id="opt_data_analisa_inlet" name="data_analisa_inlet">
                                        <label class="custom-control-label" for="opt_data_analisa_inlet">Data Analisa Inlet</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-lg-auto">
                                        <input type="checkbox" class="custom-control-input" id="opt_data_analisa_outlet" name="data_analisa_outlet">
                                        <label class="custom-control-label" for="opt_data_analisa_outlet">Data Analisa outlet</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-lg-auto">
                                        <input type="checkbox" class="custom-control-input" id="opt_data_analisa_outfall" name="data_analisa_outfall">
                                        <label class="custom-control-label" for="opt_data_analisa_outfall">Data Analisa outfall</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-lg-auto">
                                        <input type="checkbox" class="custom-control-input" id="opt_data_analisa_upstream" name="data_analisa_upstream">
                                        <label class="custom-control-label" for="opt_data_analisa_upstream">Data Analisa upstream</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-lg-auto">
                                        <input type="checkbox" class="custom-control-input" id="opt_data_analisa_downstream" name="data_analisa_downstream">
                                        <label class="custom-control-label" for="opt_data_analisa_downstream">Data Analisa downstream</label>
                                    </div>
                                    </div>
                                 </td>
                             </tr>
                             
                             <tr>
                                 <td style="width:30px"><label for="nama_perusahaan" class="text-left">Surat Hasil Pelaporan Laboratorium </label></td>
                                 <td>
                                    <div class="dropzone dropzone-single" >
                                        <div class="fallback">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="dropzoneBasicUpload" required>
                                                <label class="custom-file-label" for="dropzoneBasicUpload">Choose file</label>
                                            </div>
                                        </div>

                                    </div>
                                 </td>
                             </tr>
                         </table>
                         <div id="content-laporan">
                             <h1>Data Harian</h1>
                             <table id="tbl_harian" class="table">
                             </table>
                             <!-- <h1>Data Analisa Inlet</h1>
                             <table id="tbl_analisa_inlet" class="table">
                             </table> -->
                         </div>
                         <table class="table">
                             <tr>
                                 <td colspan="3"><button class="btn btn-primary float-right" type="submit">Submit</button></td>
                             </tr>
                         </table>
                        </form>
                        
                        
                 </div>
             </div>
         </div>
     </div>
 </div>
 
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
                 html += `<option value = "<?= $row["siteWWTPID"]; ?>" > <?= $row["name"]; ?> </option>`;
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
     $("#site").on('change',function(){
        let id = $(this).val();
        myDataTable(id)

     })
     function myDataTable(id_site){
         let html;
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
                 "bDestroy": true,
                 "order": [
                     [1, "asc"]
                 ],
                 "ajax": {
                     url: "<?= base_url('Pengajuan_pelaporan/getDataTable') ?>",
                     type: "POST",
                     data:{site_id:id_site}

                 },
                 columns: [{
                         data: null,
                         "sortable": false,
                         render: function(data, type, row, meta) {
                             return meta.row + meta.settings._iDisplayStart + 1;
                         }
                     },
                     {
                         "render": function(data, type, row, meta) {
                             let html ="";
                             if(row.tipe_pelaporan == 1 ){
                                 html = `Triwulan`
                             }
                             else if(row.tipe_pelaporan == 2 ){
                                 html = `Semester`
                             }
                             return html
                         }
                     },
                     {
                         data: "crt_at",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                         data: "name",
                         render: $.fn.dataTable.render.text()
                     },
                     
                     {
                         "render": function(data, type, row, meta) {
                             return html = `<div class='badge badge-${row.badge}'>${row.status}</div>`
                         }
                     },
                     {
                         "render": function(data, type, row, meta) {
                             html = `<button class="btn btn-sm btn-info btn-view"  data-id="${row.registration_id }" ><i class="far fa-eye"></i> Show </button> `

                             html += `<button class="btn btn-sm btn-warning btn-edit"  data-id="${row.registration_id }"><i class="far fa-edit"></i> Edit </button> `

                             html += `<button href="" class="btn btn-sm btn-danger btn-delete"  id="btn-delete" data-id="${row.registration_id}"<i class="far fa-trash-alt"></i> Deactivated</button>`

                             if (row.status == "Open") {
                                 html += `<button href="" class="btn btn-sm btn-success btn-konfirmasi"  id="btn-verive" data-id="${row.registration_id}"<i class="far fa-trash-alt"></i> Verified</button>`

                             }

                             return html
                         }
                     },
                 ]
             })

     }

     $("#tambah-laporan").click(function() {
             let siteWWTPID = $("select[name=export_site]").val();
             let nameWWTP = $("select[name=export_site]").find(':selected').attr('data-name');
             if (siteWWTPID != '') {
                 $("#site_wwtp").html(`<option value="${siteWWTPID}">${nameWWTP}</option>`)
                 $("#modalTambahPengajuan").modal("show");
             } else {
                 notify("Pilih Titik Penaatan Terlebih dahulu!", 'danger', 'top', 'center');
             }
    });


    // DATA HARIAN
    $("#opt_data_harian").on('change',function(){
        let wwtpID = $("select[name=export_site]").val();
        let tipe_semester = $("#tipe_pelaporan").val();
        let semester = $("#semester_pelaporan").val();
        let start_tgl;
        let end_tgl;
        // SEMESTER
        let start_month = moment().startOf('years').format('DD-MM-YYYY');
        let end_month = moment(start_month).add(5, 'M').endOf('months').format('DD-MM-YYYY');

        if(moment().format('MM') == 1 || moment().format('MM') == 2 || moment().format('MM') == 3 || moment().format('MM') == 4 || moment().format('MM') == 5 || moment().format('MM') == 6){
            start_tgl = start_month
            end_tgl = end_month

            $("#semester_pelaporan").html(`<option value="1">Semester 1</option>`)
        }
        else {
            start_tgl   = moment(end_month,"DD-MM-YYYY").add(1,'M').startOf('months').format('DD-MM-YYYY');
            end_tgl     = moment(start_tgl,"DD-MM-YYYY").add(5, 'M').endOf('months').format('DD-MM-YYYY');
            $("#semester_pelaporan").html(`<option value="2">Semester 2</option>`)
        }
        

        if($(this).is(":checked")) { 
            let  tableName= '#tbl_harian';
            $.ajax({
                url: '<?= base_url('Data_harian/get_data_harian_laporan')?>',
                type: 'POST',
                data: { wwtpID:wwtpID,tipe_semester:tipe_semester,start_tgl:start_tgl,end_tgl:end_tgl },
                success:function(data){
                    d =  JSON.parse(data);
                    $('#tbl_harian').DataTable({
                        "bDestroy": true,
                        data: d.data,
                        columns: d.columns
                    });
                   
                    
                }
            });
        }
        else {
            $('#tbl_harian').DataTable().clear().draw();
        }
    })
    // DATA INLET
    $("#opt_data_analisa_inlet").on('change',function(){
        let wwtpID = $("select[name=export_site]").val();
        let tipe_semester = $("#tipe_pelaporan").val();
        let semester = $("#semester_pelaporan").val();
        let start_tgl;
        let end_tgl;
        // SEMESTER
        let start_month = moment().startOf('years').format('DD-MM-YYYY');
        let end_month = moment(start_month).add(5, 'M').endOf('months').format('DD-MM-YYYY');

        if(moment().format('MM') == 1 || moment().format('MM') == 2 || moment().format('MM') == 3 || moment().format('MM') == 4 || moment().format('MM') == 5 || moment().format('MM') == 6){
            start_tgl = start_month
            end_tgl = end_month

            $("#semester_pelaporan").html(`<option value="1">Semester 1</option>`)
        }
        else {
            start_tgl   = moment(end_month,"DD-MM-YYYY").add(1,'M').startOf('months').format('DD-MM-YYYY');
            end_tgl     = moment(start_tgl,"DD-MM-YYYY").add(5, 'M').endOf('months').format('DD-MM-YYYY');
            $("#semester_pelaporan").html(`<option value="2">Semester 2</option>`)
        }
        

        if($(this).is(":checked")) { 
            let  tableName= '#tbl_analisa_inlet';
            // $.ajax({
            //     url: '<?= base_url('Analisa_inlet/get_data_inlet_laporan')?>',
            //     type: 'POST',
            //     data: { wwtpID:wwtpID,tipe_semester:tipe_semester,start_tgl:start_tgl,end_tgl:end_tgl },
            //     success:function(data){
            //         d =  JSON.parse(data);
            //         $('#tbl_analisa_inlet').DataTable({
            //             "bDestroy": true,
            //             data: d.data,
            //             columns: d.columns
            //         });
                   
                    
            //     }
            // });
        }
        else {
            $('#tbl_analisa_inlet').DataTable().clear().draw();
        }
    })
    // DATA OUTET
    $("#opt_data_analisa_outlet").on('change',function(){
        let wwtpID = $("select[name=export_site]").val();
        let tipe_semester = $("#tipe_pelaporan").val();
        let semester = $("#semester_pelaporan").val();
        let start_tgl;
        let end_tgl;
        // SEMESTER
        let start_month = moment().startOf('years').format('DD-MM-YYYY');
        let end_month = moment(start_month).add(5, 'M').endOf('months').format('DD-MM-YYYY');

        if(moment().format('MM') == 1 || moment().format('MM') == 2 || moment().format('MM') == 3 || moment().format('MM') == 4 || moment().format('MM') == 5 || moment().format('MM') == 6){
            start_tgl = start_month
            end_tgl = end_month

            $("#semester_pelaporan").html(`<option value="1">Semester 1</option>`)
        }
        else {
            start_tgl   = moment(end_month,"DD-MM-YYYY").add(1,'M').startOf('months').format('DD-MM-YYYY');
            end_tgl     = moment(start_tgl,"DD-MM-YYYY").add(5, 'M').endOf('months').format('DD-MM-YYYY');
            $("#semester_pelaporan").html(`<option value="2">Semester 2</option>`)
        }
        

        if($(this).is(":checked")) { 
            let  tableName= '#tbl_analisa_outlet';
            // $.ajax({
            //     url: '<?= base_url('Analisa_outlet/get_data_outlet_laporan')?>',
            //     type: 'POST',
            //     data: { wwtpID:wwtpID,tipe_semester:tipe_semester,start_tgl:start_tgl,end_tgl:end_tgl },
            //     success:function(data){
            //         d =  JSON.parse(data);
            //         $('#tbl_analisa_outlet').DataTable({
            //             "bDestroy": true,
            //             data: d.data,
            //             columns: d.columns
            //         });
                   
                    
            //     }
            // });
        }
        else {
            $('#tbl_analisa_outlet').DataTable().clear().draw();
        }
    })
 </script>