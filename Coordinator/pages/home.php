<div class="container-fluid p-0 m-0" id="fronte" style="display: none;">
  <div class="row align-items-center">
    <!-- Calendar Section -->
    <div class="col calendar-container">
      <div class="calendar">
        <div class="calendar-header">
          <i class="fa-solid fa-caret-left" onclick="changeMonth(-1)"></i>
          <h2 id="currentMonth">December</h2>
          <i class="fa-solid fa-caret-right" onclick="changeMonth(1)"></i>
        </div>
        <div class="calendar-body">
          <div class="day-names">
            <span>Sun</span>
            <span>Mon</span>
            <span>Tue</span>
            <span>Wed</span>
            <span>Thu</span>
            <span>Fri</span>
            <span>Sat</span>
          </div>
          <div class="days" id="calendarDays"></div>
        </div>
      </div>
    </div>
    <!-- Clock Section -->
    <div class="col clock-container">
      <div id="clockTime" style="font-size: 64px; font-weight: bold; margin-top: 2px; margin-right: 120px;"></div>
      <div id="clockPeriod" style="font-size: 32px; font-weight: lighter; margin-top: 2px; margin-right: 270px;"></div>
      <div id="clockDate" style="font-size: 20px; color: #888; margin-top: 2px; margin-right: 100px;"></div>
    </div>
  </div>
</div>
