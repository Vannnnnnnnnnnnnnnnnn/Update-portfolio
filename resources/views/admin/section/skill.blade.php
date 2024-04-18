@include('admin.components.header') 

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.components.sidebar') 
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                 <!-- Topbar -->
                 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                    </nav>
                    <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Skill Table</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Skill
                        </button>
                    </div>

                    
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Skill</th>
                                            <th>Percent</th>
                                            <th>Date Created</th>
                                            <th>Date Updated</th>
                                            <th>Action</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($skill  as $item )

                                        <tr>
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->percent}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>{{$item->updated_at}}</td>
                                            <td>
                                                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#updateModal" data-id="{{$item->id}}" data-title="{{$item->title}}" data-percent="{{$item->percent}}">
                                                    <lord-icon
                                                    src="https://cdn.lordicon.com/xpgofwru.json"
                                                    trigger="hover"
                                                    style="width:20px;height:20px">
                                                </lord-icon>
                                                </button>

                                                <form action="{{route('skill.delete', ['id'=>$item->id])}}" method="post">
                                                    @csrf
                                                    @method('delete')   
                                                   <button type="submit" class="btn  "  >
                                                       <lord-icon
                                                       src="https://cdn.lordicon.com/skkahier.json"
                                                       trigger="hover"
                                                       style="width:20px;height:20px">
                                                   </lord-icon>
                                                   </button>
                                                   </form>
                                               
                                            </td>
                                        </tr>                                       
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('skill.add')}}" method="post">
                            @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="title" >
                            <label for="floatingInput">Skill Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="Number" class="form-control" id="floatingInput" name="percent"  >
                            <label for="floatingInput">Percent</label>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>              
                    </div>
                </form>
                    </div>
                </div>
                </div>

                  {{-- update --}}
                  <div class=" modal fade " id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateModalLabel">Update Skill</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('skill.update', ['id'=> '__ID__'])}}" method="post" id="updateForm">
                                @csrf
                                @method('put')
                                <div class="form-floating mb-3">
                                    <input type="hidden" name="id" id="updateId">
                                    <input type="text" class="form-control" id="title" name="title" >
                                    <label for="floatingInput">Skill Name</label>
                                </div>
        
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="percent" name="percent"  >
                                    <label for="floatingInput">Percent</label>
                                </div>
                             
                       </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
                
                    {{-- script update modal --}}
                    <script>
                        // Call the setFormAction function when the modal is shown
                        var myModal = document.getElementById('updateModal');
                                        
                        myModal.addEventListener('show.bs.modal', function(event) {
                            var button = event.relatedTarget;
                            var id = button.getAttribute('data-id');
                            var title = button.getAttribute('data-title');
                            var percent = button.getAttribute('data-percent');
                                    
                            // Set the value of the hidden input field to the id
                            document.getElementById('updateId').value = id;
                            // Call the setFormAction function to update the form action
                            setFormAction(id);

                            // Set the values of the modal inputs
                            document.getElementById('title').value = title;
                            document.getElementById('percent').value = percent;
                        });

                        // Function to dynamically set the form action
                        function setFormAction(id) {
                            var form = document.getElementById('updateForm');
                            var action = form.getAttribute('action');
                            // Replace '__ID__' in the action attribute with the actual id value
                            form.setAttribute('action', action.replace('__ID__', id));
                        }
                    </script>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    @include('admin.components.footer') 
