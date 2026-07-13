

                                
    <section>
        <h1> </h1>

<table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    <thead>
    <tr class="fw-bolder fs-6 text-gray-800 px-7">

            <th class="text-dark fw-bolder my-1 fs-3 lh-5">Officer Id</th>
            <th class="text-dark fw-bolder my-1 fs-3 lh-5 min-w-100px">Officer Name</th>
            <th class="text-dark fw-bolder my-1 fs-3 lh-5">Email</th>
            <th class="text-dark fw-bolder my-1 fs-3 lh-5">City</th>
            <th class="text-dark fw-bolder my-1 fs-3 lh-5">Position</th>
            
            <th class="text-dark fw-bolder my-1 fs-3 lh-5">Joining Date</th>

            <th class="text-dark fw-bolder my-1 fs-3 lh-5 min-w-200px">Actions</th>
           
        </tr>
    </thead>
    <tbody>
         <?php
                foreach($user as $row)
                {
              ?>   
        <tr>
            <td class="text-gray-600 fw-bold fs-6"><?php echo $row['uid']?></td>


            <td class="text-gray-600 fw-bold fs-6"> <?php echo $row['fullname'];?></td>
            <td class="text-gray-600 fw-bold fs-6"><?php echo $row['email'];?></td>
            <td class="text-gray-600 fw-bold fs-6"><?php echo $row['branch'];?></td>
             
            <td class="text-gray-600 fw-bold fs-6"><?php echo $row['position'];?></td>
            <td class="text-gray-600 fw-bold fs-6"><?php echo $row['joining_date'];?></td>           
    <td>
    <ul class="list-inline m-0">

    <li class="list-inline-item">
    <a href="<?= base_url('update_emp/'.$row['uid'])?>"><button class="up btn btn-success btn-sm rounded-30" type="button" data-toggle="tooltip" data-placement="top" title="Update Employee"><i class="fa fa-edit"></i></button>
    </a></li>
    <li class="list-inline-item">
    <button class="cd btn btn-danger btn-sm rounded-30" value="<?= $row['uid'];?>" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
    </li>
    <li class="list-inline-item">

    </li>


    </ul> 
                    </td>
        
    </tr>
            <?php 
                        }
                
                ?>
            
        </tbody>      
</table>


    </section>

    



    <script src="<?php echo base_url('assets/plugins/custom/datatables/datatables.bundle.js')  ?> "></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  


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





    <script>
        function togglestatus(id){

            var id = id;
            
            new  swal({
                        title: "Are you sure?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                        type: "post",
                        data: {"bid": id},
                        url: "<?= base_url('stspdate') ?>",
                        dataType: "JSON",
                                success: function(Response){
                                if(Response.success==true){
                                            new  swal({
                                            title: Response.status ,
                                            text: Response.status.text,
                                            icon: Response.status.icon,
                                            button: "ok",
                                        }).then((confirmed) => {
                                            

                                        });
                                }
                            }

                            });

                        } else {
                            swal("You have canceled");
                        }
                    });

            
            


            }
    </script>


    <script type="text/javascript">  
        
        $('.cd').click(function (e){
                e.preventDefault();
                var std_id = $(this).val(); 

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
                                        data: {"bid": std_id},
                                        url: "<?= base_url('Home/delete_employee') ?>",
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

            });

    </script>


	