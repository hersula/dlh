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
                         <h3 class="mb-0">Validasi User WWTP</h3>
                         <p class="text-sm mb-0">
                             Halaman ini untuk memvalidasi data pendaftaran dari industri.
                         </p>
                         <?= view('Myth\Auth\Views\_message_block') ?>
                     </div>

                     <div class="table-responsive containter-table">
                         <table class="table table-flush" id="datatable">
                             <thead class="thead-light">
                                 <tr>
                                     <th>No</th>
                                     <th>Nama Industri </th>
                                     <th>Nama WWTP </th>
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
                 <form id="pendaftaran-wwtp" method="POST" action="<?= base_url("admin/edit-validasi-pendaftaran"); ?>">
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
                     url: "<?= base_url('admin/get-validasi-wwtp') ?>",
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
                         data: "company_name",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                        "width": "10%",
                         data: "name",
                         render: $.fn.dataTable.render.text()
                     },
                     
                     {
                         "width": "10%",
                         data: "crt_at",
                         render: $.fn.dataTable.render.text()
                     },
                     {
                        "width": "5%",
                         "render": function(data, type, row, meta) {
                             return html = `<div class='badge badge-${row.badge}'>${row.status}</div>`
                         }
                     },
                     {
                         "render": function(data, type, row, meta) {
                             html = `<button class="btn btn-sm btn-info btn-view"  data-id="${row.siteWWTPID }" ><i class="far fa-eye"></i> Show </button> `

                             html += `<button class="btn btn-sm btn-warning btn-edit"  data-id="${row.siteWWTPID }"><i class="far fa-edit"></i> Edit </button> `

                            //  if (row.status == "Open") {
                                 html += `<button href="" class="btn btn-sm btn-success btn-konfirmasi"  id="btn-verive" data-id="${row.siteWWTPID}"<i class="far fa-trash-alt"></i> Verified</button>`

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

     $(document).on('click','button#btn-verive',function(){
        let siteWWTPID = $(this).data('id');
        console.log(siteWWTPID);
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
                    $.get( `<?= base_url('admin/confrim-wwtp') ?>/${siteWWTPID}` ).then((data)=> {
                        console.log(data);
                       data = JSON.parse(data);
                       if(data.msg == "success") {
                           swalWithBootstrapButtons.fire(
                               'Berhasil...',
                               'User Site WWTP Ini Berhasil Divalidasi',
                               'success'
                           )
                       }
                       else {
                        swalWithBootstrapButtons.fire(
                               'Gagal...',
                               'User Site WWTP Ini Gagal Divalidasi',
                               'success'
                           )
                       }
                    })
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

     function _parameter(id, name, minimum = 0, maximum = 0, disabled = "", show = "block")
    {
        let html = `
        <tr>
        <td>
        ${name}
        <input type="hidden" name="parameter_id[]" value="${id}" disabled/>
        <input type="hidden" name="parameter_name[]" value="${name}" disabled/>
        </td>
        <td><input type="text" class="form-control" placeholder="Minimum" name="minimum[]" value="${minimum}" AutoComplete="off" required ${disabled}></td>
        <td><input type="text" class="form-control" placeholder="Maximum" name="maximum[]" value="${maximum}" AutoComplete="off" required ${disabled}></td>
        <td><button type="button" class="d-${show} btn badge badge-danger btn-nonaktif-parameter" data-id="${id}">X</button></td>
        </tr>
        `;
        
        return html;
    }

    function _penanggung_jawab(id, nama, email, disabled = "", show = "block")
    {
        let html    = `
        <tr>
        <td>${nama} <input type="hidden" name="penanggung_jawab[]" value="${id}" />
        <input type="hidden" name="nama_penanggung_jawab[]" value="${nama}" ${disabled}/>
        <input type="hidden" name="email_penanggung_jawab[]" value="${email}" ${disabled}/>
        </td>
        <td>${email}</td>
        <td><span class="badge badge-success">Aktif</span></td>
        <td><button type="button" data-id="${id}" class="d-${show} btn badge badge-danger btn-nonaktif-users">X</button></td>
        </tr>
        `;
        return html;
    }

    function _surat(jenis_surat, id = "", no_ijin = "", tgl_ijin = "", instansi = "", tgl_terbit = "", tgl_berakhir = "", disabled = "", show = "block")
    {
        let html    = `
        <tr>
        <td><p>Surat ${jenis_surat}</p><input type="hidden" name="id[]" value="${id}" ${disabled}/><input type="hidden" name="jenis_surat[]" value="${jenis_surat}" ${disabled}/></td>
        <td><input type="file" name="file[]" class="input-min-width" ${disabled}/></td> 
        <td><input type="text" name="no_ijin[]" value="${no_ijin}" class="form-control input-min-width" AutoComplete="off" required ${disabled} /></td> 
        <td><input type="text" name="tgl_ijin[]" value="${tgl_ijin}" class="form-control datepicker1 input-min-width" AutoComplete="off" required ${disabled} /></td> 
        <td><input type="text" name="instansi[]" value="${instansi}" class="form-control input-min-width" AutoComplete="off" required ${disabled} /></td>
        <td><input type="text" name="tgl_terbit[]" value="${tgl_terbit}" class="form-control datepicker1 input-min-width" AutoComplete="off" required ${disabled} /></td> 
        <td><input type="text" name="tgl_berakhir[]" value="${tgl_berakhir}" class="form-control datepicker1 input-min-width" AutoComplete="off" required ${disabled} /></td> 
        <td><span class="badge badge-danger">Menunggu Validasi</span> </td>
        <td><button type="button" class="d-${show} btn badge badge-danger btn-nonaktif-surat">X</button></td>
        </tr>
        `;

        return html;
    }

    // show site wwtp
    $(document).on("click", "button.btn-view", function(){
        let siteWWTPID = $(this).data("id");

        get_all_titik_penaatan(siteWWTPID, "disabled", "none");

        $("#modalUserWWTP input").prop("disabled", true);
        $("#modalUserWWTP select").prop("disabled", true);
        $("#modalUserWWTP textarea").prop("disabled", true);
        $("#modalUserWWTP button").hide();

        di_update = true;
        $("#modalUserWWTP").modal("show");
    })

    // edit site wwtp
    $(document).on("click", "button.btn-edit", function(){
        let siteWWTPID = $(this).data("id");

        get_all_titik_penaatan(siteWWTPID);

        $("#modalUserWWTP input").prop("disabled", false);
        $("#modalUserWWTP select").prop("disabled", false);
        $("#modalUserWWTP textarea").prop("disabled", false);
        $("#modalUserWWTP button").show();

        $("#action-wwtp").removeClass( "btn-primary" );
        $("#action-wwtp").text("Update WWTP").addClass( "btn-warning" );
        
        di_update = true;
        
        $("#pendaftaran-wwtp").attr('action', "<?= base_url("admin/edit_titik_penaatan");?>");

        $("#modalUserWWTP").modal("show");
    })

    // add site wwtp
    $("button.btn-add").click(function(){
        let html = '';
        
        $('select[name=nama_pengguna] option').show();
        $('input.check-parameter').show();
        $('#pendaftaran-wwtp')[0].reset();
        $("#modalUserWWTP input").prop("disabled", false);
        $("#modalUserWWTP select").prop("disabled", false);
        $("#modalUserWWTP textarea").prop("disabled", false);
        $("#modalUserWWTP button").show();
        $("#action-wwtp").removeClass( "btn-warning" );
        $("#action-wwtp").text("Tambah WWTP").addClass( "btn-primary" );

        if(di_update){

            html = `<tr id="target-remove-parameter"><td colspan="4" class="text-center text-danger">Pilih Parameter yang akan digunakan!</td></tr>`;
            $("tbody#target-parameter").empty();
            $("tbody#target-parameter").html(html);

            html = `<tr id="target-remove-user"><td colspan="4" class="text-center text-danger">Pilih Penanggung Jawab WWTP!</td></tr>`;
            $("tbody#target-users").empty();
            $("tbody#target-users").append(html);

            html = ` <tr id="target-remove-surat"><td colspan="9" class="text-center text-danger">Tambahkan Dokumen Pendukung!</td></tr>`;

            $("tbody#target-surat").empty();
            $("tbody#target-surat").append(html);

            di_update = false;
        }

        $("#pendaftaran-wwtp").attr('action', "<?= base_url("admin/add_titik_penaatan");?>");

        $("#modalUserWWTP").modal("show");
    });

    // get titik penataan
    function get_all_titik_penaatan(siteWWTPID, disabled = "", show="block") {
         let html = "";
         $.ajax({
             url: "<?= base_url("admin/get_all_titik_penaatan") ?>",
             type: "POST",
             dataType: "json",
             data: {
                "siteWWTPID" : siteWWTPID,
             },
             success: function(data) {
                console.log(data);
                let html = '';
                // site wwtp
                $("input[name=name]").val(data['site_wwtp']['name']);
                $("textarea[name=address]").val(data['site_wwtp']['address']);
                $("select[name=typeReportID]").val(data['site_wwtp']['typeReportID']);
                $("input[name=longitude]").val(data['site_wwtp']['longitude']);
                $("input[name=latitude]").val(data['site_wwtp']['latitude']);

                // parameter
                for(let i =0; i < data['logger_detail'].length; i++) {
                    html += _parameter(data['logger_detail'][i]['parameterID'], data['logger_detail'][i]['parameter'], data['logger_detail'][i]['min'], data['logger_detail'][i]['max'], disabled, show);
                };
                
                $("tbody#target-parameter").empty();
                $("tbody#target-parameter").append(html);
                
                html = '';
                // penanggung jawab
                for(let i =0; i < data['penanggung_jawab'].length; i++) {
                    html += _penanggung_jawab(data['penanggung_jawab'][i]['id'], data['penanggung_jawab'][i]['name'], data['penanggung_jawab'][i]['email'], disabled, show);
                }

                $("tbody#target-users").empty();
                $("tbody#target-users").append(html);
                
                html = '';
                // surat pendukung
                for(let i =0; i < data['surat_pendukung'].length; i++) {
                    html += _surat(data['surat_pendukung'][i]['typeLetterID'], data['surat_pendukung'][i]['supportDocumentsID'], data['surat_pendukung'][i]['no_ijin'], parse_date(data['surat_pendukung'][i]['tgl_ijin']), data['surat_pendukung'][i]['instansi'], parse_date(data['surat_pendukung'][i]['tgl_terbit']), parse_date(data['surat_pendukung'][i]['tgl_berakhir']), disabled, show);
                    
                }

                $("tbody#target-surat").empty();
                $("tbody#target-surat").append(html);
             },

         });
     };

    //function parse date JS
    function parse_date(date){
        var monthNames = [
            "Jan", "Feb", "Mar",
            "Apr", "May", "Jun", "Jul",
            "August", "Sept", "Oct",
            "Nov", "Dec"
        ];
        var d = new Date(date);
        var day = d.getDate();
        var monthIndex = d.getMonth();
        var year = d.getFullYear();
        
        return day + ' ' + monthNames[monthIndex] + ' ' + year;
    };
 </script>