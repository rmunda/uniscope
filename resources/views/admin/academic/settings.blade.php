<x-app-layout>
   <x-slot name="header">
      <div class="container-xl mb-2">
         <div class="top-strip d-flex justify-content-between align-items-center">

            <!-- Left -->
            <div class="top-strip-left">
                  Configure
            </div>

            <!-- Right -->
            <div class="top-strip-right">
                  <span class="badge badge-live me-2">Live</span>
                  <span class="badge badge-session">2029–2030 Active</span>
            </div>

         </div>
      </div>
      <div class="container-xl">
         <div class="row align-items-center">
            <div class="col d-flex align-items-center"> 
               {{-- <img src="{{ Vite::asset('resources/images/settings.png') }}"> --}}
               <h2 class="page-title">Academic Settings</h2>
            </div>
         </div>
      </div>
   </x-slot>
   <div class="container-xl">
      <!-- Tab Nav -->
      <div class="mb-3">
         <ul class="nav nav-tabs" id="academic-tabs" role="tablist">
            <li class="nav-item">
               <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-sessions" type="button">
               Sessions
               </button>
            </li>
            <li class="nav-item">
               <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-sections" type="button">
               Sections
               </button>
            </li>
            <li class="nav-item">
               <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-subjects" type="button">
               Subjects
               </button>
            </li>
            <li class="nav-item">
               <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-classes" type="button">
               Classes
               </button>
            </li>
            <li class="nav-item">
               <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-roles" type="button">
               Roles
               </button>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-sm-12 col-lg-9">
            <div class="tab-content">
               <!-- SESSIONS TAB -->
               <div class="tab-pane fade show active" id="tab-sessions" role="tabpanel">
                  <div class="row">
                     <!-- Active Session Box -->
                     <div class="col-md-4">
                        <div class="card">
                           <div class="card-body">
                              <h5 class="card-title mb-3">Active Session</h5>
                              <form id="setSessionForm">
                                 @csrf
                                 <div class="mb-3">
                                    <select id="sessionDropdown" class="form-select">
                                       <option value="">Select session...</option>
                                       @foreach($sessions as $session)
                                       <option value="{{ $session->id }}" {{ $session->is_active ? 'selected' : '' }}>
                                       {{ $session->session_name }} {{ $session->is_active ? '(Active)' : '' }}
                                       </option>
                                       @endforeach
                                    </select>
                                 </div>
                                 <button class="btn btn-primary w-100" type="submit">Set Active</button>
                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-8">
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title"><strong>Sessions</strong></h3>
                           </div>
                           <div class="card-body">
                              <form id="createSessionForm">
                                 @csrf
                                 <div class="d-flex gap-3 mb-3">
                                    <input type="text" id="session_name" class="form-control" placeholder="2024 - 2025" required>
                                    <button class="btn btn-primary rounded px-4" type="submit"> + Create Session</button>
                                 </div>
                              </form>
                              <div class="input-icon mb-2">
                                 <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <circle cx="10" cy="10" r="7"></circle>
                                       <line x1="21" y1="21" x2="15" y2="15"></line>
                                    </svg>
                                 </span>
                                 <input type="text" id="search-session" class="form-control" placeholder="Search…">
                              </div>
                              <table id="session-table" class="table table-vcenter datatable w-100">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Name</th>
                                       <th class="text-end">Actions</th>
                                    </tr>
                                 </thead>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card  border-0 shadow-none">
                           <div class="card-body">
                              <div class="d-flex mb-2">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon text-primary me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                    <path d="M12 9h.01" />
                                    <path d="M11 12h1l1 0v4h1" />
                                 </svg>
                                 <h4 class="m-0 text-primary">Information</h4>
                              </div>
                              <p class="text-secondary small">
                                 Create one Session per academic year. This allows the system to organize grades and attendance into distinct year-based buckets.
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- SECTIONS TAB -->
               <div class="tab-pane fade" id="tab-sections" role="tabpanel">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title"><strong>Sections</strong></h3>
                           </div>
                           <div class="card-body">
                              <form id="createSectionForm">
                                 @csrf
                                 <input type="hidden" id="edit_section_id">
                                 <div class="input-group mb-2">
                                    <input type="text" id="section_name_input" class="form-control" placeholder="Section A" required>
                                    <button class="btn btn-primary" type="submit" id="btnTextSection">Create</button>
                                 </div>
                                 <button id="cancelEditSection" class="btn btn-link btn-sm text-muted d-none mb-2" type="button">Cancel</button>
                              </form>
                              <div class="input-icon mb-2">
                                 <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <circle cx="10" cy="10" r="7"></circle>
                                       <line x1="21" y1="21" x2="15" y2="15"></line>
                                    </svg>
                                 </span>
                                 <input type="text" id="search-section" class="form-control" placeholder="Search…">
                              </div>
                              <table id="sections-table" class="table table-vcenter datatable w-100">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Name</th>
                                       <th class="text-end">Actions</th>
                                    </tr>
                                 </thead>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card border-0 shadow-none">
                           <div class="card-body">
                              <div class="d-flex mb-2">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon text-primary me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                    <polyline points="11 12 12 12 12 16 13 16"></polyline>
                                 </svg>
                                 <h4 class="m-0 text-primary">About Sections</h4>
                              </div>
                              <p class="text-secondary small">
                                 Sections represent specific groups within a class (e.g., <strong>Section A</strong>, <strong>Section B</strong>). 
                              </p>
                              <p class="text-secondary small mb-0">
                                 Use these to manage different cohorts of students who follow the same curriculum but are taught separately.
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- SUBJECTS TAB -->
               <div class="tab-pane fade" id="tab-subjects" role="tabpanel">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title"><strong>Subjects</strong></h3>
                           </div>
                           <div class="card-body">
                              <form id="createSubjectForm">
                                 @csrf
                                 <input type="hidden" id="edit_subject_id">
                                 <div class="input-group mb-2">
                                    <input type="text" id="subject_name_input" class="form-control" placeholder="Mathematics" required>
                                    <button class="btn btn-primary" type="submit" id="btnTextSubject">Create</button>
                                 </div>
                                 <button id="cancelEditSubject" class="btn btn-link btn-sm text-muted d-none mb-2" type="button">Cancel</button>
                              </form>
                              <div class="input-icon mb-2">
                                 <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <circle cx="10" cy="10" r="7"></circle>
                                       <line x1="21" y1="21" x2="15" y2="15"></line>
                                    </svg>
                                 </span>
                                 <input type="text" id="search-subject" class="form-control" placeholder="Search…">
                              </div>
                              <table id="subjects-table" class="table table-vcenter datatable w-100">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Name</th>
                                       <th class="text-end">Actions</th>
                                    </tr>
                                 </thead>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card border-0 shadow-none">
                           <div class="card-body">
                              <div class="d-flex mb-2">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon text-primary me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                    <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                    <line x1="3" y1="6" x2="3" y2="19" />
                                    <line x1="12" y1="6" x2="12" y2="19" />
                                    <line x1="21" y1="6" x2="21" y2="19" />
                                 </svg>
                                 <h4 class="m-0 text-primary">Curriculum</h4>
                              </div>
                              <p class="text-secondary small">
                                 Define the core subjects offered by your institution (e.g., <strong>Mathematics</strong>, <strong>Physics</strong>, <strong>Literature</strong>).
                              </p>
                              <p class="text-secondary small mb-0">
                                 Once created, these subjects can be assigned to specific classes and teachers in the Academic Planner.
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- CLASSES TAB -->
               <div class="tab-pane fade" id="tab-classes" role="tabpanel">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title"><strong>Classes</strong></h3>
                           </div>
                           <div class="card-body">
                              <form id="createClassForm">
                                 @csrf
                                 <input type="hidden" id="edit_class_id">
                                 <div class="input-group mb-2">
                                    <input type="text" id="class_name_input" class="form-control" placeholder="Class 10" required>
                                    <button class="btn btn-primary" type="submit" id="btnTextClass">Create</button>
                                 </div>
                                 <button id="cancelEditClass" class="btn btn-link btn-sm text-muted d-none mb-2" type="button">Cancel</button>
                              </form>
                              <div class="input-icon mb-2">
                                 <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <circle cx="10" cy="10" r="7"></circle>
                                       <line x1="21" y1="21" x2="15" y2="15"></line>
                                    </svg>
                                 </span>
                                 <input type="text" id="search-class" class="form-control" placeholder="Search…">
                              </div>
                              <table id="classes-table" class="table table-vcenter datatable w-100">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Name</th>
                                       <th class="text-end">Actions</th>
                                    </tr>
                                 </thead>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card border-0 shadow-none">
                           <div class="card-body">
                              <div class="d-flex mb-2">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon text-primary me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
                                    <line x1="13" y1="7" x2="13" y2="7.01" />
                                    <line x1="17" y1="7" x2="17" y2="7.01" />
                                    <line x1="17" y1="11" x2="17" y2="11.01" />
                                    <line x1="17" y1="15" x2="17" y2="15.01" />
                                 </svg>
                                 <h4 class="m-0 text-primary">Class Structure</h4>
                              </div>
                              <p class="text-secondary small">
                                 Classes are the primary level of organization (e.g., <strong>Grade 1</strong>, <strong>Form 5</strong>, or <strong>Class 10</strong>).
                              </p>
                              <p class="text-secondary small mb-0">
                                 A Class typically contains multiple Sections. Ensure your class names are unique and easily identifiable for report generation.
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- ROLES TAB -->
               <div class="tab-pane fade" id="tab-roles" role="tabpanel">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title"><strong>Roles</strong></h3>
                           </div>
                           <div class="card-body">
                              <form id="createRoleForm">
                                 @csrf
                                 <input type="hidden" id="edit_role_id">
                                 <div class="input-group mb-2">
                                    <input type="text" id="role_name_input" class="form-control" placeholder="Teacher" required>
                                    <button class="btn btn-primary" type="submit" id="btnTextRole">Create</button>
                                 </div>
                                 <button id="cancelEditRole" class="btn btn-link btn-sm text-muted d-none mb-2" type="button">Cancel</button>
                              </form>
                              <div class="input-icon mb-2">
                                 <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <circle cx="10" cy="10" r="7"></circle>
                                       <line x1="21" y1="21" x2="15" y2="15"></line>
                                    </svg>
                                 </span>
                                 <input type="text" id="search-role" class="form-control" placeholder="Search…">
                              </div>
                              <table id="roles-table" class="table table-vcenter datatable w-100">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Name</th>
                                       <th class="text-end">Actions</th>
                                    </tr>
                                 </thead>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card border-0 shadow-none">
                           <div class="card-body">
                              <div class="d-flex mb-2">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon text-primary me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                 </svg>
                                 <h4 class="m-0 text-primary">User Permissions</h4>
                              </div>
                              <p class="text-secondary small">
                                 Roles define what staff members can access (e.g., <strong>Admin</strong>, <strong>Teacher</strong>, <strong>Registrar</strong>).
                              </p>
                              <p class="text-secondary small mb-0">
                                 After creating a role, you can assign it to users in the Staff Management module to control their dashboard permissions.
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end tab-content -->
         </div>
      </div>
      <!-- end row -->
   </div>
   <!-- end container-xl -->
   <!-- DELETE CONFIRM MODAL -->
   <div class="modal modal-blur fade" id="deleteModal" tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <p>Are you sure you want to delete <strong id="deleteTargetName"></strong>?</p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
               <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Yes, Delete</button>
            </div>
         </div>
      </div>
   </div>
   @push('styles')
   <style>
      /* Force override Tabler's list-group styles */
      .card > #academic-tabs.list-group,
      #academic-tabs.list-group {
      border-radius: 0 !important;
      overflow: hidden;
      }
      #academic-tabs .list-group-item,
      #academic-tabs .list-group-item:first-child,
      #academic-tabs .list-group-item:last-child {
      border-radius: 0 !important;
      border-left: 3px solid transparent !important;
      border-top: none !important;
      border-right: none !important;
      border-bottom: 1px solid rgba(0,0,0,.08) !important;
      color: #626976 !important;
      background-color: #fff !important;
      padding: 0.85rem 1rem;
      font-weight: 500;
      transition: background-color 0.15s ease, border-left-color 0.15s ease, color 0.15s ease;
      }
      #academic-tabs .list-group-item:hover {
      background-color: #f0f4ff !important;
      color: #206bc4 !important;
      border-left-color: #206bc4 !important;
      }
      #academic-tabs .list-group-item.active {
      background-color: #f0f4ff !important;
      color: #206bc4 !important;
      border-left-color: #206bc4 !important;
      font-weight: 600 !important;
      }
      /* .tab-content .card {
      max-width: 800px;
      } */
   </style>
   @endpush
   @push('scripts')
   <script>
      $(document).ready(function () {
      
         $('#deleteModal').on('shown.bs.modal', function () {
            // Focus the 'Cancel' button instead of the 'X' button
            $(this).find('.btn-link').focus();
         });
      
         // --- RESTORE ACTIVE TAB FROM URL HASH ---
         let hash = window.location.hash;
         if (hash) {
            let tab = $('#academic-tabs a[href="' + hash + '"]');
            if (tab.length) tab.tab('show');
         }
      
         // --- SAVE TAB TO URL HASH ON SWITCH ---
         $('#academic-tabs a').on('shown.bs.tab', function (e) {
            history.replaceState(null, null, $(e.target).attr('href'));
      
            // Reinitialize DataTables that were hidden (needed for correct column widths)
            $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
         });
      
         // --- GLOBAL DELETE STATE ---
         let deleteUrl = null;
         let activeTable = null;
      
         // --- GLOBAL DELETE CONFIRM ---
         $('#confirmDeleteBtn').on('click', function () {
            console.log(deleteUrl);
            if (!deleteUrl) return;
      
            api.delete(deleteUrl)
               .then(res => {
                  showToast('success', res.data?.message || 'Deleted successfully');
                  $('#deleteModal').modal('hide');
                  if (activeTable) {
                     const pageInfo = activeTable.page.info();
                     
                     // Check if we are on a page beyond the first one 
                     // AND if there is only 1 row currently displayed on this page
                     const isLastRowOnPage = (pageInfo.recordsDisplay - pageInfo.start) === 1;
                     
                     if (isLastRowOnPage && pageInfo.page > 0) {
                           // Move to the previous page and reload
                           activeTable.page('previous').draw('page');
                     } else {
                           // Stay on the current page and reload
                           activeTable.ajax.reload(null, false);
                     }
                  }
      
                  if (deleteUrl.includes('sessions')) loadSessions();
               })
               .catch(err => {
                  showToast('error', err.response?.data?.message || 'Delete failed');
               });
         });
      
         // --- REUSABLE CRUD ---
         function initSimpleCRUD(config) {
      
            let table = $(config.tableId).DataTable({
               processing: true,
               serverSide: true,
               ajax: config.indexUrl,
               pageLength: 3,
               dom: 'tpr',
               ordering: false,
               columns: [
                  { data: 'DT_RowIndex' },
                  { data: config.fieldName },
                  { data: 'action', className: 'text-end' }
               ]
            });
      
            $(config.searchId).on('keyup', function () {
               table.search(this.value).draw();
            });
      
            $(config.tableId).on('click', config.editBtnClass, function (e) {
               e.preventDefault();
               let btn = $(this);
               let id = btn.data('id');
               let url = btn.data('url');
               console.log(url);
               let name = btn.closest('tr').find('td:nth-child(2)').text().trim();
      
               $(config.idInput).val(id).data('url', url);
               $(config.nameInput).val(name).focus();
               $(config.btnText).text('Update');
               $(config.cancelBtn).removeClass('d-none');
            });
      
            $(config.tableId).on('click', config.deleteBtnClass, function (e) {
               e.preventDefault();
               let btn = $(this);
               deleteUrl = btn.data('url');
               console.log(deleteUrl);
               activeTable = table;
               $('#deleteTargetName').text(btn.closest('tr').find('td:nth-child(2)').text().trim());
               $('#deleteModal').modal('show');
            });
      
            $(config.cancelBtn).on('click', function () {
               $(config.formId)[0].reset();
               $(config.idInput).val('').removeData('url');
               $(config.btnText).text('Create');
               $(this).addClass('d-none');
            });
      
            $(config.formId).on('submit', function (e) {
               e.preventDefault();
               let id = $(config.idInput).val();
               let url = id ? $(config.idInput).data('url') : config.storeUrl;
               let method = id ? 'put' : 'post';
               let payload = {};
               payload[config.fieldName] = $(config.nameInput).val();
      
               axios({ method, url, data: payload })
                  .then(res => {
                     showToast('success', res.data.message || 'Saved');
                     $(config.cancelBtn).click();
                     table.ajax.reload(null, false);
                  })
                  .catch(err => {
                     showToast('error', err.response?.data?.message || 'Operation failed');
                  });
            });
         }
      
         // --- SESSION DELETE ---
         $(document).on('click', '.delete-session', function (e) {
            e.preventDefault();
            let btn = $(this);
            deleteUrl = btn.data('url');
            activeTable = $('#session-table').DataTable();
            $('#deleteTargetName').text(btn.closest('tr').find('td:nth-child(2)').text().trim());
            $('#deleteModal').modal('show');
         });
      
         // --- LOAD SESSIONS DROPDOWN ---
         function loadSessions() {
            api.get("{{ route('admin.academic.sessions.index') }}")
               .then(res => {
                  // console.log(res.data);
                  let select = $('#sessionDropdown');
                  select.empty().append('<option value="">Select session...</option>');
                  res.data.data.forEach(s => {
                     select.append(`<option value="${s.id}" ${s.is_active ? 'selected' : ''}>${s.session_name} ${s.is_active ? '(Active)' : ''}</option>`);
                  });
               });
         }
      
         // --- CREATE SESSION ---
         $('#createSessionForm').on('submit', function (e) {
            e.preventDefault();
            api.post("{{ route('admin.academic.sessions.store') }}", {
               session_name: $('#session_name').val()
            })
            .then(res => {
               showToast('success', res.data.message || 'Session created');
               this.reset();
               $('#session-table').DataTable().ajax.reload(null, false);
               loadSessions();
            })
            .catch(err => {
               showToast('error', err.response?.data?.message || 'Error');
            });
         });
      
         // --- SET ACTIVE SESSION ---
         $('#setSessionForm').on('submit', function (e) {
            e.preventDefault();
            let id = $('#sessionDropdown').val();
            api.put(
               "{{ route('admin.academic.sessions.update', ['session' => ':id']) }}".replace(':id', id)
            )
            .then(res => {
               showToast('success', res.data.message || 'Session activated');
               loadSessions();
               $('#session-table').DataTable().ajax.reload(null, false);
            })
            .catch(err => {
               showToast('error', err.response?.data?.message || 'Error');
            });
         });
      
         // --- SESSION TABLE ---
         $('#session-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.academic.sessions.index') }}",
            pageLength: 3,
            dom: 'tpr',
            ordering: false,
            columns: [
               { 
                     data: 'DT_RowIndex', 
                     name: 'DT_RowIndex', 
                     searchable: false, // Prevents searching on index
                     orderable: false 
               },
               { 
                     data: 'session_name', 
                     name: 'session_name',
                     searchable: true // Explicitly allow search here
               },
               { 
                     data: 'action', 
                     name: 'action', 
                     className: 'text-end', 
                     searchable: false, // Prevents searching on action buttons
                     orderable: false 
               }
            ]
         });
      
         $('#search-session').on('keyup', function () {
            $('#session-table').DataTable().search(this.value).draw();
         });
      
         // --- INIT ALL MODULES ---
         initSimpleCRUD({
            tableId: '#sections-table',
            searchId: '#search-section',
            formId: '#createSectionForm',
            idInput: '#edit_section_id',
            nameInput: '#section_name_input',
            btnText: '#btnTextSection',
            cancelBtn: '#cancelEditSection',
            editBtnClass: '.edit-section',
            deleteBtnClass: '.delete-section',
            fieldName: 'section_name',
            indexUrl: "{{ route('admin.academic.sections.index') }}",
            storeUrl: "{{ route('admin.academic.sections.store') }}"
         });
      
         initSimpleCRUD({
            tableId: '#subjects-table',
            searchId: '#search-subject',
            formId: '#createSubjectForm',
            idInput: '#edit_subject_id',
            nameInput: '#subject_name_input',
            btnText: '#btnTextSubject',
            cancelBtn: '#cancelEditSubject',
            editBtnClass: '.edit-subject',
            deleteBtnClass: '.delete-subject',
            fieldName: 'subject_name',
            indexUrl: "{{ route('admin.academic.subjects.index') }}",
            storeUrl: "{{ route('admin.academic.subjects.store') }}"
         });
      
         initSimpleCRUD({
            tableId: '#classes-table',
            searchId: '#search-class',
            formId: '#createClassForm',
            idInput: '#edit_class_id',
            nameInput: '#class_name_input',
            btnText: '#btnTextClass',
            cancelBtn: '#cancelEditClass',
            editBtnClass: '.edit-class',
            deleteBtnClass: '.delete-class',
            fieldName: 'class_name',
            indexUrl: "{{ route('admin.academic.classes.index') }}",
            storeUrl: "{{ route('admin.academic.classes.store') }}"
         });
      
         initSimpleCRUD({
            tableId: '#roles-table',
            searchId: '#search-role',
            formId: '#createRoleForm',
            idInput: '#edit_role_id',
            nameInput: '#role_name_input',
            btnText: '#btnTextRole',
            cancelBtn: '#cancelEditRole',
            editBtnClass: '.edit-role',
            deleteBtnClass: '.delete-role',
            fieldName: 'role_name',
            indexUrl: "{{ route('admin.roles.index') }}",
            storeUrl: "{{ route('admin.roles.store') }}"
         });
      
      });
   </script>
   @endpush
</x-app-layout>