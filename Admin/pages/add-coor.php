<div class="container-fluid p-0 m-0" id="add-coor" style="display: none;">
    <div>
        <h2 style="border-bottom: 1px solid #000;">Add Coordinator</h2>
        <form id="add-coordinator-form" method="POST">
            <div class="row">
                <div class="col-md-6 col-12 mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label for="middleinitial" class="form-label">Middle Initial</label>
                    <input type="text" class="form-control" id="middleinitial" name="middleinitial">
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label for="civil_status" class="form-label">Civil Status</label>
                    <select class="form-select" id="civil_status" name="civil_status">
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widowed">Widowed</option>
                    </select>
                </div>
            </div>
            <button type="button" class="btn btn-outline-secondary mt-3 me-2" onclick="showSection(event, 'adding')">Back</button>
            <button type="submit" class="btn btn-outline-success mt-3">
                <i class="fas fa-plus me-2"></i> Add Coordinator
            </button>
        </form>
    </div>
</div>