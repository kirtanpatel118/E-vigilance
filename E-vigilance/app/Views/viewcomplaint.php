<ul class="nav nav-tabs nav-pills border-0 nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
   
</ul>

<div class="tab-content" id="myTabContent">

    <div id="kt_vtab_pane_1" class="tab-pane fade show active" role="tabpanel">
        <section>

            <table id="kt_datatable_example_1" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                <thead>
                <tr class="fw-bolder fs-6 text-gray-800 px-7">

                        <th class="text-dark fw-bolder my-1 fs-3 lh-5">Complaint Id</th>
                        <th class="text-dark fw-bolder my-1 fs-3 lh-5 min-w-100px">Complaint</th>
                        <th class="text-dark fw-bolder my-1 fs-3 lh-5">User name</th>
                        <th class="text-dark fw-bolder my-1 fs-3 lh-5">City</th>
                        <th class="text-dark fw-bolder my-1 fs-3 lh-5 min-w-100px">Photos</th>
                    </tr>
                </thead>
                <tbody>
         <?php
                foreach($hwddata as $row)
                {
              ?>   
        <tr>
            <td class="text-gray-600 fw-bold fs-6"><?php echo $row['complaint_id']?></td>


            <td class="text-gray-600 fw-bold fs-6"> <?php echo $row['complaint'];?></td>
            <td class="text-gray-600 fw-bold fs-6"><?php echo $row['username'];?></td>
            <td class="text-gray-600 fw-bold fs-6"><?php echo $row['city'];?></td>
            <td class="text-gray-600 fw-bold fs-6"><?php echo $row['photo'];?></td>          
    
        </tr>
            <?php 
                        }
                
                ?>
            
        </tbody>      
            </table>


        </section>
    </div>

</div>


    <script type="text/javascript">
        $("#kt_datatable_example_1").DataTable({
        "language": {
        "lengthMenu": "Show _MENU_",
        },
        "dom":
        "<'row'" +
        "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
        "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
        ">" +

        "<'table-responsive'tr>" +

        "<'row'" +
        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
        ">"
        });
    </script>

    <script type="text/javascript">
        $("#kt_datatable_example_2").DataTable({
        "language": {
        "lengthMenu": "Show _MENU_",
        },
        "dom":
        "<'row'" +
        "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
        "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
        ">" +

        "<'table-responsive'tr>" +

        "<'row'" +
        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
        ">"
        });
    </script>



    <script type="text/javascript">
        $("#kt_datatable_example_3").DataTable({
        "language": {
        "lengthMenu": "Show _MENU_",
        },
        "dom":
        "<'row'" +
        "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
        "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
        ">" +

        "<'table-responsive'tr>" +

        "<'row'" +
        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
        ">"
        });
    </script>


    <script type="text/javascript">
        $("#kt_datatable_example_4").DataTable({
        "language": {
        "lengthMenu": "Show _MENU_",
        },
        "dom":
        "<'row'" +
        "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
        "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
        ">" +

        "<'table-responsive'tr>" +

        "<'row'" +
        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
        ">"
        });
    </script>


    <script type="text/javascript">
        $("#kt_datatable_example_5").DataTable({
        "language": {
        "lengthMenu": "Show _MENU_",
        },
        "dom":
        "<'row'" +
        "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
        "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
        ">" +

        "<'table-responsive'tr>" +

        "<'row'" +
        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
        ">"
        });
    </script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script type="text/javascript">  
        
            function deletefun(id){
                var std_id = id;

            new  swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                        type: "post",
                                        data: {"hardware_id": std_id},
                                        url: "<?= base_url('delete_hardware') ?>",
                                        dataType: "JSON",
                                                success: function(Response){
                                                new  swal({
                                                            title: Response.status ,
                                                            text: Response.status.text,
                                                            icon: Response.status.icon,
                                                            button: "ok",
                                                        }).then((confirmed) => {
                                                            window.location.reload();

                                                        });
                                                }

                                     });
                            
                        } else {
                            swal("You have canceled");
                        }
                    });

            };

    </script>