<div class="container-fluid p-0 m-0" id="strong" style="display: none;">
  <div class="attendance-training-tabs">
    <div class="attendance-training-tab active" id="attendance-tab">Attendance</div>
    <div class="attendance-training-tab" id="training-tab">Training</div>
  </div>

  <!-- Attendance Tab Content -->
  <div class="attendance-tab-content active">
    <div class="attendance-training-dropdown">
      <label for="attendance-status"></label>
      <select id="attendance-status">
        <option value="out">Out</option>
        <option value="in">In</option>
      </select>
    </div>
    <div class="attendance-training-table">
      <div class="attendance-training-row">
        <div class="attendance-training-name">Name</div>
        <div class="attendance-training-options">
          <button class="P">P</button>
          <button class="A">A</button>
          <button class="L">L</button>
        </div>
      </div>
      <div class="attendance-training-row">
        <div class="attendance-training-name">Name</div>
        <div class="attendance-training-options">
          <button class="P">P</button>
          <button class="A">A</button>
          <button class="L">L</button>
        </div>
      </div>
    </div>
    <div class="attendance-training-buttons">
      <button class="btn btn-success record">Record</button>
      <button class="btn btn-secondary check-attendance" onclick="showSection(event, 'scanners')">Check Attendance</button>
    </div>
  </div>

  <!-- Training Tab Content -->
  <div class="training-tab-content">
    <div class="training-calendar">
      <div>December</div>
      <table>
        <thead>
          <tr>
            <th>Sun</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
          </tr>
          <tr>
            <td>8</td>
            <td>9</td>
            <td>10</td>
            <td>11</td>
            <td>12</td>
            <td>13</td>
            <td>14</td>
          </tr>
          <tr>
            <td>15</td>
            <td>16</td>
            <td>17</td>
            <td>18</td>
            <td>19</td>
            <td>20</td>
            <td>21</td>
          </tr>
          <tr>
            <td>22</td>
            <td>23</td>
            <td>24</td>
            <td>25</td>
            <td>26</td>
            <td class="training-day">27</td>
            <td>28</td>
          </tr>
          <tr>
            <td>29</td>
            <td>30</td>
            <td>31</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="training-schedule">
      <h5>Training</h5>
      <div class="training-item">
        <span>4:00PM to 7:00PM</span>
        <span>-</span>
        <span>Asiatech Quadrangle</span>
      </div>
      <i class='bx bxs-plus-circle training-add-icon' data-bs-toggle="modal" data-bs-target="#scheduleModal"></i>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scheduleModalLabel">Schedule Training</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="scheduleForm">
        <h3 class="form-title">Schedule Training</h3>
         <div class="mb-3">
          <label for="scheduleTitle" class="form-label">Title</label>
          <input type="text" class="form-control" id="scheduleTitle" placeholder="Enter title" required>
        </div>
        <div class="mb-3">
          <label for="scheduleDate" class="form-label">Date</label>
          <input type="date" class="form-control" id="scheduleDate" required>
        </div>
        <div class="mb-3">
          <label for="scheduleTime" class="form-label">Time</label>
          <input type="time" class="form-control" id="scheduleTime" required>
        </div>
        <div class="mb-3">
          <label for="scheduleLocation" class="form-label">Location</label>
          <input type="text" class="form-control" id="scheduleLocation" placeholder="Enter location" required>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" form="scheduleForm">Save Schedule</button>
      </div>
    </div>
  </div>
</div>


<script>
  // Tab Switching Logic
  const attendanceTab = document.getElementById("attendance-tab");
  const trainingTab = document.getElementById("training-tab");
  const attendanceContent = document.querySelector(".attendance-tab-content");
  const trainingContent = document.querySelector(".training-tab-content");

  attendanceTab.addEventListener("click", () => {
    attendanceTab.classList.add("active");
    trainingTab.classList.remove("active");

    attendanceContent.classList.add("active");
    trainingContent.classList.remove("active");
  });

  trainingTab.addEventListener("click", () => {
    trainingTab.classList.add("active");
    attendanceTab.classList.remove("active");

    trainingContent.classList.add("active");
    attendanceContent.classList.remove("active");
  });

  // Handle form submission
  document.getElementById("scheduleForm").addEventListener("submit", function (event) {
    event.preventDefault();

    const date = document.getElementById("scheduleDate").value;
    const time = document.getElementById("scheduleTime").value;
    const location = document.getElementById("scheduleLocation").value;
    const sportCategory = document.getElementById("sportCategorysched").value;

    const trainingSchedule = document.querySelector(".training-schedule");
    const newTrainingItem = document.createElement("div");
    newTrainingItem.className = "training-item";
    newTrainingItem.innerHTML = `<span>${time}</span> <span>-</span> <span>${location}</span> <span>(${sportCategory})</span>`;
    trainingSchedule.appendChild(newTrainingItem);

    const modal = bootstrap.Modal.getInstance(document.getElementById("scheduleModal"));
    modal.hide();

    this.reset();
  });
</script>
