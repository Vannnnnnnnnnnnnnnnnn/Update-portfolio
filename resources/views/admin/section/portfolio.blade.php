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
                    <h1 class="h3 mb-2 text-gray-800">Experience Table</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Experience
                        </button>
                    </div>

                    
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Company Name</th>
                                        <th>Role</th>
                                        <th>Date Created</th>
                                        <th>Date Updated</th>
                                        <th style="text-align: center!impoertant;" class="align-items-center">Action</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                     @foreach ($work as $item )

                                        <tr>
                                            <td class="text-align: center;">{{$item->name}}</td>
                                            <td>
                                               <img src="{{asset('upload/'.$item->image)}}" style="width:40px" alt="">
                                                  
                                                </td>
                                            <td>{{$item->created_at}}</td>
                                            <td>{{$item->updated_at}}</td>
                                            <td class="d-flex justify-content-center align-items-center">
                                                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#updateModal" data-id="{{$item->id}}" data-name="{{$item->name}}" data-description="{{$item->description}}" data-site="{{$item->site}}"  >
                                                    <lord-icon
                                                    src="https://cdn.lordicon.com/xpgofwru.json"
                                                    trigger="hover"
                                                    style="width:30px;height:30px; margin-right: 10px;  ">
                                                </lord-icon>
                                                </button>
                                                
                                                <form action="{{route('work.delete', ['id'=>$item->id])}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                <button type="submit" class="btn "  >
                                                    <lord-icon
                                                    src="https://cdn.lordicon.com/skkahier.json"
                                                    trigger="hover"
                                                    style="width:30px;height:30px">
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
                <div class=" modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Works</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('work.create')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('post')
                             <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Project name</label>
                              </div>

                              <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Desccription</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                              </div>

                              <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="site" placeholder="name@example.com">
                                <label for="floatingInput">Site</label>
                              </div>

                              <div class="mb-3">
                                <label for="imageInput" class="form-label">Select Image</label>
                                <input type="file" class="form-control" id="imageInput" name="image" accept="image/*">
                              </div>
                              <div id="imagePreview"></div>
                            
                              
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
                <div class=" modal fade " id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('work.update', ['id'=> '__ID__'])}}" method="post" id="updateForm" enctype="multipart/form-data" >
                                @csrf
                                @method('put')
                            <div class="form-floating mb-3">
                                <input type="hidden" name="id" id="updateId">
                               <input type="text" class="form-control" id="name" name="name" placeholder="Name of Project">
                               <label for="floatingInput">Project name</label>
                             </div>

                             <div class="mb-3">
                               <label for="exampleFormControlTextarea1" class="form-label">Desccription</label>
                               <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                             </div>

                             <div class="form-floating mb-3">
                               <input type="text" class="form-control" id="site" name="site" placeholder="www.sample.com">
                               <label for="floatingInput">Site</label>
                             </div>
                       </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Info</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
             


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


{{-- update modal --}}
    <script>
        // Call the setFormAction function when the modal is shown
        var myModal = document.getElementById('updateModal');
                        
        myModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var name = button.getAttribute('data-name');
            var site = button.getAttribute('data-site');
            var description = button.getAttribute('data-description');
                    
            // Set the value of the hidden input field to the id
            document.getElementById('updateId').value = id;
            // Call the setFormAction function to update the form action
            setFormAction(id);

           

            // Set the values of the modal inputs
            document.getElementById('site').value = site;
            document.getElementById('name').value = name;
            document.getElementById('description').value = description;
        });

        // Function to dynamically set the form action
        function setFormAction(id) {
            var form = document.getElementById('updateForm');
            var action = form.getAttribute('action');
            // Replace '__ID__' in the action attribute with the actual id value
            form.setAttribute('action', action.replace('__ID__', id));
        }
    </script>

    @include('admin.components.footer') 
