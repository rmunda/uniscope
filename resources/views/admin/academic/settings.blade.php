<x-app-layout>
   <x-slot name="header">
      <div class="container-xl">
         <div class="row align-items-center">
            <div class="col d-flex align-items-center">
               <svg xmlns="http://www.w3.org/2000/svg" style="width: 42px; height: 42px" viewBox="0 0 24 24" fill="none" stroke="#212121" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-tool"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6 -6a6 6 0 0 1 -8 -8l3.5 3.5" /></svg>
               <h2 class="page-title">
                  Academic Settings
               </h2>
            </div>
         </div>
      </div>
   </x-slot>
   <div class="page-body">
      <div class="container-xl">
         <div class="row row-cards align-items-start" data-masonry='{"percentPosition": true }'>
            <!--START CREATE SESSION SECTION -->
            <div class="col-sm-12 col-lg-4">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">
                        <Strong>Create Session</strong>
                     </h3>
                  </div>
                  <div class="card-body">
                     <div class="row gy-3">
                        <div class="col-12 d-flex flex-column">
                           <p class="text-danger mb-3">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 9v4" />
                                 <path d="M12 16v.01" />
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                              </svg>
                              Create one Session per academic year. Last created session will be considered as the latest academic session.
                           </p>
                           <form id="createSessionForm" method="POST">
                              @csrf
                              <div class="mb-3">
                                 <input type="text" name="session_name" id="session_name" class="form-control" placeholder="2021 - 2022" required>
                              </div>
                              <div>
                                 <button class="btn btn-outline-primary" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                       <path d="M5 12l5 5l10 -10" />
                                    </svg>
                                    Create
                                 </button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--END CREATE SESSION SECTION -->

            <!--START SET SESSION SECTION-->
            <div class="col-sm-12 col-lg-4">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">
                        <strong>Set Current Session</strong>
                     </h3>
                  </div>
                  <div class="card-body">
                     <div class="row gy-3">
                        <div class="col-12 d-flex flex-column">
                           <p class="text-danger mb-3">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 9v4" />
                                 <path d="M12 16v.01" />
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                              </svg>
                              Only use this only once to set the current session for an academic year.
                           </p>
                           <form id="setSessionForm">
                            @csrf
                              <div class="mb-3">
                                 <label class="form-label">Select "Session" to browse by:</label>
                                 <select id="sessionDropdown" class="form-select">
                                    <option value="">Select session...</option>
                                    @foreach($sessions as $session)
                                    <option value="{{ $session->id }}"
                                    {{ $session->is_active ? 'selected' : '' }}>
                                    {{ $session->session_name }} {{ $session->is_active ? '(Active)' : '' }}
                                    </option>
                                    @endforeach
                                 </select>
                              </div>
                              <div>
                                 <button class="btn btn-outline-primary" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                       <path d="M5 12l5 5l10 -10" />
                                    </svg>
                                    Set
                                 </button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--END SET SESSION SECTION-->

            <!--START CREATE CLASS SECTIONS SECTION-->
            <div class="col-sm-12 col-lg-4">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">
                        <strong>Create Section</strong>
                     </h3>
                  </div>
                  <div class="card-body">
                     <div class="row gy-3">
                        <div class="col-12 d-flex flex-column">
                           <form id="createSectionForm" method="post">
                            @csrf

                            <input type="hidden" id="edit_section_id" name="id">

                              <div class="mb-3">
                                 <input type="text" name="section_name" id="section_name" class="form-control" placeholder="Section A" required>
                              </div>
                              <div>
                                 <button class="btn btn-outline-primary" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                       <path d="M5 12l5 5l10 -10" />
                                    </svg>
                                    <span id="btnText">Create</span>
                                 </button>

                                 <button id="cancelEdit" class="btn btn-link text-muted d-none" type="button">
                                       Cancel
                                 </button>
                              </div>
                           </form>
                        </div>
                        <div class="input-icon d-flex align-items-center">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                            </span>
                            <input type="text" id="custom-search" class="form-control" placeholder="Search section..." aria-label="Search section">
                        </div>
                        <div class="table-responsive">
                            <table id="sections-table" class="table table-xs align-middle text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1">#</th>
                                        <th>Section Name</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--END CLASS SECTIONS SECTION-->

            <!--START CREATE SUBJECT SECTION-->
            <div class="col-sm-12 col-lg-4">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">
                        <strong>Create Subject</strong>
                     </h3>
                  </div>
                  <div class="card-body">
                     <div class="row gy-3">
                        <div class="col-12 d-flex flex-column">
                           <form id="createSubjectForm" method="post">
                            @csrf
                              <div class="mb-3">
                                 <input type="text" name="subject_name" id="subject_name" class="form-control" placeholder="Mathematics" required>
                              </div>
                              <div>
                                 <button class="btn btn-outline-primary" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                       <path d="M5 12l5 5l10 -10" />
                                    </svg>
                                    Create
                                 </button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--END SUBJECT SECTION-->
         </div>
      </div>
   </div>
   <!-- DELETE CONFIRM MODAL -->
   <div class="modal modal-blur fade" id="deleteModal" tabindex="-1">
      <div class="modal-dialog modal-sm modal-dialog-centered">
         <div class="modal-content">
            
            <div class="modal-header">
            <h5 class="modal-title">Confirm Delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
            <p>
               Are you sure you want to delete 
               <strong id="deleteSectionName"></strong>?
            </p>
            </div>

            <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button id="confirmDeleteBtn" class="btn btn-danger">Yes, Delete</button>
            </div>
         </div>
      </div>
   </div>
   @push('scripts')
   <script>
      //Using inbuilt fetch library
      // document.getElementById('sessionForm').addEventListener('submit', function(e) {
      //     e.preventDefault();
      
      //     let formData = new FormData(this);
      
      //     fetch("{{ route('admin.academic.sessions.store') }}", {
      //         method: "POST",
      //         headers: {
      //             'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
      //         },
      //         body: formData
      //     })
      //     .then(async response => {
      //         let data = await response.json();
      //         console.log(data);
      //         if (!response.ok) {
      //             throw data;
      //         }
      
      //         return data;
      //     })
      //     .then(data => {
      //         showMessage('success', data.message || 'Session created!');
      //         document.getElementById('sessionForm').reset();
      //         addToDropdown(data.data);
      //     })
      //     .catch(error => {
      //         if (error.errors) {
      //             let firstError = Object.values(error.errors)[0][0];
      //             showMessage('error', firstError);
      //         } else {
      //             showMessage('error', 'Something went wrong!');
      //         }
      //     });
      // });
      
      /*---------------------------------Using axios----------------------------------*/
      //Create session
      document.getElementById('createSessionForm').addEventListener('submit', function(e) {
          e.preventDefault();
      
          let session_name = document.getElementById('session_name').value;
      
          axios.post("{{ route('admin.academic.sessions.store') }}", {
              session_name: session_name
          })
          .then(response => {
              let data = response.data;
      
              showToast('success', data.message || 'Session created!');
              document.getElementById('createSessionForm').reset();
      
              // addToDropdown(data.data);
              loadLatestSession();
          })
          .catch(error => {
              let message = 'Something went wrong!';
      
              if (error.response && error.response.data.errors) {
                  message = Object.values(error.response.data.errors)[0][0];
              }
      
              showToast('error', message);
          });
      });
      
      // Set Session
      document.getElementById('setSessionForm').addEventListener('submit', function(e) {
          e.preventDefault();
      
          let sessionId = document.getElementById('sessionDropdown').value;
      
          if (!sessionId) {
              showToast('error', 'Please select a session.');
              return;
          }
      
          axios.put("{{ route('admin.academic.sessions.update', ['session' => ':session']) }}".replace(':session', sessionId), {
              // You can keep this here if your controller also expects it in the request body,
              // but usually, the {session} parameter is enough.
              session_id: sessionId
          })
          .then(response => {
              let data = response.data;
      
              showToast('success', data.message || 'Session set successfully!');
              loadLatestSession();
          })
          .catch(error => {
              let message = 'Something went wrong!';
      
              if (error.response && error.response.data.errors) {
                  message = Object.values(error.response.data.errors)[0][0];
              } else if (error.response && error.response.data.message) {
                  message = error.response.data.message;
              }
      
              showToast('error', message);
          });
      });

      // Fill latest session in dropdown [Not in use]
      function loadLatestSession() {
          axios.get("{{ route('admin.academic.sessions.index') }}")
          .then(response => {
              let sessions = response.data.data;
      
              let select = document.getElementById('sessionDropdown');
              select.innerHTML = '<option value="">Select session...</option>';
      
              sessions.forEach(session => {
                  let option = document.createElement('option');
                  option.value = session.id;
                  option.text = session.session_name;
      
                  if (session.is_active) {
                      option.text += ' (Active)';
                      option.selected = true;
                  }
      
                  select.appendChild(option);
              });
          });
      }      

      // Load all session in dropdown
      function loadSessions() {
          axios.get("{{ route('admin.academic.sessions.index') }}")
          .then(response => {
              let sessions = response.data.data;
      
              let select = document.getElementById('sessionDropdown');
              select.innerHTML = '<option value="">Select session...</option>';
      
              sessions.forEach(session => {
                  let option = document.createElement('option');
                  option.value = session.id;
                  option.text = session.session_name;
      
                  if (session.is_active) {
                      option.text += ' (Active)';
                      option.selected = true;
                  }
      
                  select.appendChild(option);
              });
          });
      }
      
      // function addToDropdown(session) {
      //     let select = document.getElementById('sessionDropdown');
      //     if (select) {
      //         let option = document.createElement('option');
      //         option.value = session.id;
      //         option.text = session.name;
      //         select.appendChild(option);
      //     }
      // }

      // Create Section
      // document.getElementById('createSectionForm').addEventListener('submit', function(e) {
      //     e.preventDefault();
      
      //     let section_name = document.getElementById('section_name').value;
      
      //     axios.post("{{ route('admin.academic.sections.store') }}", {
      //         section_name: section_name
      //     })
      //     .then(response => {
      //         let data = response.data;
      
      //         showToast('success', data.message || 'Section created!');
      //         document.getElementById('createSectionForm').reset();
      //     })
      //     .catch(error => {
      //         let message = 'Something went wrong!';
      
      //         if (error.response && error.response.data.errors) {
      //             message = Object.values(error.response.data.errors)[0][0];
      //         }
      
      //         showToast('error', message);
      //     });
      // });
      
      // Show response message
    //   function showMessage(targetId, type, text) {
    //       let messageDiv = document.getElementById(targetId);
      
    //       let bgColor = type === 'success' ? '#d1e7dd' : '#f8d7da';
    //       let textColor = type === 'success' ? '#0f5132' : '#842029';
    //       let borderColor = type === 'success' ? '#badbcc' : '#f5c2c7';
      
    //       messageDiv.innerHTML = `
    //           <div style="
    //               background-color: ${bgColor};
    //               color: ${textColor};
    //               border: 1px solid ${borderColor};
    //               padding: 12px 16px;
    //               border-radius: 6px;
    //               margin-top: 10px;
    //               display: flex;
    //               justify-content: space-between;
    //               align-items: center;
    //           ">
    //               <span>${text}</span>
    //               <button onclick="this.parentElement.remove()" style="
    //                   background: none;
    //                   border: none;
    //                   font-size: 18px;
    //                   font-weight: bold;
    //                   cursor: pointer;
    //                   color: ${textColor};
    //               ">
    //                   ×
    //               </button>
    //           </div>
    //       `;
    //   }
   </script>

   <!-- DATATABLE-->
   <script>
    $(document).ready(function() {
        var table = $('#sections-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.academic.sections.index') }}",
            pageLength: 3,
            dom: 'tpr', // 't' = table, 'p' = pagination, 'r' = processing. (Hidden 'f' = search box)
            ordering: false,
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'section_name', name: 'section_name' },
                { 
                    data: 'action', 
                    name: 'action', 
                    orderable: false, 
                    searchable: false,
                    className: 'text-end'
                },
            ],
            language: {
                paginate: {
                    next: '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>',
                    previous: '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>'
                }
            }
        });

        // Handle Custom Search Input
        $('#custom-search').on('keyup', function() {
            table.search(this.value).draw();
        });
    });
   </script>
<!--END-->

<!--SECTION ACTION BUTTON-->
   <script>
      $(document).ready(function() {
         const sectionForm = document.getElementById('createSectionForm');
         const sectionInput = document.getElementById('section_name');
         const editIdInput = document.getElementById('edit_section_id');
         const submitBtnText = document.getElementById('btnText');
         const cancelBtn = document.getElementById('cancelEdit');

          let deleteSectionId = null;

         // ================= EDIT =================

         // 1. POPULATE DATA ON EDIT CLICK
         $(document).on('click', '.edit-section', function() {
            // Get data from the DataTable row
            let rowData = $('#sections-table').DataTable().row($(this).parents('row')).data();
            
            // If rowData is undefined (depends on DT config), fallback to finding the name in the closest <tr>
            let sectionName = $(this).closest('tr').find('td:nth-child(2)').text();
            let sectionId = $(this).data('id');

            // Fill inputs
            editIdInput.value = sectionId;
            sectionInput.value = sectionName;

            // Change UI to Update Mode
            submitBtnText.innerText = 'Update';
            cancelBtn.classList.remove('d-none');
            sectionInput.focus();
         });

         // ================= DELETE CLICK =================
         $(document).on('click', '.delete-section', function() {

            deleteSectionId = $(this).data('id');

            let sectionName = $(this).closest('tr').find('td:nth-child(2)').text();
            $('#deleteSectionName').text(sectionName);

            let modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
         });

         // ================= CONFIRM DELETE ==============================
         $('#confirmDeleteBtn').on('click', function() {

            if (!deleteSectionId) return;

            axios.delete("{{ route('admin.academic.sections.destroy', ['section' => ':section']) }}"
                        .replace(':section', deleteSectionId))
            .then(response => {

                  showToast('success', response.data.message);

                  bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();

                  deleteSectionId = null;

                  $('#sections-table').DataTable().ajax.reload(null, false);
            })
            .catch(error => {
                  showToast('error', 'Delete failed!');
            });
         });

         // ================= CANCEL EDIT ========================

         // 2. CANCEL EDIT MODE
         cancelBtn.addEventListener('click', function() {
            sectionForm.reset();
            editIdInput.value = '';
            submitBtnText.innerText = 'Create';
            this.classList.add('d-none');
         });

         // ================= CREATE / UPDATE ====================

         // 3. HANDLE SUBMIT (CREATE OR UPDATE)
         sectionForm.addEventListener('submit', function(e) {
            e.preventDefault();

            let sectionId = editIdInput.value;
            let section_name = sectionInput.value;
            
            // Determine if we are updating or creating
            let url = sectionId 
                  ? "{{ route('admin.academic.sections.update', ['section' => ':section']) }}".replace(':section', sectionId)
                  : "{{ route('admin.academic.sections.store') }}";
            
            let method = sectionId ? 'put' : 'post';

            axios({
                  method: method,
                  url: url,
                  data: { section_name: section_name }
            })
            .then(response => {
                  showToast('success', response.data.message || 'Saved successfully!');
                  
                  // Reset Form and UI
                  sectionForm.reset();
                  editIdInput.value = '';
                  submitBtnText.innerText = 'Create';
                  cancelBtn.classList.add('d-none');

                  // Refresh the DataTable
                  $('#sections-table').DataTable().ajax.reload(null, false);
            })
            .catch(error => {
                  let message = error.response?.data?.errors?.section_name?.[0] || 'Something went wrong!';
                  showToast('error', message);
            });
         });
      });
   </script>
<!--ENDS-->   
   @endpush
</x-app-layout>