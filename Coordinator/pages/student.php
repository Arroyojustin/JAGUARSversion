<div class="container-fluid p-0 m-0" id="list" style="display: none;">
    <!-- Header -->
    <div class="custom-card-header bg-light text-dark">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <!-- Left section (Page Length and Search) -->
            <div class="d-flex align-items-center">
                <!-- Page Length Selector -->
                <div class="d-flex align-items-center">
                        <select id="student-lists-pageLengthSelect" class="form-select form-select-sm custom-select" aria-label="Page length selector">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                <!-- Search Input -->
                <div class="ms-3 flex-shrink-1">
                <select id="categorySelect2" class="form-select form-select-sm custom-select me-2" aria-label="Select category"> 
                   <option value="" disabled selected>Select a Category</option> 
                </select>
                </div>
            </div>

            <!-- Right section (Action buttons) -->
        </div>
    </div>
    
    <!-- Body -->
    <div class="card-body bg-white p-0">
            <!-- Table Placeholder -->
            <div class="table-responsive">
            <table id="studentlisted" class="table table-hover text-center m-0" style="width: 100%;">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No.</th>
                        <!-- Other columns -->
                    </tr>
                </thead>
                <tbody id="tdata">
                    <!-- Data will be loaded here via AJAX -->
                </tbody>
            </table>

            </div>
        </div>
    
    <!-- Footer -->
    <div class="card-footer bg-light text-dark">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <span class="mb-2" id="student-lists-tableInfo">Showing 0 to 0 of 0 entries</span>
                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul id="student-lists-pagination" class="pagination mb-0">
                        <!-- Pagination buttons will be generated here via AJAX -->
                    </ul>
                </nav>
            </div>
        </div>
</div>
