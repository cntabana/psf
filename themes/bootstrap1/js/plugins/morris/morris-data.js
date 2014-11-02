$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2010 Q1',
            open: 2666,
            processed: null,
            closed: 2647
        }, {
            period: '2010 Q2',
            open: 2778,
            processed: 2294,
            closed: 2441
        }, {
            period: '2010 Q3',
            open: 4912,
            processed: 1969,
            closed: 2501
        }, {
            period: '2010 Q4',
            open: 3767,
            processed: 3597,
            closed: 5689
        }, {
            period: '2011 Q1',
            open: 6810,
            processed: 1914,
            closed: 2293
        }, {
            period: '2011 Q2',
            open: 5670,
            processed: 4293,
            closed: 1881
        }, {
            period: '2011 Q3',
            open: 4820,
            processed: 3795,
            closed: 1588
        }, {
            period: '2011 Q4',
            open: 15073,
            processed: 5967,
            closed: 5175
        }, {
            period: '2012 Q1',
            open: 10687,
            processed: 4460,
            closed: 2028
        }, {
            period: '2012 Q2',
            open: 8432,
            processed: 5713,
            closed: 1791
        }],
        xkey: 'period',
        ykeys: ['open', 'processed', 'closed'],
        labels: ['Open Requests', 'Processed Requests', 'Closed Request'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Download Sales",
            value: 12
        }, {
            label: "In-Store Sales",
            value: 30
        }, {
            label: "Mail-Order Sales",
            value: 20
        }],
        resize: true
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2010',
            a: 50,
            b: 40
        }, {
            y: '2011',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
    });

});
