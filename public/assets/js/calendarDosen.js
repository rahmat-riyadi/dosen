const Calendar = tui.Calendar;

const todayBtn = document.getElementById('todayBtn');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const currentDate = document.getElementById('current-date');

function getRandomColor() {
  const colors = ['red', 'blue', 'green'];
  const random = Math.floor(Math.random() * colors.length);
  return colors[random];
}

var cal = new Calendar('#calendar', {
  defaultView: 'month',
  // useFormPopup: true,
  // enableClick: false,
  // isReadOnly:true,
  useDetailPopup: true,
  template: {
    task: function (schedule) {
      return '<span style="color:white;"><i class="bi bi-person"></i> ' + schedule.title + '</span>';
    },
    // taskTitle: function () {
    //   return 'Milestone';
    // },
  }
});

cal.setTheme({
  common: {
    nowIndicatorBullet: {
      backgroundColor: '#515ce6',
    },
  },
});

cal.createEvents([
  {
    id: 'event1',
    calendarId: 'cal2',
    title: 'Pertemuan 3',
    start: new Date('2023-05-24'),
    end: '24 May 2023',
    // dragBackgroundColor: '#fff',
    category: 'task',
    backgroundColor: getRandomColor(),
    // color: '#F6AD06',
    isReadOnly: true,
    attendees: ['Dr. Ridwan A. Kambau, S.T,. M.Kom'],
    borderColor: 'none',
  },
  {
    id: 'event1',
    calendarId: 'cal3',
    title: 'Pertemuan 3',
    start: new Date('2023-05-24'),
    end: '24 May 2023',
    backgroundColor: getRandomColor(),
    category: 'task',
    // backgroundColor: '#000',
    // color: '#F6AD06',
    isReadOnly: true,
    attendees: ['Dr. Ridwan A. Kambau, S.T,. M.Kom'],
    borderColor: 'none',
  },
  // {
  //   id: 'event1',
  //   calendarId: 'cal2',
  //   title: 'Pertemuan 2',
  //   start: new Date('2023-05-24'),
  //   end: '24 May 2023',
  //   isReadOnly: true,
  //   attendees: ['Dr. Ridwan A. Kambau, S.T,. M.Kom'],
  // },
  // {
  //   id: 'event1',
  //   calendarId: 'cal2',
  //   title: 'Pertemuan 2',
  //   start: new Date('2023-05-24'),
  //   end: '24 May 2023',
  //   isReadOnly: true,
  //   attendees: ['Dr. Ridwan A. Kambau, S.T,. M.Kom'],
  // },
  // {
  //   id: 'event1',
  //   calendarId: 'cal2',
  //   title: 'Pertemuan 1',
  //   isReadOnly: true,
  //   start: '2023-05-16T09:00:00',
  //   end: '2023-05-16T10:00:00',
  // },
]);

function getCurrentDate() {
  let dates = cal.getDate();
  let dateString = dates.toString();
  let month = dateString.slice(4, 7);
  let year = dateString.slice(10, 15);

  currentDate.innerHTML = month + year;
}

getCurrentDate();

todayBtn.addEventListener("click", e => {
  cal.today();
  getCurrentDate();
});

prevBtn.addEventListener("click", e => {
  cal.prev();
  getCurrentDate();
});

nextBtn.addEventListener("click", e => {
  cal.next();
  getCurrentDate();
});