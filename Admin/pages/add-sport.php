<div class="container-fluid p-0 m-0" id="add-sport" style="display: none;">
    <div class="container mt-1">
        <div class="row mb-3"></div>
        <div class="row">
            <!-- Sports and Roles List Container -->
            <div class="col-md-6">
                <!-- Sports List Container -->
                <div class="card shadow-container mb-4">
                    <div class="card-body">
                        <h5 class="card-title underline mb-3">Sports</h5>
                        <div id="sportsContainer" class="d-flex flex-column">
                            <!-- Dynamically added sports buttons will appear here -->
                        </div>



                        <!-- Add Sport and Update Logo Buttons -->
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3">
                            <!-- Add Sport Button -->
                            <button id="addSportButton" class="btn btn-success mb-2 mb-md-0 me-md-2 w-100 w-md-auto" data-bs-toggle="modal" data-bs-target="#addSportModal">
                                Add Sport
                            </button>
                            <!-- Update Logo/Photo Button -->
                            <button id="updateLogoButton" class="btn btn-secondary w-100 w-md-auto" data-bs-toggle="modal" data-bs-target="#updateLogoModal">
                                Update Logo
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Role List Container -->
                <div class="card shadow-container">
                    <div class="card-body">
                        <h5 class="card-title underline mb-3">Roles</h5>
                        <div id="rolesContainer" class="d-flex flex-column">
                            <p>Select a sport to view its positions.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Coach Information Container -->
            <div class="col-md-6">
                <div class="card shadow-container">
                    <div class="card-body">
                        <h5 class="card-title underline mb-3">Coach Information</h5>
                        <form id="addCoachForm">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="middleInitial" class="form-label">Middle Initial</label>
                                    <input type="text" class="form-control" id="middleInitial" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="phoneNumber" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="phoneNumber" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="sportCategory" class="form-label">Sport Category</label>
                                    <select name="sportCategory" class="form-control" id="sportCategory" required>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="coachemail" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="coachpassword" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submitCoachButton">Add</button>
                            <button class="btn btn-secondary" onclick="showSection(event, 'adding')">Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Sport Modal -->
<div class="modal fade" id="addSportModal" tabindex="-1" aria-labelledby="addSportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSportModalLabel">Add Sport</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addSportForm">
                    <div class="mb-3">
                        <label for="sport_name" class="form-label">Sport Name</label>
                        <input type="text" class="form-control" id="sport_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="position_input" class="form-label">Add Position</label>
                        <input type="text" class="form-control" id="position_input">
                        <button type="button" class="btn btn-primary mt-2" id="addPositionBtn">Add Position</button>
                    </div>
                    <div class="mt-3">
                        <h5>Positions</h5>
                        <ul id="positionList" class="list-group">
                            <!-- Dynamically added positions will appear here -->
                        </ul>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Add Sport</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Logo/Photo Modal (Updated with Select Dropdown and File Upload) -->
<div class="modal fade" id="updateLogoModal" tabindex="-1" aria-labelledby="updateLogoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateLogoModalLabel">Update Logo/Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form to upload a logo/photo -->
                <form id="updateLogoForm" action="controller/upload-logo.php" method="POST" enctype="multipart/form-data">
                    <!-- Select Sport Dropdown -->
                    <div class="mb-3">
                        <label for="sportSelect" class="form-label"></label>
                        <select class="form-select" id="sportSelect" name="sport_id" required>
                            <option value="" disabled selected>Choose Sport</option>
                        </select>
                    </div>

                    <!-- File Upload Section -->
                    <div class="mb-3">
                        <label for="logo_photo" class="form-label">Select Logo/Photo</label>
                        <input type="file" class="form-control" id="logo_photo" name="logo_photo" required>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>