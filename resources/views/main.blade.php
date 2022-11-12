@extends('layouts.app')

@section('main')

    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 class="h2">Oś czasu</h1>

                <div class="btn-toolbar mb-2 mb-md-0 non-print">
                    <div class="btn-group mr-2">
                        <a class="btn btn-sm btn-outline-secondary" href="/print"
                           target="_blank" rel="noopener noreferrer">Drukuj</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="container"></div>
    <script>
        var processes = <?php echo json_encode($processes)?>;
        var types = <?php echo json_encode($typesEvents)?>;

                // create timeline chart
        var chart = anychart.timeline();
                // set chart's title
        chart.title('Oś czasu: Lionel Messi');

        for (var i = 0; i < processes.length; i++) {
                    // create range series
            var series = chart.range([
                [
                    processes[i].name,
                    processes[i].date_start,
                    processes[i].date_end
                ]
            ]);

            series.hovered()
                .fill(function () {
                    return this.sourceColor.color + ' .12';
                })
                .labels()
                .fontColor('#808080');

            // set range bar height
            series.height(55);
            series.labels().useHtml(true).format(
                '<br/><b>Nazwa: </b>' + processes[i].name +
                '<br/><b>{%start}{dateTimeFormat:dd MMM y}</b> -> <b>{%end}{dateTimeFormat:dd MMM y}</b>' +
                '<br/><b>Skrócony opis: </b>' + processes[i].short_description
            );

            var img = processes[i].file_image;
            var file = '<br/><img src="/images/' + img + '" width="150" height="150"/>'

            // set tooltip settings for the range series
            series
                .tooltip()
                .useHtml(true)
                .titleFormat('<h5>{%x}</h5>')
                .format(
                    '<br/><b>{%start}{dateTimeFormat:dd MMM y}</b> -> <b>{%end}{dateTimeFormat:dd MMM y}</b>' +
                    '<br/><b>Szczegółowy opis: </b>' + processes[i].detailed_description +
                    file
                );
        }

        //----------------------------------------------------------------------------------------------------------
        //----------------------------------------------------------------------------------------------------------
        for (var j = 0; j < types.length; j++) {

            var eventsDataSet = anychart.data.set(types[j].events);
            var eventsMapping = eventsDataSet.mapAs({
                x: 'date',
                value: 'name'
            });

            // create moment series
            var eventsSeries = chart.moment(eventsMapping);

            // set event series labels settings
            eventsSeries.labels().padding(25);
            eventsSeries.labels().useHtml(true).format('<br/><b>Nazwa: </b>{%name}' +
                '<br/><b>{%date}{dateTimeFormat:dd MMM y}</b>' +
                '<br/><b>Skrócony opis: </b>{%short_description}' +
                '<br/><b>Typ: </b>' + types[j].name
            );

            eventsSeries.labels().width(250);
            eventsSeries.labels().fontColor("#96a6a6");
            eventsSeries.labels().background().stroke(types[j].color, 4);
            // set tooltip settings for the event series
            eventsSeries
                .tooltip()
                .anchor('center-bottom')
                .useHtml(true)
                .titleFormat('<h5>{%date}{dateTimeFormat:dd MMM y} - {%name}</h5>')
                .format('<br/><b>Szczegółowy opis: </b>{%detailed_description}' +
                    '<br/><img src="/images/{%file_image}" width="150" height="150"/>');

            eventsSeries.direction("up");
            eventsSeries.markers().type("diamond");
            eventsSeries.normal().markers().size(8);
            eventsSeries.hovered().markers().size(8);
            eventsSeries.selected().markers().size(8);
            eventsSeries.normal().markers().fill(types[j].color);
            eventsSeries.hovered().markers().fill(types[j].color);
            eventsSeries.selected().markers().fill(types[j].color);
            eventsSeries.normal().markers().stroke(types[j].color, 2);
            eventsSeries.hovered().markers().stroke(types[j].color, 2);
            eventsSeries.selected().markers().stroke(types[j].color, 2);
        }
        //-----------------------------------------------------------------------------------------------------------
                 // get timeline axis
        var axis = chart.axis();

                 // set timeliner axis height
        axis.height(25);

                // set timeline axis labels settings
        axis
            .labels()
            .padding(5)
            .fontSize(12)
            .format('{%value}{dateTimeFormat:yyyy}');

                // set chart scale zoom levels
        chart.scale().zoomLevels([
            [
                { unit: 'year', count: 0 },
                { unit: 'year', count: 15 },
                { unit: 'year', count: 25}
            ],
            [
                { unit: 'year', count: 5 },
                { unit: 'year', count: 10 },
                { unit: 'year', count: 20 }
            ]
        ]);

        chart.scroller().enabled(true);
        var zoom = anychart.ui.zoom();
        zoom.render(chart);
        // set container id for the chart
        chart.container('container');
        // initiate chart drawing
        chart.draw();
        // set default chart zoom
        chart.zoomTo(new Date('1980/01/01'), new Date('2050/11/08'));

</script>

@endsection
