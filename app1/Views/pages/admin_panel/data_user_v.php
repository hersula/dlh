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
                         <h3 class="mb-0">Data User</h3>
                         <p class="text-sm mb-0">
                             Halaman ini untuk melihat data user dari industri yang terdaftar dan tervalidasi.
                         </p>
                     </div>

                     <div class="table-responsive py-4">
                         <table class="table table-flush" id="datatable">
                             <thead class="thead-light">
                                 <tr>
                                     <th>No</th>
                                     <th>Nama Industri </th>
                                     <th>Alamat Industri </th>
                                     <th>Email Industri </th>
                                     <th>Tipe Industri </th>
                                     <th>Tanggal Pendaftaran</th>
                                     <th>Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal ADMIN INDUSTRI-->
 <div class="modal fade" id="modalDetailUser" tabindex="-1" role="dialog" aria-labelledby="modalDetailUserLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalEditUserLabel">Detail User Admin Industri</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="content">
                     <form>
                         <table class="table">
                             <tr>
                                 <td style="width:30px"><label for="nama_perusahaan" class="text-left">Nama Perusahaan </label></td>
                                 <td><input type="text" class="form-control" placeholder="Nama Perusahaan" id="nama_perusahaan" name="nama_perusahaan" required readonly></td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="alamat_perusahaan" class="text-left">Alamat Perusahaan </label></td>
                                 <td><input type="text" class="form-control" placeholder="Alamat Perusahaan" id="alamat_perusahaan" name="alamat_perusahaan" required readonly></td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="email_perusahaan" class="text-left">Email Perusahaan </label></td>
                                 <td><input type="text" class="form-control" placeholder="Email Perusahaan" id="email_perusahaan" name="email_perusahaan" required readonly></td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="provinsi" class="text-left">Provinsi </label></td>
                                 <td>
                                     <select class="form-control w-100" name="provinsi" id="provinsi" readonly>
                                         <option value="">Pilih Provinsi</option>
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="kabkot" class="text-left">Kabkot </label></td>
                                 <td>
                                     <select class="form-control w-100" name="kabkot" id="kabkot" readonly>
                                         <option value="">Pilih Kabkot</option>
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="kecamatan" class="text-left">Kecamatan </label></td>
                                 <td>
                                     <select class="form-control w-100" name="kecamatan" id="kecamatan" readonly>
                                         <option value="">Pilih Kecamatan</option>
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="desa" class="text-left">Desa </label></td>
                                 <td>
                                     <select class="form-control w-100" name="desa" id="desa" readonly>
                                         <option value="">Pilih Desa</option>
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="kodePos" class="text-left">Kode Pos </label></td>
                                 <td>
                                     <input type="text" class="form-control" placeholder="Kode Pos" name="kodePos" id="kodePos" readonly>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="noTlpn" class="text-left">No Telepon</label></td>
                                 <td>
                                     <input type="text" class="form-control" placeholder="No Telepon" name="noTlpn" id="noTlpn" readonly>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="jenisIndustri" class="text-left">Jenis Industri</label></td>
                                 <td>
                                     <input type="text" class="form-control" placeholder="Jenis Industri" name="jenisIndustri" id="jenisIndustri" readonly>
                                 </td>
                             </tr>
                             <tr>
                                 <td colspan="3">
                                     <h3>SITE WWTP</h3>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="nama_pengguna" class="text-left">Pilih Lokasi WWTP </label></td>
                                 <td>
                                    <select name="wwtp_users" id="wwtp_users" class="form-control" required>
                                        <option value="">Pilih WWTP</option>
                                    </select>
                                </td>
                             </tr>
                             <!-- <tr>
                                 <td colspan="2"><button class="btn btn-primary float-right">Ubah Data</button></td>
                             </tr> -->
                         </table>
                         <table class="table">
                            <tbody id="content_detail_wwtp">

                            </tbody>
                         </table>
                         <table class="table">
                             <tr>
                                 <th>No</th>
                                 <th>Nama Penanggung Jawab</th>
                                 <th>Email</th>
                                 <th>No Telepon</th>
                                 <th>Level</th>
                             </tr>
                             <tbody id="content_user_wwtp">

                             </tbody>
                         </table>
                     </form>
                 </div>
             </div>

         </div>
     </div>
 </div>
 <!-- Modal ADMIN INDUSTRI-->
 <div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="modalEditUserLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalEditUserLabel">Edit User Admin Industri</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="content">
                     <form>
                         <table class="table">
                             <tr>
                                 <td style="width:30px"><label for="nama_perusahaan" class="text-left">Nama Perusahaan </label></td>
                                 <td><input type="text" class="form-control" placeholder="Nama Perusahaan" id="nama_perusahaan" name="nama_perusahaan" required readonly></td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="alamat_perusahaan" class="text-left">Alamat Perusahaan </label></td>
                                 <td><input type="text" class="form-control" placeholder="Alamat Perusahaan" id="alamat_perusahaan" name="alamat_perusahaan" required readonly></td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="email_perusahaan" class="text-left">Email Perusahaan </label></td>
                                 <td><input type="text" class="form-control" placeholder="Email Perusahaan" id="email_perusahaan" name="email_perusahaan" required readonly></td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="provinsi" class="text-left">Provinsi </label></td>
                                 <td>
                                     <select class="form-control w-100" name="provinsi" id="provinsi" readonly>
                                         <option value="">Pilih Provinsi</option>
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="kabkot" class="text-left">Kabkot </label></td>
                                 <td>
                                     <select class="form-control w-100" name="kabkot" id="kabkot" readonly>
                                         <option value="">Pilih Kabkot</option>
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="kecamatan" class="text-left">Kecamatan </label></td>
                                 <td>
                                     <select class="form-control w-100" name="kecamatan" id="kecamatan" readonly>
                                         <option value="">Pilih Kecamatan</option>
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="desa" class="text-left">Desa </label></td>
                                 <td>
                                     <select class="form-control w-100" name="desa" id="desa" readonly>
                                         <option value="">Pilih Desa</option>
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="kodePos" class="text-left">Kode Pos </label></td>
                                 <td>
                                     <input type="text" class="form-control" placeholder="Kode Pos" name="kodePos" id="kodePos" readonly>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="noTlpn" class="text-left">No Telepon</label></td>
                                 <td>
                                     <input type="text" class="form-control" placeholder="No Telepon" name="noTlpn" id="noTlpn" readonly>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="jenisIndustri" class="text-left">Jenis Industri</label></td>
                                 <td>
                                     <input type="text" class="form-control" placeholder="Jenis Industri" name="jenisIndustri" id="jenisIndustri" readonly>
                                 </td>
                             </tr>
                             <tr>
                                 <td colspan="3">
                                     <h3>SITE WWTP</h3>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width:30px"><label for="nama_pengguna" class="text-left">Pilih Lokasi WWTP </label></td>
                                 <td>
                                    <select name="wwtp_users" id="wwtp_users" class="form-control" required>
                                        <option value="">Pilih WWTP</option>
                                    </select>
                                </td>
                             </tr>
                             <!-- <tr>
                                 <td colspan="2"><button class="btn btn-primary float-right">Ubah Data</button></td>
                             </tr> -->
                         </table>
                         <table class="table">
                            <tbody id="content_detail_wwtp">

                            </tbody>
                         </table>
                         <table class="table">
                             <tr>
                                 <th>No</th>
                                 <th>Nama Penanggung Jawab</th>
                                 <th>Email</th>
                                 <th>No Telepon</th>
                                 <th>Level</th>
                             </tr>
                             <tbody id="content_user_wwtp">

                             </tbody>
                         </table>
                     </form>
                 </div>
             </div>

         </div>
     </div>
 </div>



 
 <script>
     // DATATABLE
     myDataTables()

     function myDataTables() {
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
                 "order": [
                     [1, "asc"]
                 ],
                 "ajax": {
                     url: "<?= base_url('get_datatable_data_user') ?>",
                     type: "POST",
                     data: function(d) {
                         //  d._token = "{{csrf_token()}}"
                     },

                 },
                 columns: [{
                         "width": "5%",
                         data: null,
                         "sortable": false,
                         render: function(data, type, row, meta) {
                             return meta.row + meta.settings._iDisplayStart + 1;
                         }
                     },
                     {
                         "width": "10%",
                         data: "companyName",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                         "width": "10%",
                         data: "companyAddress",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                         "width": "10%",
                         data: "companyEmail",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                         "width": "10%",
                         data: "type_industry",
                         render: $.fn.dataTable.render.text()
                     },

                     {
                         "width": "10%",
                         data: "crt_at",
                         render: $.fn.dataTable.render.text()
                     },
                     
                     {
                         "render": function(data, type, row, meta) {
                             html = `<button class="btn btn-sm btn-info btn-view"  data-id="${row.companyID }" ><i class="far fa-eye"></i> Show </button> `

                             html += `<button class="btn btn-sm btn-warning btn-edit"  data-id="${row.companyID }"><i class="far fa-edit"></i> Edit </button> `

                             //  if (row.status == "Open") {
                             html += `<button href="" class="btn btn-sm btn-success btn-konfirmasi"  id="btn-verive" data-id="${row.companyID}"<i class="far fa-trash-alt"></i> Verified</button>`

                             //  }

                             return html
                         }
                     },
                 ]
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
    //  DETAIL 
     $(document).on('click','.btn-view',function(){
         let company_id = $(this).data('id');
         let html;
         $("#wwtp_users").html("")
         $("#content_detail_wwtp").html("")
        $("#content_user_wwtp").html("")
         $.ajax({
             url:`<?= base_url('get_detailcompany')?>`,
             method:"POST",
             dataType:"json",
             data:{company_id:company_id},
             success:function(data){
                $.each(data.company_detail,function(index,val){
                    $("#nama_perusahaan").val(val.company_name)
                    $("#alamat_perusahaan").val(val.company_address)
                    $("#email_perusahaan").val(val.company_email)
                    $("#provinsi").html(`<option value="${val.provinces_id}">${val.provinces_name}</option>`)
                    $("#kabkot").html(`<option value="${val.regencies_id}">${val.regencies_name}</option>`)
                    $("#kecamatan").html(`<option value="${val.districts_id}">${val.districts_name}</option>`)
                    $("#desa").html(`<option value="${val.villages_id}">${val.villages_name}</option>`)
                    $("#kodePos").val(val.post_code)
                    $("#noTlpn").val(val.company_phone)
                    $("#jenisIndustri").val(val.type_industry)
                })
                html += `
                        <option value="">Pilih Site WWTP</option>
                    `
                $.each(data.site_wwtp,function(index,val){
                    html += `
                        <option value="${val.site_id}">${val.site_name}</option>
                    `
                })
                $("#wwtp_users").html(html)
             }

         })
         $("#modalDetailUser").modal('show')
     })
    //  EDIT 
     $(document).on('click','.btn-edit',function(){
         let company_id = $(this).data('id');
         let html;
         $.ajax({
             url:`<?= base_url('get_detailcompany')?>`,
             method:"POST",
             dataType:"json",
             data:{company_id:company_id},
             success:function(data){
                $.each(data.company_detail,function(index,val){
                    $("#nama_perusahaan").val(val.company_name)
                    $("#alamat_perusahaan").val(val.company_address)
                    $("#email_perusahaan").val(val.company_email)
                    $("#provinsi").html(`<option value="${val.provinces_id}">${val.provinces_name}</option>`)
                    $("#kabkot").html(`<option value="${val.regencies_id}">${val.regencies_name}</option>`)
                    $("#kecamatan").html(`<option value="${val.districts_id}">${val.districts_name}</option>`)
                    $("#desa").html(`<option value="${val.villages_id}">${val.villages_name}</option>`)
                    $("#kodePos").val(val.post_code)
                    $("#noTlpn").val(val.company_phone)
                    $("#jenisIndustri").val(val.type_industry)
                })
                html += `
                        <option value="">Pilih Site WWTP</option>
                    `
                $.each(data.site_wwtp,function(index,val){
                    html += `
                        <option value="${val.site_id}">${val.site_name}</option>
                    `
                })
                $("#wwtp_users").html(html)
             }

         })
         $("#modalDetailUser").modal('show')
     })
     $("#wwtp_users").on('change',function(){
         let wwtp_id = $(this).val()
        $.ajax({
             url:`<?= base_url('get_site_wwtp_user')?>`,
             method:"POST",
             dataType:"json",
             data:{wwtp_id:wwtp_id},
             success:function(data){
                 let no =1;
                 let html;
                 let html_wwtp;
                 html_wwtp +=`
                        <tr>
                            <td style="width:10px">Nama WWTP</td>
                            <td style="width:10px">:</td>
                            <td>${data[0].name_wwtp}</td>
                        </tr>
                        <tr>
                            <td style="width:10px">Alamat WWTP</td>
                            <td style="width:10px">:</td>
                            <td>${data[0].site_address}</td>
                        </tr>
                        <tr>
                            <td style="width:10px">Longitude Outlet</td>
                            <td style="width:10px">:</td>
                            <td>${data[0].longitude_outlet}</td>
                        </tr>
                        <tr>
                            <td style="width:10px">Latitude Outlet</td>
                            <td style="width:10px">:</td>
                            <td>${data[0].latitude_outlet}</td>
                        </tr>
                        <tr>
                            <td style="width:10px">Longitude outfall</td>
                            <td style="width:10px">:</td>
                            <td>${data[0].longitude_outfall}</td>
                        </tr>
                        <tr>
                            <td style="width:10px">Latitude outfall</td>
                            <td style="width:10px">:</td>
                            <td>${data[0].latitude_outfall}</td>
                        </tr>
                `
                $.each(data,function(index,value){
                   
                    html+=`
                        <tr>
                            <td>${no++}</td>
                            <td>${value.name}</td>
                            <td>${value.email}</td>
                            <td>${value.phone}</td>
                            `
                    if(value.level == 1){
                        html+=`
                                <td>Admin WWTP</td>
                            </tr>
                        `
                    }
                    else if(value.level == 2){
                        html+=`
                                <td>User WWTP</td>
                            </tr>
                        `
                    }
                })
                $("#content_detail_wwtp").html(html_wwtp)
                $("#content_user_wwtp").html(html)
             }

         })
     })
    // END DETAIL
     // DATERANGE PICKER CONTROL
     $(function() {


         var start = moment().subtract(29, 'days');
         var end = moment();

         function cb(start, end) {
             $('.reportrange span').html(start.format('DD/MM/YYYY h:mm') + ' - ' + end.format('DD/MM/YYYY h:mm'));
             $(".reportrange #start_date").val(start.format('DD/MM/YYYY h:mm'))
             $(".reportrange #end_date").val(end.format('DD/MM/YYYY h:mm'))
         }

         $('.reportrange').daterangepicker({
             startDate: start,
             endDate: end,
             timePicker: true,
             ranges: {
                 'Q1': [moment('2021-01-01T00:00:00.000').startOf('month'), moment('2021-03-01T00:00:00.000').endOf('month')],
                 'Q2': [moment('2021-04-01T00:00:00.000').startOf('month'), moment('2021-06-01T00:00:00.000').endOf('month')],
                 'Q3': [moment('2021-07-01T00:00:00.000').startOf('month'), moment('2021-09-01T00:00:00.000').endOf('month')],
                 'Q4': [moment('2021-10-01T00:00:00.000').startOf('month'), moment('2021-12-01T00:00:00.000').endOf('month')],
             }
         }, cb);

         cb(start, end);

     });
     // END DATE RANGEPICKER
     // SWEETALERT UNTUK DOWNLOAD FILE
     $(function() {
         $(".btn-nonaktif").on('click', function() {
             const swalWithBootstrapButtons = Swal.mixin({
                 customClass: {
                     confirmButton: 'btn btn-success',
                     cancelButton: 'btn btn-danger'
                 },
                 buttonsStyling: false
             })

             swalWithBootstrapButtons.fire({
                 title: 'Apakah anda ingin menonaktifkan?',
                 text: "Jika ya, mohon menunggu sebentar...",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonText: 'Ya',
                 cancelButtonText: 'Tidak',
                 reverseButtons: true
             }).then((result) => {
                 if (result.isConfirmed) {
                     swalWithBootstrapButtons.fire(
                         'Non aktif',
                         'Data berhasil di non aktifkan user ini...',
                         'success'
                     )
                 } else if (
                     /* Read more about handling dismissals below */
                     result.dismiss === Swal.DismissReason.cancel
                 ) {
                     swalWithBootstrapButtons.fire(
                         'Non Aktif',
                         'Anda telah membatalkan non aktifkan user ini...',
                         'success'
                     )
                 }
             })
         })
     })
 </script>