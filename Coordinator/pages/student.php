<div class="container-fluid p-0 m-0" id="list" style="display: none;">
    <div class="card-header bg-light text-dark">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex align-items-center gap-2">
                <div class="d-flex align-items-center">
                    <select id="student-lists-pageLengthSelect" class="form-select form-select-sm custom-select"
                        aria-label="Page length selector">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="d-flex align-items-center">
                    <!-- New select element for sports -->
                    <select id="student-lists-sportSelect" class="form-select form-select-sm custom-select"
                        aria-label="Sport selector">
                        <option value="" selected>All Sports</option>
                        <!-- Sports options will be populated dynamically via AJAX -->
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body bg-white p-0">
        <div class="table-responsive">
            <table id="student-lists" class="table table-hover text-center m-0" style="width: 100%;">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Phone no</th>
                        <th>Email</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody id="tdata">
                    <!-- Data will be loaded here via AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer bg-light text-dark mt-2">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <span class="mb-2" id="student-lists-tableInfo">Showing 0 to 0 of 0 entries</span>
            <nav aria-label="Page navigation">
                <ul id="student-lists-pagination" class="pagination mb-0">
                    <!-- Pagination buttons will be generated here via AJAX -->
                </ul>
            </nav>
        </div>
    </div>
</div>