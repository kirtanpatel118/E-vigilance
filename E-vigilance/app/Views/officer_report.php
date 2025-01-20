<h1>Officer Report</h1>                         
                                <div class="row mb-5">
                                            <div class="col-md-3 fv-row">
													<label class="text-dark fw-bolder text-hover-primary fs-6">
														<span class="">Select City</span>
													</label>

													<select name="Branch" id="Branch" data-control="select2" data-placeholder="Select a Branch..." class="form-select form-select-solid">
														<option></option>
														<option value="ahmedabad">Ahmedabad</option>
														<option value="rajkot">Rajkot</option>


													</select>
                                                </div>

                                        </div>                                           

        <div id="kt_vtab_pane_1" class="tab-pane fade show active" role="tabpanel">
            <section>

                <table id="kt_datatable_example_1" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                    <thead>
                    <tr class="fw-bolder fs-6 text-gray-800 px-7">

                            <th >Officer Id</th>
                            <th >Officer Name</th>
                            <th >Email</th>
                            <th >City</th>
                            <th >Position</th>
                            <th >Joining Date</th>
                           
                        
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
                        foreach($sql as $row => $val)
                        {
                    ?>
                
                        <tr>
                            <td class="text-gray-600 fw-bold fs-6"><?php echo $val['uid'];?></td>
                            <td class="text-gray-600 fw-bold fs-6"><?php echo $val['fullname'];?></td>
                            <td class="text-gray-600 fw-bold fs-6"><?php echo $val['email'];?></td>
                            <td class="text-gray-600 fw-bold fs-6"><?php echo $val['branch'];?></td>
                            <td class="text-gray-600 fw-bold fs-6"><?php echo $val['position'];?></td>
                            <td class="text-gray-600 fw-bold fs-6"><?php echo $val['joining_date'];?></td>

                        </tr>
                    <?php 
                        } 
                
                    ?>

                            
                        </tbody>      
                </table>


            </section>
        </div>




    <script type="text/javascript">
        var dt =  $("#kt_datatable_example_1").DataTable({
            "scrollX": true,
            "language": {
            "lengthMenu": "Show _MENU_",
            },

            dom: 'Bfrtip',
            buttons: [
                {extend: 'csv',exportOptions: {columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19]}},
            ],
            
            });
    </script>



    <script>

        $('#employee').change(function () {
                var value1 = $('#employee').val();
                dt.columns([0]).search(value1).draw();
                            
        });

        $('#Branch').change(function () {
                var value1 = $('#Branch').val();
                dt.columns([2]).search(value1).draw();
                            
        });

        var  minDate, maxDate;
        minDate = new DateTime($('#Srtdate'), {
            format: 'DD-MM-YYYY'
        });
        maxDate = new DateTime($('#enddate'), {
            format: 'DD-MM-YYYY'
        });
        
        $('#Srtdate, #enddate').on('changeDate', function () {
            dt.draw();
        });
        $.fn.DataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[7] );

                if (
                    ( min == null && max == null ) ||
                    ( min == null && date <= max ) ||
                    ( min <= date   && max === null ) ||
                    ( min <= date   && date <= max )
                ) 
                {
                    return true;
                }
                return false;
            }
        );

    </script>



    <script>
        $('#resetbtn2').click(function () {
                var value2 = $(this).val();
                dt.columns().search(value2).draw();
                $('#employee option:selected').val();
                $('#Srtdate').val('');
                $('#enddate').val('');
            });
    </script>
