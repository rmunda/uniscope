<x-app-layout>
   <x-slot name="header">
      <div class="container-xl">
         <div class="row align-items-center">
            <div class="col d-flex align-items-center">
               <svg xmlns="http://www.w3.org/2000/svg"
                  style="width: 42px; height: 42px;"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-tools">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M3 21h4l13 -13a1.5 1.5 0 0 0 -4 -4l-13 13v4" />
                  <path d="M14.5 5.5l4 4" />
                  <path d="M12 8l-5 -5l-4 4l5 5" />
                  <path d="M7 8l-1.5 1.5" />
                  <path d="M16 12l5 5l-4 4l-5 -5" />
                  <path d="M16 17l-1.5 1.5" />
               </svg>
               <h2 class="page-title">
                  Academic Settings
               </h2>
            </div>
         </div>
      </div>
   </x-slot>
   <div class="page-body">
      <div class="container-xl">
         <!--START CREATE SESSION SECTION-->
         <div class="row row-deck row-cards">
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
                                 <input type="text" name="name" id="name" class="form-control" placeholder="2021 - 2022" required>
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
                           <div id="createSessionMessage"></div>
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
                                    {{ $session->name }} {{ $session->is_active ? '(Active)' : '' }}
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
                           <div id="setSessionMessage"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--START SET SESSION SECTION-->

            <!--START CREATE CLASS SESSION SECTION-->
            <div class="col-sm-12 col-lg-4">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">
                        <strong>Create Class</strong>
                     </h3>
                  </div>
                  <div class="card-body">
                     <div class="row gy-3">
                        <div class="col-12 d-flex flex-column">
                           <form id="createClassForm" method="post">
                            @csrf
                              <div class="mb-3">
                                 <input type="text" name="class_name" id="class_name" class="form-control" placeholder="Class-I" required>
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
                           <div id="createClassMessage"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--START SET SESSION SECTION-->
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
      
          let name = document.getElementById('name').value;
      
          axios.post("{{ route('admin.academic.sessions.store') }}", {
              name: name
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
                  option.text = session.name;
      
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
                  option.text = session.name;
      
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

      // Create Class
      document.getElementById('createClassForm').addEventListener('submit', function(e) {
          e.preventDefault();
      
          let class_name = document.getElementById('class_name').value;
      
          axios.post("{{ route('admin.academic.classes.store') }}", {
              class_name: class_name
          })
          .then(response => {
              let data = response.data;
      
              showToast('success', data.message || 'Class created!');
              document.getElementById('createClassForm').reset();
          })
          .catch(error => {
              let message = 'Something went wrong!';
      
              if (error.response && error.response.data.errors) {
                  message = Object.values(error.response.data.errors)[0][0];
              }
      
              showToast('error', message);
          });
      });
      
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
   @endpush
</x-app-layout>