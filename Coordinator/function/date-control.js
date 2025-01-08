document.addEventListener("DOMContentLoaded", () => {
    const clockTime = document.getElementById("clockTime");
    const clockPeriod = document.getElementById("clockPeriod");
    const clockDate = document.getElementById("clockDate");
    const calendarDays = document.getElementById("calendarDays");
    const currentMonth = document.getElementById("currentMonth");
  
    const daysInMonth = (month, year) => new Date(year, month + 1, 0).getDate();
    let currentDate = new Date();
  
    const updateClock = () => {
      const now = new Date();
      const hours = now.getHours();
      const minutes = now.getMinutes();
      const seconds = now.getSeconds();
      const period = hours >= 12 ? "PM" : "AM";
      const formattedHours = hours % 12 || 12;
  
      clockTime.textContent = `${formattedHours}:${String(minutes).padStart(2, "0")}:${String(seconds).padStart(2, "0")}`;
      clockPeriod.textContent = period;
      clockDate.textContent = now.toLocaleDateString(undefined, {
        weekday: "long",
        month: "long",
        day: "numeric",
        year: "numeric",
      });
    };
  
    const renderCalendar = () => {
      calendarDays.innerHTML = "";
      currentMonth.textContent = currentDate.toLocaleDateString(undefined, { month: "long" });
  
      const year = currentDate.getFullYear();
      const month = currentDate.getMonth();
      const firstDay = new Date(year, month, 1).getDay();
      const totalDays = daysInMonth(month, year);
  
      for (let i = 0; i < firstDay; i++) {
        calendarDays.innerHTML += `<span></span>`;
      }
  
      for (let day = 1; day <= totalDays; day++) {
        calendarDays.innerHTML += `<span>${day}</span>`;
      }
    };
  
    const changeMonth = (step) => {
      currentDate.setMonth(currentDate.getMonth() + step);
      renderCalendar();
    };
  
    setInterval(updateClock, 1000);
    updateClock();
    renderCalendar();
  });
  