<body onload="window.print()">
<style>
    table, td, th {
        border: 1px solid #ddd;
        text-align: left;
    }

    table {
        border-collapse: collapse;
    }

    th, td {
        padding: 15px;
    }
</style>


<h1>PROCESY:</h1>
<table id="customers">
    <tr>
        <th>NAZWA</th>
        <th>DATA ROZPOCZĘCIA</th>
        <th>DATA ZAKOŃCZENIA</th>
        <th>KRÓTKI OPIS</th>
        <th>SZCZEGÓŁOWY OPIS</th>
        <th>ILUSTRACJA GRAFICZNA</th>
    </tr>
    @foreach ($processes as $process)
    <tr>
        <td>{{$process->name}}</td>
        <td>{{$process->date_start}}</td>
        <td>{{$process->date_end}}</td>
        <td>{{$process->short_description}}</td>
        <td>{{$process->detailed_description}}</td>
        <td><img src="/images/{{$process->file_image}}" alt="{{$process->name}}" width="125" height="150"></td>
    </tr>
    @endforeach
</table>


<h1>ZDARZENIA:</h1>
<table id="customers">
    <tr>
        <th>NAZWA</th>
        <th>DATA ZAISTNIENIA</th>
        <th>KRÓTKI OPIS</th>
        <th>SZCZEGÓŁOWY OPIS</th>
        <th>ILUSTRACJA GRAFICZNA</th>
        <td>TYP</td>
    @foreach ($typesEvents as $type)
    @foreach ($type->events as $event)
        <tr>
            <td>{{$event->name}}</td>
            <td>{{$event->date}}</td>
            <td>{{$event->short_description}}</td>
            <td>{{$event->detailed_description}}</td>
            <td><img src="/images/{{$event->file_image}}" alt="{{$event->name}}" width="125" height="150"></td>
            <td>{{$type->name}}</td>
        </tr>
    @endforeach
    @endforeach
</table>

<h1>TYPY:</h1>
<table id="customers">
    <tr>
        <th>NAZWA</th>
        <th>KOLOR</th>
    @foreach ($typesEvents as $type)
            <tr>
                <td>{{$type->name}}</td>
                <td>
                    <div style="color:{{$type->color}}; background: currentcolor; height:15px;">{{$type->color}}</div>
                </td>
            </tr>
    @endforeach
</table>
</body>
