@extends('layouts.app')

@section('content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg></div>
                           Member
                        </h1>
                        <div class="page-header-subtitle">Halaman untuk me-manage data member</div>
                    </div>
 
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="card">
            <div class="card-header">Master Member</div>
                <div class="card-body">

                    <button class="btn btn-primary" onclick="AddData();"> 
                        <div class="nav-link-icon"><i data-feather="archive"></i></div> &nbsp;
                        Tambah Data
                     </button>
                    <br>
                    &nbsp;
                    <table id="example">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                                <td><div class="badge bg-primary text-white rounded-pill">Full-time</div></td>
                                <td>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i data-feather="more-vertical"></i></button>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark"><i data-feather="trash-2"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                                <td>2011/07/25</td>
                                <td>$170,750</td>
                                <td><div class="badge bg-warning rounded-pill">Pending</div></td>
                                <td>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i data-feather="more-vertical"></i></button>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark"><i data-feather="trash-2"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Ashton Cox</td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td>66</td>
                                <td>2009/01/12</td>
                                <td>$86,000</td>
                                <td><div class="badge bg-secondary text-white rounded-pill">Part-time</div></td>
                                <td>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i data-feather="more-vertical"></i></button>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark"><i data-feather="trash-2"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Cedric Kelly</td>
                                <td>Senior Javascript Developer</td>
                                <td>Edinburgh</td>
                                <td>22</td>
                                <td>2012/03/29</td>
                                <td>$433,060</td>
                                <td><div class="badge bg-info rounded-pill">Contract</div></td>
                                <td>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i data-feather="more-vertical"></i></button>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark"><i data-feather="trash-2"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Airi Satou</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>33</td>
                                <td>2008/11/28</td>
                                <td>$162,700</td>
                                <td><div class="badge bg-primary text-white rounded-pill">Full-time</div></td>
                                <td>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i data-feather="more-vertical"></i></button>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark"><i data-feather="trash-2"></i></button>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" id="my-form">
                        @csrf
                        <input type="text" name="id" id="id">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Barcode</label>
                            <input class="form-control" id="barcode" name="barcode" type="text"  >
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Title</label>
                                <select class="form-control" id="title" name="title">
                                    <option value="1">Mr</option>
                                    <option value="2">Mrs</option> 
                                </select>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Member name</label>
                                <input class="form-control" id="member_name" name="member_name" type="text">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Identity Number</label>
                                <input class="form-control" id="id_number" name="id_number" type="text" >
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Date of Birth</label>
                                <input class="form-control" id="dob" name="dob" type="date" >
                            </div>
                        </div>
                        
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Place Of Birth</label>
                                <input class="form-control" id="pob" name="pob" type="text"  >
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Phone </label>
                                <input class="form-control" id="phone" type="text" name="phone" >
                            </div>
                        </div> 
                        <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Gender</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="gender" id="gender">
                                        <option value="1">Pria</option>
                                        <option value="2">Wanita</option> 
                                    </select>
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Email </label>
                                    <input class="form-control" id="email" type="text" name="email" >
                                </div>
                        </div>
                        <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Emergency Contact</label>
                                    <input class="form-control" name="emer_contact" id="emer_contact" type="text">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Referal </label>
                                    <input class="form-control" id="referal" type="text" name="referal">
                                </div>
                        </div>
                        <!-- Form Group (username)-->
                        
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Photo</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                            {{-- <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="username"> --}}
                        </div> 
                    </form>
                </div>



            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                <div class="nav-link-icon"><i data-feather="x-square"></i></div> &nbsp;
                Close
            </button>
            <button type="button" class="btn btn-primary" onclick="SimpanData();">
                <div class="nav-link-icon"><i data-feather="database"></i></div> &nbsp;
                Simpan
            </button>
            </div> 
        </div>
        </div>
    </div>
  
</main>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    }); 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function AddData(){
        var datapos = $("#formmember").serialize(); 
        $('#myModal').modal('show');  
    }

    function SimpanData(){
        
        // var barcode = $("#barcode").val();
        // var title  = $("#title").val();
        // var member_name = $("#member_name").val();  
        // var id_number = $("#id_number").val();
        // var dob  = $("#dob").val();
        // var pob = $("#pob").val();  
        // var phone = $("#phone").val();
        // var gender  = $("#gender").val();
        // var email = $("#email").val();
        // var emer_contact = $("#phone").val();
        // var referal  = $("#gender").val();
        // var foto = $("#email").val();  
        // var formData = new FormData($('#formmember')[0])
        // $.ajax({
        //     url:"{{ route('member_save') }}",
        //     type:"POST",
        //     data:formData,
        //     success:function(result){
        //         console.log(result);
        //     }
        // });

        // Get form

        var form = $('#my-form')[0];

         

        // FormData object 

        var data = new FormData(form);



        // If you want to add an extra field for the FormData

        data.append("CustomField", "This is some extra data, testing");

 

        $.ajax({

            type: "POST",

            enctype: 'multipart/form-data',

            url:"{{ route('member_save') }}",

            data: data,

            processData: false,

            contentType: false,

            cache: false,

            timeout: 800000,

            success: function (data) {

                // $("#output").text(data);

                console.log("SUCCESS : ", data);

                // $("#btnSubmit").prop("disabled", false);

            },

            error: function (e) {

                // $("#output").text(e.responseText);

                console.log("ERROR : ", e);

                // $("#btnSubmit").prop("disabled", false);

            }

        });

    }
</script>
@endsection
