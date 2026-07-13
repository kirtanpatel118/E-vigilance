<h1>Complaint Report</h1>
                                <div class="row mb-5">
                                                <div class="col-md-3 fv-row">
													<label class="text-dark fw-bolder text-hover-primary fs-6">
														<span class="">Select City</span>
													</label>
												    <select name="hwdtype" id="hwdtype" data-control="select2" data-placeholder="Select a Hardware Type..." class="form-select form-select-solid">
														<option></option>
                                                        <option value="laptop">Laptop</option>
														<option value="desktop">Desktop</option>
														<option value="keyboard">Keyboard</option>
														<option value="mouse">Mouse</option>
														<option value="others">Others</option>

                                                        
													</select>
                                                </div>
                                        </div>



    <div class="separator mb-8"></div>
 <section>

                <table id="kt_datatable_example_2" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                    <thead>
                    <tr class="fw-bolder fs-6 text-gray-800 px-7">

                            <th >Complaint_id</th>
                            <th >Complaint</th>
                            <th >Username</th>
                            <th >City</th>
                            <th >Photo</th>
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


    <script type="text/javascript">
        var dt =  $("#kt_datatable_example_2").DataTable({
            "scrollX": true,
            "language": {
            "lengthMenu": "Show _MENU_",
            },

            dom: 'Bfrtip',
            buttons: [
                {extend: 'csv',exportOptions: {columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16]}},
            ],
            
            });
    </script>


    <script>

        $('#hwdtype').change(function () {
                var value1 = $('#hwdtype').val();
                dt.columns([0]).search(value1).draw();
                            
        });

    </script>




    <script>
        $('#resetbtn').click(function () {
                var value2 = $(this).val();
                dt.columns().search(value2).draw();
                $('#hwdtype option:selected').val();
            });
    </script>
