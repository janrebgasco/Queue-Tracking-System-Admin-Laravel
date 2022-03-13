@extends('layouts.app')

@section('content')
<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
<!-- MAIN -->
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-users"></i> Employee</h3>
						</div>
						<div class="panel-body">
							<div class="row">
						<div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="table-responsive">
									<table class="table table-hover">
                                        <thead>
                                            <tr>
                                            <th>Username</th>
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Counter</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            function base64_to_jpeg($base64_string, $output_file) {
                                                $ifp = fopen( $output_file, 'wb' ); 

                                                $data = explode( ',', $base64_string );

                                                fwrite( $ifp, base64_decode( $data[ 0 ] ) );

                                                fclose( $ifp ); 

                                                return $output_file; 
                                            }
                                        ?>
                                            @if($employeesReference > 0)
                                                @foreach ($employeesReference as $key => $employeeData) 
                                                <tr>
                                                    <td class="unameTD">{{ $employeeData['rawUname']; }}</td> 
                                                    <td class="fullnameTD">{{ $employeeData['fullname']; }}</td> 
                                                    <td class="addressTD">{{ $employeeData['address']; }}</td>
                                                    <td class="contactNumTD">{{ $employeeData['contactNum']; }}</td>
                                                    <td class="emailTD">{{ $employeeData['email']; }}</td>
                                                    <td class="counterTD">{{ $employeeData['counter']; }}</td> 
                                                    <td class="imguser">
                                                        <img style="display:block;" height=70 width=70  src="
                                                        <?php 
                                                            if(isset($employeeData['userImg'])){
                                                                echo base64_to_jpeg($employeeData['userImg'],'user.png'); 
                                                            }
                                                            else{
                                                                //echo "https://lh3.googleusercontent.com/proxy/mhsttCBUu90__hKxhjFkiyJdUy7ZQkWdt34ay4XMzyGUioyqbvkVYolb8iXEXQJyGJD0y3__wUMYDw1pF0nQKAqgWR-wjPU_qlijlTEd-S5yeck321321";
                                                            }
                                                        ?>" />
                                                    </td>
                                                    <td><button type='button' class='btn btn-primary btn-circle' data-toggle='modal' data-target='#edit'><i  class='bi bi-pencil'></i>  Update</button> 
                                                    <button type='button' class='btn btn-danger' data-toggle='modal'  data-target='#delete'><i  class='bi bi-trash'></i>Delete</button></td>
                                                
                                                </tr>
                                                @endforeach 
                                            @else
                                                <tr class="text-center">
                                                    <td colspan="6">No Counters yet</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                <div id="edit" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                            <form id="updateEmployeeForm" method='POST' action="/process">
                                            @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                    <div class="col-lg-12">
                            <div class="sparkline9-list shadow-reset">
                                <div class="sparkline9-hd">
                                    <div class="main-sparkline9-hd">
                                        <h1>Update Employee <span class="basic-ds-n"></span></h1>
                                        
                                    </div>
                                </div>
                                <div class="sparkline9-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="basic-login-inner">
                                                    
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <label class="login2">ID : </label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" class="form-control" placeholder="User ID" name="Uname" id = "unameID" readonly/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <label class="login2">Fullname : </label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" class="form-control" placeholder="Enter Fullname" name="fullname" id="fullnameID"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <label class="login2">Address : </label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" class="form-control" placeholder="Enter Address" name="address" id="addressID"  required="" minlength="5"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <label class="login2">Contact Number : </label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="tel" pattern="[0-9]{11}" class="form-control" placeholder="Enter Contact No." name="contactNum" id="contactNumID" required minlength="9"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <label class="login2">Email : </label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" class="form-control" placeholder="Enter Email" name="email" id="emailID"  required minlength="6" />
                                                                </div>
                                                            </div>
                                                        </div>        
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <label class="login2">Counter : </label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" class="form-control" placeholder="Enter Counter" name="counter" id="counterID"/>
                                                                </div>
                                                            </div>
                                                        </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer footer-modal-admin">
                    <a data-dismiss="modal" href="#">Cancel</a>
                            <a id="btnUpdateStaff" href="javascript:$('#updateEmployeeForm').submit();">Save</a>
                            <script>
                                var form2 = document.getElementById('updateStaffForm')
                                    document.getElementById('btnUpdateStaff').onclick = function() {
                                        form2.reportValidity()
                                        if (document.getElementById('cp1').value != document.getElementById('updatePassword').value) {
                                            alert ("Password does not match. Please try again.")
                                            return false;
                                        }
                                        else if($("#updateUsername").val().trim().length > 5 && 
                                            $("#updatePassword").val().trim().length > 5 && 
                                            $("#updateFullname").val().trim().length > 1){
                                            document.getElementById('updateStaffForm').submit();
                                        }
                                    }
                            </script>
                                </div>
                                    </form>
                                    </div>
                                </div>
                            </div>


                            <!-- delete employee -->
                            <div id="delete" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                            <form id="deleteEmployeeForm" method='POST' action="/deleteEmp">
                                            @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                    <div class="col-lg-12">
                            <div class="sparkline9-list shadow-reset">
                                <div class="sparkline9-hd">
                                    <div class="main-sparkline9-hd">
                                        <h1>Confirm Employee Deletion <span class="basic-ds-n"></span></h1>
                                        
                                    </div>
                                </div>
                                <div class="sparkline9-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="basic-login-inner">
                                                    
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <label class="login2">Username : </label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" class="form-control" placeholder="Username" name="Uname" id = "unameID2" readonly/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                      
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer footer-modal-admin">
                    <a data-dismiss="modal" href="#">Cancel</a>
                            <a id="btnUpdateStaff" href="javascript:$('#deleteEmployeeForm').submit();">Delete</a>
                            
                                </div>
                                    </form>
                                    </div>
                                </div>
                            </div>


                                    </div>
							</div>
							<!-- END TABLE HOVER -->
						</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
        <?php
        
        if(isset($_POST['updateEmployeeForm'])){
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $contactNum = $_POST['contactNum'];
            $email = $_POST['email'];
            $counter = $_POST['counter'];

            $database->getReference('config/website')
            ->set([
                'name' => 'My Application',
                'emails' => [
                    'support' => 'support@domain.tld',
                    'sales' => 'sales@domain.tld',
                ],
                'website' => 'https://app.domain.tld',
                ]);

            $database->getReference('config/website/name')->set('New name');
            
        }
        

        ?>
    <script>
        $(function () {
                // ON SELECTING ROW
                $(".btn.btn-primary.btn-circle").click(function () {
                //FINDING ELEMENTS OF ROWS AND STORING THEM IN VARIABLES
                    var uname = $(this).parents("tr").find(".unameTD").text();
                    var fullname = $(this).parents("tr").find(".fullnameTD").text();
                    var address = $(this).parents("tr").find(".addressTD").text();
                    var contactNum = $(this).parents("tr").find(".contactNumTD").text();
                    var email = $(this).parents("tr").find(".emailTD").text();
                    var counter = $(this).parents("tr").find(".counterTD").text();

                    
                    document.getElementById("unameID").value = uname;
                    document.getElementById("fullnameID").value = fullname;
                    document.getElementById("addressID").value = address;
                    document.getElementById("contactNumID").value = contactNum;
                    document.getElementById("emailID").value = email;
                    document.getElementById("counterID").value = counter;
                });
            });
            $(function () {
                // ON SELECTING ROW
                $(".btn.btn-danger").click(function () {
                //FINDING ELEMENTS OF ROWS AND STORING THEM IN VARIABLES
                    var uname = $(this).parents("tr").find(".unameTD").text();

                    document.getElementById("unameID2").value = uname;
                });
            });
            
            
    </script>
@endsection
