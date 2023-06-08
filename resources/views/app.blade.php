<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css" />
</head>
<body>
    

    <div class="container" style="width: 80%;" >
        <button onclick="calendar.next()" > sfasd</button>
        <span class="time" ></span>
        <div id="calendar" style="height: 500px"></div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.js"></script>
    <script>
        const calendar = new tui.Calendar('#calendar', {
            defaultView: 'month',
            template: {
                time(event) {
                    const { start, end, title } = event;
                    // return `<span style="color: white;">${start}~${end} ${title}</span>`;
                    // return `<span style="color: red;">${start}~${end} ${title}</span>`;
                    
                },
                allday(event) {
                    console.log(event)
                    return `<span style="color: gray;">${event.title}</span>`;
                },
            },
        });

        function handleSelect(){
            document.querySelector('#calendar').innerHTML = calendar.getDate()

        }

        calendar.createEvents([
        {
            id: '1',
            calendarId: '1',
            title: 'my event',
            category: 'time',
            dueDateClass: '',
            start: '2023-05-01T22:30:00+09:00',
            end: '2023-05-03T02:30:00+09:00',
        },
        {
            id: '2',
            calendarId: '1',
            title: 'second event',
            category: 'time',
            dueDateClass: '',
            start: '2023-05-14T22:30:00+09:00',
            end: '2023-05-14T02:30:00+09:00',
        },
        ]);


    </script>
</body>
</html>