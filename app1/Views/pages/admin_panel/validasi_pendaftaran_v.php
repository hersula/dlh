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
                         <h3 class="mb-0">Validasi Pendaftaran</h3>
                         <p class="text-sm mb-0">
                             Halaman ini untuk memvalidasi data pendaftaran dari industri.
                         </p>
                         <?= view('Myth\Auth\Views\_message_block') ?>
                     </div>

                     <div class="table-responsive py-4">
                         <table class="table table-flush" id="datatable">
                             <thead class="thead-light">
                                 <tr>
                                     <th>No</th>
                                     <th>Nama Industri </th>
                                     <th>Alamat Industri </th>
                                     <th>No Telepon Industri </th>
                                     <th>Email </th>
                                     <th>Nama Penanggung Jawab </th>
                                     <th>Position </th>
                                     <th>Tanggal Pendaftaran</th>
                                     <th>Status</th>
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

 <!-- MODAL DETAIL INDUSTRI -->
 <div class="modal fade" id="modalDetailUserIndustri" tabindex="-1" role="dialog" aria-labelledby="modalDetailUserIndustriLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalDetailUserIndustriLabel">Detail Pendaftaran</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="POST" action="<?= base_url("admin/edit-validasi-pendaftaran"); ?>">
                     <div class="content">
                         <table id="informasi_perusahaan" class="table"></table>
                         <br>
                         <div class="table-responsive">
                             <table class="table">
                                 <tr>
                                     <th colspan="9">
                                         <h3>Informasi Akun Admin Industri </h3>
                                     </th>
                                 </tr>
                             </table>
                             <table id="informasi_penanggung_jawab" class="table"></table>
                         </div>
                         <div id="target-action" class="float-right"></div>
                     </div>
                 </form>
             </div>

         </div>
     </div>
 </div>
 <!-- END MODAL DETAIL INDUSTRI -->

 <script>
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
                     url: "<?= base_url('admin/get-validasi-pendaftaran') ?>",
                     type: "POST",
                     data: function(d) {
                         //  d._token = "{{csrf_token()}}"
                     },

                 },
                 columns: [{
                         data: null,
                         "sortable": false,
                         render: function(data, type, row, meta) {
                             return meta.row + meta.settings._iDisplayStart + 1;
                         }
                     },
                     {
                         data: "company_name",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                         data: "company_address",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                         data: "company_phone",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                         data: "email",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                         data: "name",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                         data: "position",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                         data: "crt_at",
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

         table.on('order.dt search.dt', function() {
             table.column(0, {
                 search: 'applied',
                 order: 'applied'
             }).nodes().each(function(cell, i) {
                 cell.innerHTML = i + 1;
             });
         }).draw();

         $(".dataTables_filter input")
             .off()
             .on('keyup change', function(e) {
                 if (e.keyCode == 13 || this.value == "") {
                     table.search(this.value)
                         .draw();
                 }
             });

     }

     $(document).on('click', 'button.btn-view', function() {
         let registration_id = $(this).data('id');

         get_registration_detail(registration_id, "disabled");


         $("div#target-action").html("");

         $("#modalDetailUserIndustri").modal("show");
     });

     $(document).on('click', 'button.btn-edit', function() {
         let registration_id = $(this).data('id');

         get_registration_detail(registration_id);

         $("div#target-action").html(`<button id="submit_edit" class="btn btn-warning">Update</button>`);

         $("#modalDetailUserIndustri").modal("show");
     });

     function get_registration_detail(registration_id, disabled = "") {
         let html = "";
         $.ajax({
             url: "<?= base_url("admin/get-detail-validasi-pendaftaran") ?>",
             type: "POST",
             dataType: "json",
             data: {
                 "registration_id": registration_id
             },
             success: function(data) {
                 console.log(data);
                 html = `
                        <tr>
                             <th colspan="3">
                                 <h3 class="fw-bold"> Informasi Perusahaan</h3>
                             </th>
                         </tr>
                         <tr>
                             <td class="w-10px">Nama Perusahaan</td>
                             <td class="w-10px">:</td>
                             <td>
                             <input type="hidden" name="registration_id" value="${data.registration_id}" ${disabled} />
                             <input type="text" name="company_name" class="form-control" value="${data.company_name}"  ${disabled}/>
                             </td>
                         </tr>
                         <tr>
                             <td>Alamat Perusahaan</td>
                             <td>:</td>
                             <td><input type="text" name="company_address" class="form-control" value="${data.company_address}" ${disabled}/></td>
                         </tr>
                         <tr>
                             <td>Email Perusahaan</td>
                             <td>:</td>
                             <td><input type="text" name="company_email" class="form-control" value="${data.company_email}" ${disabled}/></td>
                         </tr>
                         <tr>
                             <td>Provinsi</td>
                             <td>:</td>
                             <td><input type="text" name="provinces_id" class="form-control" value="${data.provinces_id}" ${disabled}/></td>
                         </tr>
                         <tr>
                             <td>Kabkot</td>
                             <td>:</td>
                             <td><input type="text" name="regencies_id" class="form-control" value="${data.regencies_id}" ${disabled}/></td>
                         </tr>
                         <tr>
                             <td>Kecamatan</td>
                             <td>:</td>
                             <td><input type="text" name="districts_id" class="form-control" value="${data.districts_id}" ${disabled}/></td>
                         </tr>
                         <tr>
                             <td>Desa</td>
                             <td>:</td>
                             <td><input type="text" name="villages_id" class="form-control" value="${data.villages_id}" ${disabled}/></td>
                         </tr>
                         <tr>
                             <td>Kode pos</td>
                             <td>:</td>
                             <td><input type="text" name="post_code" class="form-control" value="${data.post_code}" ${disabled}/></td>
                         </tr>
                         <tr>
                             <td>No Telepon</td>
                             <td>:</td>
                             <td><input type="text" name="company_phone" class="form-control" value="${data.company_phone}" ${disabled}/></td>
                         </tr>
                         <tr>
                             <td>Jenis Industri</td>
                             <td>:</td>
                             <td><input type="text" name="type_industry" class="form-control" value="${data.type_industry}" ${disabled}/></td>
                         </tr>
                        `

                 $("table#informasi_perusahaan").html(html);
                 html = `
                            <tr>
                                 <td class="w-10px">Nama Pengguna</td>
                                 <td class="w-10px">:</td>
                                 <td colspan="7"><input type="text" name="name" class="form-control" value="${data.name}" ${disabled}/></td>
                             </tr>
                             <tr>
                                 <td>Jabatan</td>
                                 <td>:</td>
                                 <td colspan="7"><input type="text" name="position" class="form-control" value="${data.position}" ${disabled}/></td>
                             </tr>
                             <tr>
                                 <td class="w-10px">User Name</td>
                                 <td class="w-10px">:</td>
                                 <td colspan="7"><input type="text" name="user_name" class="form-control" value="${data.user_name}" ${disabled}/></td>
                             </tr>
                             <tr>
                                 <td>Email</td>
                                 <td>:</td>
                                 <td colspan="7"><input type="text" name="email" class="form-control" value="${data.email}" ${disabled}/></td>
                             </tr>
                             <tr>
                                 <td>No Telepon</td>
                                 <td>:</td>
                                 <td colspan="7"><input type="text" name="phone" class="form-control" value="${data.phone}" ${disabled}/></td>
                             </tr>
                    `

                 $("table#informasi_penanggung_jawab").html(html);
             },

         })
     }

     $(document).on('click','button#btn-verive',function(){
         let registration_id = $(this).attr('data-id')
        $.ajax({
            url:`<?= base_url('admin/verive-pendaftaran')?>`,
            type:"POST",
            data:{registration_id:registration_id},
            success: function(data){
                data = JSON.parse(data);
                if(data.status == 400)
                {
                    alert(data.msg)
                    location.reload()
                }
                else {
                    alert(data.msg)
                    location.reload()
                }
            }
            
        })
     })
     // SWEETALERT UNTUK DOWNLOAD FILE
     $(function() {
         $(".btn-validasi").on('click', function() {
             const swalWithBootstrapButtons = Swal.mixin({
                 customClass: {
                     confirmButton: 'btn btn-success',
                     cancelButton: 'btn btn-danger'
                 },
                 buttonsStyling: false
             })

             swalWithBootstrapButtons.fire({
                 title: 'Apakah anda ingin setujui pendaftaran ini?',
                 text: "Jika ya, mohon menunggu sebentar...",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonText: 'Setujui',
                 cancelButtonText: 'Tolak',
                 reverseButtons: true
             }).then((result) => {
                 if (result.isConfirmed) {
                     swalWithBootstrapButtons.fire(
                         'Berhasil...',
                         'Pendaftaran ini berhasil di setujui...',
                         'success'
                     )
                 } else if (
                     /* Read more about handling dismissals below */
                     result.dismiss === Swal.DismissReason.cancel
                 ) {
                     swalWithBootstrapButtons.fire({
                         title: 'Alasan pendaftaran ini ditolak ?',
                         input: 'text',
                         inputAttributes: {
                             autocapitalize: 'off'
                         },
                         showCancelButton: true,
                         confirmButtonText: 'Submit',
                         showLoaderOnConfirm: true,
                         preConfirm: (login) => {
                             return fetch(`//api.github.com/users/${login}`)
                                 .then(response => {
                                     if (!response.ok) {
                                         throw new Error(response.statusText)
                                     }
                                     return response.json()
                                 })
                                 .catch(error => {
                                     Swal.showValidationMessage(
                                         `Request failed: ${error}`
                                     )
                                 })
                         },
                         allowOutsideClick: () => !Swal.isLoading()
                     }).then((result) => {
                         if (result.isConfirmed) {
                             Swal.fire({
                                 title: `${result.value.login}'s avatar`,
                                 imageUrl: result.value.avatar_url
                             })
                         }
                     })
                 }
             })
         })
     })
 </script>