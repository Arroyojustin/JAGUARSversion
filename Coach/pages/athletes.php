<div class="container-fluid p-0 m-0" id="athlete" style="display: none;">
    <body class="scholar">
        <table class="scholar">
            <thead>
                <tr>
                    <th class="athlete-name">Student Name</th>
                    <th class="athlete-scholar">Scholarship(%)</th>
                </tr>
            </thead>
            <tbody id="student-table-body">
                <!-- Dynamic rows will be inserted here -->
            </tbody>
        </table>
    </body>
</div>

<!-- Scholar Modal -->
<!-- <div class="modal fade" id="scholarModal" tabindex="-1" aria-labelledby="scholarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scholarModalLabel">Edit Scholar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="scholarForm">
                <div class="modal-body">
                    <input type="hidden" id="studentId" name="studentId">
                    
                    <div class="mb-3">
                        <label for="grades" class="form-label">Grades (%)</label>
                        <input type="number" class="form-control" id="grades" name="grades" min="0" max="100" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="skills" class="form-label">Skills (%)</label>
                        <input type="number" class="form-control" id="skills" name="skills" min="0" max="100" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="scholar" class="form-label">Scholarship (%)</label>
                        <input type="text" class="form-control" id="scholar" name="scholar" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div> -->
<!-- Scholar Modal -->
<div class="modal fade" id="scholarModal" tabindex="-1" aria-labelledby="scholarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scholarModalLabel">Edit Scholar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="scholarForm">
                <div class="modal-body">
                    <input type="hidden" id="studentId" name="studentId">
                    
                    <!-- Grades -->
                    <div class="mb-3">
                        <label for="grades" class="form-label">Grades (%)</label>
                        <input type="number" class="form-control" id="grades" name="grades" min="0" max="100" required>
                    </div>

                    <!-- Skills -->
                    <div class="mb-3">
                        <label for="skills" class="form-label">Skills (0-10)</label>
                        <input type="number" class="form-control" id="skills" name="skills" min="0" max="10" required>
                    </div>
                    
                    <!-- Display calculated scholarship -->
                    <div class="mb-3">
                        <label for="scholar" class="form-label">Scholarship (%)</label>
                        <input type="text" class="form-control" id="scholar" name="scholar" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
