<div class="container-fluid p-7" id="adding" style="display: none;">
    <div class="card shadow-sm mt-8">
        <!-- Header -->
        <div class="card-header bg-light text-dark">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <!-- Left section (Page Length and Search) -->
                <div class="d-flex align-items-center">
                    <!-- Page Length Selector -->
                    <div class="d-flex align-items-center me-3 mb-2 mb-sm-0">
                        <label for="pageLengthSelect" class="form-label mb-0 me-2">Show</label>
                        <select id="pageLengthSelect" class="form-select form-select-sm custom-select" aria-label="Select number of entries per page">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <!-- Search Input -->
                    <div class="ms-3 flex-shrink-1">
                        <div class="input-group">
                            <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Search..." aria-label="Search">
                            <button class="btn btn-outline-secondary btn-sm" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Right section (Action buttons) -->
                <div class="d-flex">
                    <button class="btn btn-success btn-sm me-2" aria-label="Edit selected users" onclick="showSection(event, 'add-sport')">Add Coach</button>
                    <button class="btn btn-success btn-sm" aria-label="Delete selected users" onclick="showSection(event, 'add-coor')">Add Coordinator</button>
                </div>
            </div>
        </div>
        
        <!-- Body -->
        <div class="card-body bg-white">
            <!-- Table Placeholder -->
            <div class="table-responsive">
                <table id="usersTable" class="table table-hover text-center" style="width: 100%;">
                    <thead class="table-light">
                        <tr>
                            <th>
                                <!-- Select All Checkbox -->
                                <input type="checkbox" id="selectAllCheckbox" aria-label="Select all users">
                            </th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Email</th>
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
                <span id="tableInfo"></span>
                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul id="pagination" class="pagination mb-0">
                        <!-- Pagination buttons will be generated here via AJAX -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
   <div class="card-footer bg-light text-dark">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <span id="tableInfo"></span>
                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul id="pagination" class="pagination mb-0">
                        <!-- Pagination buttons will be generated here via AJAX -->
                    </ul>
                </nav>
            </div>
        </div>