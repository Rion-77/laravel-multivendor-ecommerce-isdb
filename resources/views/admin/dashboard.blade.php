@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous" />
@endsection

@section('scripts')
    <!--begin::Charts follow the colour mode-->
    <script>
        // ApexCharts draws light-theme tooltips and axis text unless told otherwise,
        // which is unreadable in dark mode (#6105). Give it the page's colour mode as
        // a global default before any chart is created — this runs before the chart
        // pages' own scripts — and keep every chart that has a `chart.id` in step
        // when the mode changes (ColorMode, the OS in auto mode, or your own code).
        (() => {
            'use strict';
            const mode = () =>
                document.documentElement.getAttribute('data-bs-theme') === 'dark' ? 'dark' : 'light';
            // `Apex` is ApexCharts' global-options object; it must exist before the library loads.
            // theme.mode also sets a dark chart background — keep the card's instead.
            // eslint-disable-next-line unicorn/no-global-object-property-assignment
            globalThis.Apex ||= {};
            const apex = globalThis.Apex;
            apex.theme = {
                mode: mode()
            };
            apex.chart = Object.assign(apex.chart || {}, {
                background: 'transparent'
            });
            new MutationObserver(() => {
                const next = mode();
                apex.theme = {
                    mode: next
                };
                const instances = apex._chartInstances || [];
                for (const {
                        chart
                    }
                    of instances) {
                    chart.updateOptions({
                        theme: {
                            mode: next
                        }
                    }, false, false);
                }
            }).observe(document.documentElement, {
                attributes: true,
                attributeFilter: ['data-bs-theme'],
            });
        })();
    </script>
    <!--end::Charts follow the colour mode-->

    <!--begin::Color Mode Toggle-->
    <!-- The light/dark/auto switcher ships in adminlte.js as the ColorMode
         module (since 4.1) — no page script needed. Only the no-flash snippet
         in <head> stays inline, because it must run before first paint. -->
    <!--end::Color Mode Toggle-->

    <!-- OPTIONAL SCRIPTS -->

    <!-- apexcharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
        integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
    <script>
        // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
        // IT'S ALL JUST JUNK FOR DEMO
        // ++++++++++++++++++++++++++++++++++++++++++

        const visitors_chart_options = {
            series: [{
                    name: 'High - 2023',
                    data: [100, 120, 170, 167, 180, 177, 160],
                },
                {
                    name: 'Low - 2023',
                    data: [60, 80, 70, 67, 80, 77, 100],
                },
            ],
            chart: {
                id: 'visitors-chart',
                height: 200,
                type: 'line',
                toolbar: {
                    show: false,
                },
            },
            colors: ['#0d6efd', '#adb5bd'],
            stroke: {
                curve: 'smooth',
            },
            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5,
                },
            },
            legend: {
                show: false,
            },
            markers: {
                size: 1,
            },
            xaxis: {
                categories: ['22th', '23th', '24th', '25th', '26th', '27th', '28th'],
            },
        };

        const visitors_chart = new ApexCharts(
            document.querySelector('#visitors-chart'),
            visitors_chart_options,
        );
        visitors_chart.render();

        const sales_chart_options = {
            series: [{
                    name: 'Net Profit',
                    data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
                },
                {
                    name: 'Revenue',
                    data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
                },
                {
                    name: 'Free Cash Flow',
                    data: [35, 41, 36, 26, 45, 48, 52, 53, 41],
                },
            ],
            chart: {
                id: 'sales-chart',
                type: 'bar',
                height: 200,
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded',
                },
            },
            legend: {
                show: false,
            },
            colors: ['#0d6efd', '#20c997', '#ffc107'],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent'],
            },
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            fill: {
                opacity: 1,
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return '$ ' + val + ' thousands';
                    },
                },
            },
        };

        const sales_chart = new ApexCharts(
            document.querySelector('#sales-chart'),
            sales_chart_options,
        );
        sales_chart.render();
    </script>
@endsection

@section('content')
<main class="app-main" id="main" tabindex="-1">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-0 fs-3">Dashboard v3</h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard v3</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Online Store Visitors</h3>
                                <a href="javascript:void(0);"
                                    class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">View
                                    Report</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="fw-bold fs-5">820</span>
                                    <span>Visitors Over Time</span>
                                </p>
                                <p class="ms-auto d-flex flex-column text-end">
                                    <span class="text-success"> <i class="bi bi-arrow-up"></i> 12.5% </span>
                                    <span class="text-secondary">Since last week</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <div id="visitors-chart" style="min-height: 215px;">
                                    <div id="apexchartsvisitors-chart"
                                        class="apexcharts-canvas apexchartsvisitors-chart apexcharts-theme-dark"
                                        style="width: 541px; height: 200px;"><svg id="SvgjsSvg1628" width="541"
                                            height="200" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                            class="apexcharts-svg apexcharts-zoomable hovering-zoom"
                                            xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                            style="background: transparent;">
                                            <rect id="SvgjsRect1634" width="0" height="0" x="0" y="0"
                                                rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                            <g id="SvgjsG1725" class="apexcharts-yaxis" rel="0"
                                                transform="translate(15.380620956420898, 0)">
                                                <g id="SvgjsG1726" class="apexcharts-yaxis-texts-g"><text
                                                        id="SvgjsText1728" font-family="Helvetica, Arial, sans-serif"
                                                        x="20" y="31.6" text-anchor="end" dominant-baseline="auto"
                                                        font-size="11px" font-weight="400" fill="#f6f7f8"
                                                        class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1729">210</tspan>
                                                        <title>210</title>
                                                    </text><text id="SvgjsText1731"
                                                        font-family="Helvetica, Arial, sans-serif" x="20"
                                                        y="53.90692299779257" text-anchor="end" dominant-baseline="auto"
                                                        font-size="11px" font-weight="400" fill="#f6f7f8"
                                                        class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1732">180</tspan>
                                                        <title>180</title>
                                                    </text><text id="SvgjsText1734"
                                                        font-family="Helvetica, Arial, sans-serif" x="20"
                                                        y="76.21384599558513" text-anchor="end" dominant-baseline="auto"
                                                        font-size="11px" font-weight="400" fill="#f6f7f8"
                                                        class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1735">150</tspan>
                                                        <title>150</title>
                                                    </text><text id="SvgjsText1737"
                                                        font-family="Helvetica, Arial, sans-serif" x="20"
                                                        y="98.5207689933777" text-anchor="end"
                                                        dominant-baseline="auto" font-size="11px" font-weight="400"
                                                        fill="#f6f7f8" class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1738">120</tspan>
                                                        <title>120</title>
                                                    </text><text id="SvgjsText1740"
                                                        font-family="Helvetica, Arial, sans-serif" x="20"
                                                        y="120.82769199117027" text-anchor="end"
                                                        dominant-baseline="auto" font-size="11px" font-weight="400"
                                                        fill="#f6f7f8" class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1741">90</tspan>
                                                        <title>90</title>
                                                    </text><text id="SvgjsText1743"
                                                        font-family="Helvetica, Arial, sans-serif" x="20"
                                                        y="143.13461498896282" text-anchor="end"
                                                        dominant-baseline="auto" font-size="11px" font-weight="400"
                                                        fill="#f6f7f8" class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1744">60</tspan>
                                                        <title>60</title>
                                                    </text><text id="SvgjsText1746"
                                                        font-family="Helvetica, Arial, sans-serif" x="20"
                                                        y="165.44153798675538" text-anchor="end"
                                                        dominant-baseline="auto" font-size="11px" font-weight="400"
                                                        fill="#f6f7f8" class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1747">30</tspan>
                                                        <title>30</title>
                                                    </text></g>
                                            </g>
                                            <g id="SvgjsG1630" class="apexcharts-inner apexcharts-graphical"
                                                transform="translate(45.3806209564209, 30)">
                                                <defs id="SvgjsDefs1629">
                                                    <clipPath id="gridRectMaskt13eeimr">
                                                        <rect id="SvgjsRect1636" width="481.8170337677002"
                                                            height="138.84153798675538" x="-4.5" y="-2.5"
                                                            rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="forecastMaskt13eeimr"></clipPath>
                                                    <clipPath id="nonForecastMaskt13eeimr"></clipPath>
                                                    <clipPath id="gridRectMarkerMaskt13eeimr">
                                                        <rect id="SvgjsRect1637" width="508.8170337677002"
                                                            height="169.84153798675538" x="-18" y="-18" rx="0"
                                                            ry="0" opacity="1" stroke-width="0"
                                                            stroke="none" stroke-dasharray="0" fill="#fff">
                                                        </rect>
                                                    </clipPath>
                                                </defs>
                                                <line id="SvgjsLine1635" x1="157.10567792256674" y1="0"
                                                    x2="157.10567792256674" y2="133.84153798675538" stroke="#b6b6b6"
                                                    stroke-dasharray="3" stroke-linecap="butt"
                                                    class="apexcharts-xcrosshairs" x="157.10567792256674" y="0"
                                                    width="1" height="133.84153798675538" fill="#b1b9c4"
                                                    filter="none" fill-opacity="0.9" stroke-width="1"></line>
                                                <line id="SvgjsLine1677" x1="0" y1="134.84153798675538"
                                                    x2="0" y2="140.84153798675538" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1678" x1="78.80283896128337"
                                                    y1="134.84153798675538" x2="78.80283896128337"
                                                    y2="140.84153798675538" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1679" x1="157.60567792256674"
                                                    y1="134.84153798675538" x2="157.60567792256674"
                                                    y2="140.84153798675538" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1680" x1="236.4085168838501"
                                                    y1="134.84153798675538" x2="236.4085168838501"
                                                    y2="140.84153798675538" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1681" x1="315.2113558451335"
                                                    y1="134.84153798675538" x2="315.2113558451335"
                                                    y2="140.84153798675538" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1682" x1="394.01419480641687"
                                                    y1="134.84153798675538" x2="394.01419480641687"
                                                    y2="140.84153798675538" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1683" x1="472.81703376770025"
                                                    y1="134.84153798675538" x2="472.81703376770025"
                                                    y2="140.84153798675538" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                <g id="SvgjsG1673" class="apexcharts-grid">
                                                    <g id="SvgjsG1674" class="apexcharts-gridlines-horizontal">
                                                        <line id="SvgjsLine1685" x1="0"
                                                            y1="22.306922997792565" x2="472.8170337677002"
                                                            y2="22.306922997792565" stroke="#e7e7e7"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1686" x1="0"
                                                            y1="44.61384599558513" x2="472.8170337677002"
                                                            y2="44.61384599558513" stroke="#e7e7e7"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1687" x1="0"
                                                            y1="66.92076899337769" x2="472.8170337677002"
                                                            y2="66.92076899337769" stroke="#e7e7e7"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1688" x1="0"
                                                            y1="89.22769199117026" x2="472.8170337677002"
                                                            y2="89.22769199117026" stroke="#e7e7e7"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1689" x1="0"
                                                            y1="111.53461498896283" x2="472.8170337677002"
                                                            y2="111.53461498896283" stroke="#e7e7e7"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                    </g>
                                                    <g id="SvgjsG1675" class="apexcharts-gridlines-vertical"></g>
                                                    <rect id="SvgjsRect1691" width="472.8170337677002"
                                                        height="22.306922997792565" x="0" y="0" rx="0"
                                                        ry="0" opacity="0.5" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0" fill="#f3f3f3"
                                                        clip-path="url(#gridRectMaskt13eeimr)"
                                                        class="apexcharts-grid-row"></rect>
                                                    <rect id="SvgjsRect1692" width="472.8170337677002"
                                                        height="22.306922997792565" x="0" y="22.306922997792565"
                                                        rx="0" ry="0" opacity="0.5"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="transparent" clip-path="url(#gridRectMaskt13eeimr)"
                                                        class="apexcharts-grid-row"></rect>
                                                    <rect id="SvgjsRect1693" width="472.8170337677002"
                                                        height="22.306922997792565" x="0" y="44.61384599558513"
                                                        rx="0" ry="0" opacity="0.5"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#f3f3f3" clip-path="url(#gridRectMaskt13eeimr)"
                                                        class="apexcharts-grid-row"></rect>
                                                    <rect id="SvgjsRect1694" width="472.8170337677002"
                                                        height="22.306922997792565" x="0" y="66.92076899337769"
                                                        rx="0" ry="0" opacity="0.5"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="transparent" clip-path="url(#gridRectMaskt13eeimr)"
                                                        class="apexcharts-grid-row"></rect>
                                                    <rect id="SvgjsRect1695" width="472.8170337677002"
                                                        height="22.306922997792565" x="0" y="89.22769199117026"
                                                        rx="0" ry="0" opacity="0.5"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#f3f3f3" clip-path="url(#gridRectMaskt13eeimr)"
                                                        class="apexcharts-grid-row"></rect>
                                                    <rect id="SvgjsRect1696" width="472.8170337677002"
                                                        height="22.306922997792565" x="0" y="111.53461498896283"
                                                        rx="0" ry="0" opacity="0.5"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="transparent" clip-path="url(#gridRectMaskt13eeimr)"
                                                        class="apexcharts-grid-row"></rect>
                                                    <line id="SvgjsLine1698" x1="0" y1="133.84153798675538"
                                                        x2="472.8170337677002" y2="133.84153798675538"
                                                        stroke="transparent" stroke-dasharray="0"
                                                        stroke-linecap="butt"></line>
                                                    <line id="SvgjsLine1697" x1="0" y1="1"
                                                        x2="0" y2="133.84153798675538" stroke="transparent"
                                                        stroke-dasharray="0" stroke-linecap="butt"></line>
                                                </g>
                                                <g id="SvgjsG1676" class="apexcharts-grid-borders">
                                                    <line id="SvgjsLine1684" x1="0" y1="0"
                                                        x2="472.8170337677002" y2="0" stroke="#e7e7e7"
                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1690" x1="0" y1="133.84153798675538"
                                                        x2="472.8170337677002" y2="133.84153798675538"
                                                        stroke="#e7e7e7" stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1724" x1="0" y1="134.84153798675538"
                                                        x2="472.8170337677002" y2="134.84153798675538"
                                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1"
                                                        stroke-linecap="butt"></line>
                                                </g>
                                                <g id="SvgjsG1638"
                                                    class="apexcharts-line-series apexcharts-plot-series">
                                                    <g id="SvgjsG1639" class="apexcharts-series"
                                                        seriesName="Highx-x2023" data:longestSeries="true"
                                                        rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath1655"
                                                            d="M 0 81.79205099190605C 27.58099363644918 81.79205099190605 51.22184532483419 66.92076899337768 78.80283896128337 66.92076899337768C 106.38383259773255 66.92076899337768 130.02468428611758 29.74256399705675 157.60567792256674 29.74256399705675C 185.1866715590159 29.74256399705675 208.82752324740093 31.973256296836 236.4085168838501 31.973256296836C 263.9895105202993 31.973256296836 287.6303622086843 22.306922997792554 315.2113558451335 22.306922997792554C 342.7923494815826 22.306922997792554 366.4332011699677 24.53761529757182 394.0141948064168 24.53761529757182C 421.595188442866 24.53761529757182 445.236040131251 37.17820499632093 472.8170337677002 37.17820499632093"
                                                            fill="none" fill-opacity="1"
                                                            stroke="rgba(13,110,253,0.85)" stroke-opacity="1"
                                                            stroke-linecap="butt" stroke-width="5"
                                                            stroke-dasharray="0" class="apexcharts-line"
                                                            index="0" clip-path="url(#gridRectMaskt13eeimr)"
                                                            pathTo="M 0 81.79205099190605C 27.58099363644918 81.79205099190605 51.22184532483419 66.92076899337768 78.80283896128337 66.92076899337768C 106.38383259773255 66.92076899337768 130.02468428611758 29.74256399705675 157.60567792256674 29.74256399705675C 185.1866715590159 29.74256399705675 208.82752324740093 31.973256296836 236.4085168838501 31.973256296836C 263.9895105202993 31.973256296836 287.6303622086843 22.306922997792554 315.2113558451335 22.306922997792554C 342.7923494815826 22.306922997792554 366.4332011699677 24.53761529757182 394.0141948064168 24.53761529757182C 421.595188442866 24.53761529757182 445.236040131251 37.17820499632093 472.8170337677002 37.17820499632093"
                                                            pathFrom="M -1 156.14846098454794 L -1 156.14846098454794 L 78.80283896128337 156.14846098454794 L 157.60567792256674 156.14846098454794 L 236.4085168838501 156.14846098454794 L 315.2113558451335 156.14846098454794 L 394.0141948064168 156.14846098454794 L 472.8170337677002 156.14846098454794"
                                                            fill-rule="evenodd"></path>
                                                        <g id="SvgjsG1640" class="apexcharts-series-markers-wrap"
                                                            data:realIndex="0">
                                                            <g id="SvgjsG1642" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMaskt13eeimr)">
                                                                <circle id="SvgjsCircle1643" r="1" cx="0"
                                                                    cy="81.79205099190605"
                                                                    class="apexcharts-marker no-pointer-events wi6aq6kcrf"
                                                                    stroke="#ffffff" fill="#0d6efd" fill-opacity="1"
                                                                    stroke-width="2" stroke-opacity="0.9"
                                                                    rel="0" j="0" index="0"
                                                                    default-marker-size="1"></circle>
                                                                <circle id="SvgjsCircle1644" r="1"
                                                                    cx="78.80283896128337" cy="66.92076899337768"
                                                                    class="apexcharts-marker no-pointer-events whwef7xl0j"
                                                                    stroke="#ffffff" fill="#0d6efd" fill-opacity="1"
                                                                    stroke-width="2" stroke-opacity="0.9"
                                                                    rel="1" j="1" index="0"
                                                                    default-marker-size="1"></circle>
                                                            </g>
                                                            <g id="SvgjsG1645" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMaskt13eeimr)">
                                                                <circle id="SvgjsCircle1646" r="1"
                                                                    cx="157.60567792256674" cy="29.74256399705675"
                                                                    class="apexcharts-marker no-pointer-events whvfybgsm"
                                                                    stroke="#ffffff" fill="#0d6efd" fill-opacity="1"
                                                                    stroke-width="2" stroke-opacity="0.9"
                                                                    rel="2" j="2" index="0"
                                                                    default-marker-size="1"></circle>
                                                            </g>
                                                            <g id="SvgjsG1647" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMaskt13eeimr)">
                                                                <circle id="SvgjsCircle1648" r="1"
                                                                    cx="236.4085168838501" cy="31.973256296836"
                                                                    class="apexcharts-marker no-pointer-events we1t08ffn"
                                                                    stroke="#ffffff" fill="#0d6efd" fill-opacity="1"
                                                                    stroke-width="2" stroke-opacity="0.9"
                                                                    rel="3" j="3" index="0"
                                                                    default-marker-size="1"></circle>
                                                            </g>
                                                            <g id="SvgjsG1649" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMaskt13eeimr)">
                                                                <circle id="SvgjsCircle1650" r="1"
                                                                    cx="315.2113558451335" cy="22.306922997792554"
                                                                    class="apexcharts-marker no-pointer-events wwhuhtif1"
                                                                    stroke="#ffffff" fill="#0d6efd" fill-opacity="1"
                                                                    stroke-width="2" stroke-opacity="0.9"
                                                                    rel="4" j="4" index="0"
                                                                    default-marker-size="1"></circle>
                                                            </g>
                                                            <g id="SvgjsG1651" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMaskt13eeimr)">
                                                                <circle id="SvgjsCircle1652" r="1"
                                                                    cx="394.0141948064168" cy="24.53761529757182"
                                                                    class="apexcharts-marker no-pointer-events w4oo0uvie"
                                                                    stroke="#ffffff" fill="#0d6efd" fill-opacity="1"
                                                                    stroke-width="2" stroke-opacity="0.9"
                                                                    rel="5" j="5" index="0"
                                                                    default-marker-size="1"></circle>
                                                            </g>
                                                            <g id="SvgjsG1653" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMaskt13eeimr)">
                                                                <circle id="SvgjsCircle1654" r="1"
                                                                    cx="472.8170337677002" cy="37.17820499632093"
                                                                    class="apexcharts-marker no-pointer-events wdnlqht6c"
                                                                    stroke="#ffffff" fill="#0d6efd" fill-opacity="1"
                                                                    stroke-width="2" stroke-opacity="0.9"
                                                                    rel="6" j="6" index="0"
                                                                    default-marker-size="1"></circle>
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <g id="SvgjsG1656" class="apexcharts-series"
                                                        seriesName="Lowx-x2023" data:longestSeries="true"
                                                        rel="2" data:realIndex="1">
                                                        <path id="SvgjsPath1672"
                                                            d="M 0 111.5346149889628C 27.58099363644918 111.5346149889628 51.22184532483419 96.66333299043444 78.80283896128337 96.66333299043444C 106.38383259773255 96.66333299043444 130.02468428611758 104.09897398969862 157.60567792256674 104.09897398969862C 185.1866715590159 104.09897398969862 208.82752324740093 106.32966628947787 236.4085168838501 106.32966628947787C 263.9895105202993 106.32966628947787 287.6303622086843 96.66333299043444 315.2113558451335 96.66333299043444C 342.7923494815826 96.66333299043444 366.4332011699677 98.89402529021369 394.0141948064168 98.89402529021369C 421.595188442866 98.89402529021369 445.236040131251 81.79205099190605 472.8170337677002 81.79205099190605"
                                                            fill="none" fill-opacity="1"
                                                            stroke="rgba(173,181,189,0.85)" stroke-opacity="1"
                                                            stroke-linecap="butt" stroke-width="5"
                                                            stroke-dasharray="0" class="apexcharts-line"
                                                            index="1" clip-path="url(#gridRectMaskt13eeimr)"
                                                            pathTo="M 0 111.5346149889628C 27.58099363644918 111.5346149889628 51.22184532483419 96.66333299043444 78.80283896128337 96.66333299043444C 106.38383259773255 96.66333299043444 130.02468428611758 104.09897398969862 157.60567792256674 104.09897398969862C 185.1866715590159 104.09897398969862 208.82752324740093 106.32966628947787 236.4085168838501 106.32966628947787C 263.9895105202993 106.32966628947787 287.6303622086843 96.66333299043444 315.2113558451335 96.66333299043444C 342.7923494815826 96.66333299043444 366.4332011699677 98.89402529021369 394.0141948064168 98.89402529021369C 421.595188442866 98.89402529021369 445.236040131251 81.79205099190605 472.8170337677002 81.79205099190605"
                                                            pathFrom="M -1 156.14846098454794 L -1 156.14846098454794 L 78.80283896128337 156.14846098454794 L 157.60567792256674 156.14846098454794 L 236.4085168838501 156.14846098454794 L 315.2113558451335 156.14846098454794 L 394.0141948064168 156.14846098454794 L 472.8170337677002 156.14846098454794"
                                                            fill-rule="evenodd"></path>
                                                        <g id="SvgjsG1657" class="apexcharts-series-markers-wrap"
                                                            data:realIndex="1">
                                                            <g id="SvgjsG1659" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMaskt13eeimr)">
                                                                <circle id="SvgjsCircle1660" r="1" cx="0"
                                                                    cy="111.5346149889628"
                                                                    class="apexcharts-marker no-pointer-events w1vx9smkk"
                                                                    stroke="#ffffff" fill="#adb5bd" fill-opacity="1"
                                                                    stroke-width="2" stroke-opacity="0.9"
                                                                    rel="0" j="0" index="1"
                                                                    default-marker-size="1"></circle>
                                                                <circle id="SvgjsCircle1661" r="1"
                                                                    cx="78.80283896128337" cy="96.66333299043444"
                                                                    class="apexcharts-marker no-pointer-events wjxzdtfmo"
                                                                    stroke="#ffffff" fill="#adb5bd" fill-opacity="1"
                                                                    stroke-width="2" stroke-opacity="0.9"
                                                                    rel="1" j="1" index="1"
                                                                    default-marker-size="1"></circle>
                                                            </g>
                                                            <g id="SvgjsG1662" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMaskt13eeimr)">
                                                                <circle id="SvgjsCircle1663" r="1"
                                                                    cx="157.60567792256674" cy="104.09897398969862"
                                                                    class="apexcharts-marker no-pointer-events w3j9syryj"
                                                                    stroke="#ffffff" fill="#adb5bd" fill-opacity="1"
                                                                    stroke-width="2" stroke-opacity="0.9"
                                                                    rel="2" j="2" index="1"
                                                                    default-marker-size="1"></circle>
                                                            </g>
                                                            <g id="SvgjsG1664" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMaskt13eeimr)">
                                                                <circle id="SvgjsCircle1665" r="1"
                                                                    cx="236.4085168838501" cy="106.32966628947787"
                                                                    class="apexcharts-marker no-pointer-events weh5jfaux"
                                                                    stroke="#ffffff" fill="#adb5bd" fill-opacity="1"
                                                                    stroke-width="2" stroke-opacity="0.9"
                                                                    rel="3" j="3" index="1"
                                                                    default-marker-size="1"></circle>
                                                            </g>
                                                            <g id="SvgjsG1666" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMaskt13eeimr)">
                                                                <circle id="SvgjsCircle1667" r="1"
                                                                    cx="315.2113558451335" cy="96.66333299043444"
                                                                    class="apexcharts-marker no-pointer-events wo767395g"
                                                                    stroke="#ffffff" fill="#adb5bd" fill-opacity="1"
                                                                    stroke-width="2" stroke-opacity="0.9"
                                                                    rel="4" j="4" index="1"
                                                                    default-marker-size="1"></circle>
                                                            </g>
                                                            <g id="SvgjsG1668" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMaskt13eeimr)">
                                                                <circle id="SvgjsCircle1669" r="1"
                                                                    cx="394.0141948064168" cy="98.89402529021369"
                                                                    class="apexcharts-marker no-pointer-events wc9j1uwti"
                                                                    stroke="#ffffff" fill="#adb5bd" fill-opacity="1"
                                                                    stroke-width="2" stroke-opacity="0.9"
                                                                    rel="5" j="5" index="1"
                                                                    default-marker-size="1"></circle>
                                                            </g>
                                                            <g id="SvgjsG1670" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMaskt13eeimr)">
                                                                <circle id="SvgjsCircle1671" r="1"
                                                                    cx="472.8170337677002" cy="81.79205099190605"
                                                                    class="apexcharts-marker no-pointer-events w3o5wqj4wh"
                                                                    stroke="#ffffff" fill="#adb5bd" fill-opacity="1"
                                                                    stroke-width="2" stroke-opacity="0.9"
                                                                    rel="6" j="6" index="1"
                                                                    default-marker-size="1"></circle>
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <g id="SvgjsG1641" class="apexcharts-datalabels"
                                                        data:realIndex="0"></g>
                                                    <g id="SvgjsG1658" class="apexcharts-datalabels"
                                                        data:realIndex="1"></g>
                                                </g>
                                                <line id="SvgjsLine1699" x1="0" y1="0"
                                                    x2="472.8170337677002" y2="0" stroke="#b6b6b6"
                                                    stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine1700" x1="0" y1="0"
                                                    x2="472.8170337677002" y2="0" stroke-dasharray="0"
                                                    stroke-width="0" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                                <g id="SvgjsG1701" class="apexcharts-xaxis"
                                                    transform="translate(0, 0)">
                                                    <g id="SvgjsG1702" class="apexcharts-xaxis-texts-g"
                                                        transform="translate(0, -4)"><text id="SvgjsText1704"
                                                            font-family="Helvetica, Arial, sans-serif" x="0"
                                                            y="162.84153798675538" text-anchor="middle"
                                                            dominant-baseline="auto" font-size="12px"
                                                            font-weight="400" fill="#f6f7f8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1705">22th</tspan>
                                                            <title>22th</title>
                                                        </text><text id="SvgjsText1707"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="78.80283896128336" y="162.84153798675538"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#f6f7f8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1708">23th</tspan>
                                                            <title>23th</title>
                                                        </text><text id="SvgjsText1710"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="157.60567792256674" y="162.84153798675538"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#f6f7f8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1711">24th</tspan>
                                                            <title>24th</title>
                                                        </text><text id="SvgjsText1713"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="236.40851688385013" y="162.84153798675538"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#f6f7f8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1714">25th</tspan>
                                                            <title>25th</title>
                                                        </text><text id="SvgjsText1716"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="315.21135584513354" y="162.84153798675538"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#f6f7f8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1717">26th</tspan>
                                                            <title>26th</title>
                                                        </text><text id="SvgjsText1719"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="394.0141948064169" y="162.84153798675538"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#f6f7f8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1720">27th</tspan>
                                                            <title>27th</title>
                                                        </text><text id="SvgjsText1722"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="472.81703376770025" y="162.84153798675538"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#f6f7f8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1723">28th</tspan>
                                                            <title>28th</title>
                                                        </text></g>
                                                </g>
                                                <g id="SvgjsG1748" class="apexcharts-yaxis-annotations"></g>
                                                <g id="SvgjsG1749" class="apexcharts-xaxis-annotations"></g>
                                                <g id="SvgjsG1750" class="apexcharts-point-annotations"></g>
                                                <rect id="SvgjsRect1751" width="0" height="0" x="0" y="0"
                                                    rx="0" ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fefefe"
                                                    class="apexcharts-zoom-rect"></rect>
                                                <rect id="SvgjsRect1752" width="0" height="0" x="0" y="0"
                                                    rx="0" ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fefefe"
                                                    class="apexcharts-selection-rect"></rect>
                                            </g>
                                            <g id="SvgjsG1631" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend" style="max-height: 100px;"></div>
                                        <div class="apexcharts-tooltip apexcharts-theme-dark"
                                            style="left: 214.986px; top: 63.1324px;">
                                            <div class="apexcharts-tooltip-title"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                24th</div>
                                            <div class="apexcharts-tooltip-series-group apexcharts-active"
                                                style="order: 1; display: flex;"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(13, 110, 253);"></span>
                                                <div class="apexcharts-tooltip-text"
                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-y-label">High - 2023:
                                                        </span><span class="apexcharts-tooltip-text-y-value">170</span>
                                                    </div>
                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                            class="apexcharts-tooltip-text-goals-value"></span></div>
                                                    <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                                </div>
                                            </div>
                                            <div class="apexcharts-tooltip-series-group apexcharts-active"
                                                style="order: 2; display: flex;"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(173, 181, 189);"></span>
                                                <div class="apexcharts-tooltip-text"
                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-y-label">Low - 2023:
                                                        </span><span class="apexcharts-tooltip-text-y-value">70</span>
                                                    </div>
                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                            class="apexcharts-tooltip-text-goals-value"></span></div>
                                                    <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-dark"
                                            style="left: 180.034px; top: 165.842px;">
                                            <div class="apexcharts-xaxistooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; min-width: 21.4346px;">
                                                24th</div>
                                        </div>
                                        <div
                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-dark">
                                            <div class="apexcharts-yaxistooltip-text"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                                <span class="me-2">
                                    <i class="bi bi-square-fill text-primary"></i> This Week
                                </span>

                                <span> <i class="bi bi-square-fill text-secondary"></i> Last Week </span>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                    <div class="card mb-4">
                        <div class="card-header border-0">
                            <h3 class="card-title">Products</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-sm" aria-label="Download">
                                    <i class="bi bi-download"></i>
                                </a>
                                <a href="#" class="btn btn-tool btn-sm" aria-label="More options">
                                    <i class="bi bi-list"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped align-middle" role="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Sales</th>
                                        <th scope="col">More</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="./assets/img/default-150x150.png" alt="Product 1"
                                                class="rounded-circle img-size-32 me-2">
                                            Some Product
                                        </td>
                                        <td>$13 USD</td>
                                        <td>
                                            <small class="text-success me-1">
                                                <i class="bi bi-arrow-up"></i>
                                                12%
                                            </small>
                                            12,000 Sold
                                        </td>
                                        <td>
                                            <a href="#" class="text-secondary">
                                                <i class="bi bi-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="./assets/img/default-150x150.png" alt="Product 1"
                                                class="rounded-circle img-size-32 me-2">
                                            Another Product
                                        </td>
                                        <td>$29 USD</td>
                                        <td>
                                            <small class="text-info me-1">
                                                <i class="bi bi-arrow-down"></i>
                                                0.5%
                                            </small>
                                            123,234 Sold
                                        </td>
                                        <td>
                                            <a href="#" class="text-secondary">
                                                <i class="bi bi-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="./assets/img/default-150x150.png" alt="Product 1"
                                                class="rounded-circle img-size-32 me-2">
                                            Amazing Product
                                        </td>
                                        <td>$1,230 USD</td>
                                        <td>
                                            <small class="text-danger me-1">
                                                <i class="bi bi-arrow-down"></i>
                                                3%
                                            </small>
                                            198 Sold
                                        </td>
                                        <td>
                                            <a href="#" class="text-secondary">
                                                <i class="bi bi-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="./assets/img/default-150x150.png" alt="Product 1"
                                                class="rounded-circle img-size-32 me-2">
                                            Perfect Item
                                            <span class="badge text-bg-danger">NEW</span>
                                        </td>
                                        <td>$199 USD</td>
                                        <td>
                                            <small class="text-success me-1">
                                                <i class="bi bi-arrow-up"></i>
                                                63%
                                            </small>
                                            87 Sold
                                        </td>
                                        <td>
                                            <a href="#" class="text-secondary">
                                                <i class="bi bi-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Sales</h3>
                                <a href="javascript:void(0);"
                                    class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">View
                                    Report</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="fw-bold fs-5">$18,230.00</span>
                                    <span>Sales Over Time</span>
                                </p>
                                <p class="ms-auto d-flex flex-column text-end">
                                    <span class="text-success"> <i class="bi bi-arrow-up"></i> 33.1% </span>
                                    <span class="text-secondary">Since Past Year</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <div id="sales-chart" style="min-height: 215px;">
                                    <div id="apexchartssales-chart"
                                        class="apexcharts-canvas apexchartssales-chart apexcharts-theme-dark"
                                        style="width: 541px; height: 200px;"><svg id="SvgjsSvg1753" width="541"
                                            height="200" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                            class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                            transform="translate(0, 0)" style="background: transparent;">
                                            <g id="SvgjsG1883" class="apexcharts-yaxis" rel="0"
                                                transform="translate(15.380596160888672, 0)">
                                                <g id="SvgjsG1884" class="apexcharts-yaxis-texts-g"><text
                                                        id="SvgjsText1886" font-family="Helvetica, Arial, sans-serif"
                                                        x="20" y="31.4" text-anchor="end" dominant-baseline="auto"
                                                        font-size="11px" font-weight="400" fill="#f6f7f8"
                                                        class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1887">120</tspan>
                                                        <title>120</title>
                                                    </text><text id="SvgjsText1889"
                                                        font-family="Helvetica, Arial, sans-serif" x="20"
                                                        y="64.86038449668885" text-anchor="end"
                                                        dominant-baseline="auto" font-size="11px" font-weight="400"
                                                        fill="#f6f7f8" class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1890">90</tspan>
                                                        <title>90</title>
                                                    </text><text id="SvgjsText1892"
                                                        font-family="Helvetica, Arial, sans-serif" x="20"
                                                        y="98.3207689933777" text-anchor="end"
                                                        dominant-baseline="auto" font-size="11px" font-weight="400"
                                                        fill="#f6f7f8" class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1893">60</tspan>
                                                        <title>60</title>
                                                    </text><text id="SvgjsText1895"
                                                        font-family="Helvetica, Arial, sans-serif" x="20"
                                                        y="131.78115349006654" text-anchor="end"
                                                        dominant-baseline="auto" font-size="11px" font-weight="400"
                                                        fill="#f6f7f8" class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1896">30</tspan>
                                                        <title>30</title>
                                                    </text><text id="SvgjsText1898"
                                                        font-family="Helvetica, Arial, sans-serif" x="20"
                                                        y="165.2415379867554" text-anchor="end"
                                                        dominant-baseline="auto" font-size="11px" font-weight="400"
                                                        fill="#f6f7f8" class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1899">0</tspan>
                                                        <title>0</title>
                                                    </text></g>
                                            </g>
                                            <g id="SvgjsG1755" class="apexcharts-inner apexcharts-graphical"
                                                transform="translate(45.38059616088867, 30)">
                                                <defs id="SvgjsDefs1754">
                                                    <linearGradient id="SvgjsLinearGradient1759" x1="0"
                                                        y1="0" x2="0" y2="1">
                                                        <stop id="SvgjsStop1760" stop-opacity="0.4"
                                                            stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                        <stop id="SvgjsStop1761" stop-opacity="0.5"
                                                            stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                        <stop id="SvgjsStop1762" stop-opacity="0.5"
                                                            stop-color="rgba(190,209,230,0.5)" offset="1">
                                                        </stop>
                                                    </linearGradient>
                                                    <clipPath id="gridRectMaskb6jh40fp">
                                                        <rect id="SvgjsRect1764" width="491.6194038391113"
                                                            height="135.84153798675538" x="-3" y="-1" rx="0"
                                                            ry="0" opacity="1" stroke-width="0"
                                                            stroke="none" stroke-dasharray="0" fill="#fff">
                                                        </rect>
                                                    </clipPath>
                                                    <clipPath id="forecastMaskb6jh40fp"></clipPath>
                                                    <clipPath id="nonForecastMaskb6jh40fp"></clipPath>
                                                    <clipPath id="gridRectMarkerMaskb6jh40fp">
                                                        <rect id="SvgjsRect1765" width="489.6194038391113"
                                                            height="137.84153798675538" x="-2" y="-2" rx="0"
                                                            ry="0" opacity="1" stroke-width="0"
                                                            stroke="none" stroke-dasharray="0" fill="#fff">
                                                        </rect>
                                                    </clipPath>
                                                </defs>
                                                <rect id="SvgjsRect1763" width="9.892247115241156"
                                                    height="133.84153798675538" x="0" y="0" rx="0"
                                                    ry="0" opacity="1" stroke-width="0"
                                                    stroke-dasharray="3" fill="url(#SvgjsLinearGradient1759)"
                                                    class="apexcharts-xcrosshairs" y2="133.84153798675538"
                                                    filter="none" fill-opacity="0.9"></rect>
                                                <line id="SvgjsLine1834" x1="0" y1="134.84153798675538"
                                                    x2="0" y2="140.84153798675538" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1835" x1="53.95771153767904"
                                                    y1="134.84153798675538" x2="53.95771153767904"
                                                    y2="140.84153798675538" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1836" x1="107.91542307535808"
                                                    y1="134.84153798675538" x2="107.91542307535808"
                                                    y2="140.84153798675538" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1837" x1="161.8731346130371"
                                                    y1="134.84153798675538" x2="161.8731346130371"
                                                    y2="140.84153798675538" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1838" x1="215.83084615071616"
                                                    y1="134.84153798675538" x2="215.83084615071616"
                                                    y2="140.84153798675538" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1839" x1="269.7885576883952"
                                                    y1="134.84153798675538" x2="269.7885576883952"
                                                    y2="140.84153798675538" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1840" x1="323.7462692260742"
                                                    y1="134.84153798675538" x2="323.7462692260742"
                                                    y2="140.84153798675538" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1841" x1="377.70398076375324"
                                                    y1="134.84153798675538" x2="377.70398076375324"
                                                    y2="140.84153798675538" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1842" x1="431.66169230143225"
                                                    y1="134.84153798675538" x2="431.66169230143225"
                                                    y2="140.84153798675538" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1843" x1="485.61940383911127"
                                                    y1="134.84153798675538" x2="485.61940383911127"
                                                    y2="140.84153798675538" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                <g id="SvgjsG1830" class="apexcharts-grid">
                                                    <g id="SvgjsG1831" class="apexcharts-gridlines-horizontal">
                                                        <line id="SvgjsLine1845" x1="0"
                                                            y1="33.460384496688846" x2="485.6194038391113"
                                                            y2="33.460384496688846" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1846" x1="0"
                                                            y1="66.92076899337769" x2="485.6194038391113"
                                                            y2="66.92076899337769" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1847" x1="0"
                                                            y1="100.38115349006654" x2="485.6194038391113"
                                                            y2="100.38115349006654" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                    </g>
                                                    <g id="SvgjsG1832" class="apexcharts-gridlines-vertical"></g>
                                                    <line id="SvgjsLine1850" x1="0"
                                                        y1="133.84153798675538" x2="485.6194038391113"
                                                        y2="133.84153798675538" stroke="transparent"
                                                        stroke-dasharray="0" stroke-linecap="butt"></line>
                                                    <line id="SvgjsLine1849" x1="0" y1="1"
                                                        x2="0" y2="133.84153798675538"
                                                        stroke="transparent" stroke-dasharray="0"
                                                        stroke-linecap="butt"></line>
                                                </g>
                                                <g id="SvgjsG1833" class="apexcharts-grid-borders">
                                                    <line id="SvgjsLine1844" x1="0" y1="0"
                                                        x2="485.6194038391113" y2="0" stroke="#e0e0e0"
                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1848" x1="0"
                                                        y1="133.84153798675538" x2="485.6194038391113"
                                                        y2="133.84153798675538" stroke="#e0e0e0"
                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1882" x1="0"
                                                        y1="134.84153798675538" x2="485.6194038391113"
                                                        y2="134.84153798675538" stroke="#e0e0e0"
                                                        stroke-dasharray="0" stroke-width="1"
                                                        stroke-linecap="butt"></line>
                                                </g>
                                                <g id="SvgjsG1766"
                                                    class="apexcharts-bar-series apexcharts-plot-series">
                                                    <g id="SvgjsG1767" class="apexcharts-series" rel="1"
                                                        seriesName="NetxProfit" data:realIndex="0">
                                                        <path id="SvgjsPath1771"
                                                            d="M 12.140485095977784 133.8425379867554 L 12.140485095977784 84.76730739161175 L 20.032732211218942 84.76730739161175 L 20.032732211218942 133.8425379867554 Z"
                                                            fill="rgba(13,110,253,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="0" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 12.140485095977784 133.8425379867554 L 12.140485095977784 84.76730739161175 L 20.032732211218942 84.76730739161175 L 20.032732211218942 133.8425379867554 Z"
                                                            pathFrom="M 12.140485095977784 133.8425379867554 L 12.140485095977784 133.8425379867554 L 20.032732211218942 133.8425379867554 L 20.032732211218942 133.8425379867554 L 20.032732211218942 133.8425379867554 L 20.032732211218942 133.8425379867554 L 20.032732211218942 133.8425379867554 L 12.140485095977784 133.8425379867554 Z"
                                                            cy="84.76630739161175" cx="65.09819663365683" j="0"
                                                            val="44" barHeight="49.07523059514364"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1773"
                                                            d="M 66.09819663365683 133.8425379867554 L 66.09819663365683 72.49849974282583 L 73.99044374889799 72.49849974282583 L 73.99044374889799 133.8425379867554 Z"
                                                            fill="rgba(13,110,253,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="0" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 66.09819663365683 133.8425379867554 L 66.09819663365683 72.49849974282583 L 73.99044374889799 72.49849974282583 L 73.99044374889799 133.8425379867554 Z"
                                                            pathFrom="M 66.09819663365683 133.8425379867554 L 66.09819663365683 133.8425379867554 L 73.99044374889799 133.8425379867554 L 73.99044374889799 133.8425379867554 L 73.99044374889799 133.8425379867554 L 73.99044374889799 133.8425379867554 L 73.99044374889799 133.8425379867554 L 66.09819663365683 133.8425379867554 Z"
                                                            cy="72.49749974282582" cx="119.05590817133586" j="1"
                                                            val="55" barHeight="61.34403824392955"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1775"
                                                            d="M 120.05590817133586 133.8425379867554 L 120.05590817133586 70.26780744304658 L 127.94815528657702 70.26780744304658 L 127.94815528657702 133.8425379867554 Z"
                                                            fill="rgba(13,110,253,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="0" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 120.05590817133586 133.8425379867554 L 120.05590817133586 70.26780744304658 L 127.94815528657702 70.26780744304658 L 127.94815528657702 133.8425379867554 Z"
                                                            pathFrom="M 120.05590817133586 133.8425379867554 L 120.05590817133586 133.8425379867554 L 127.94815528657702 133.8425379867554 L 127.94815528657702 133.8425379867554 L 127.94815528657702 133.8425379867554 L 127.94815528657702 133.8425379867554 L 127.94815528657702 133.8425379867554 L 120.05590817133586 133.8425379867554 Z"
                                                            cy="70.26680744304657" cx="173.0136197090149" j="2"
                                                            val="57" barHeight="63.57473054370881"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1777"
                                                            d="M 174.0136197090149 133.8425379867554 L 174.0136197090149 71.38315359293621 L 181.90586682425607 71.38315359293621 L 181.90586682425607 133.8425379867554 Z"
                                                            fill="rgba(13,110,253,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="0" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 174.0136197090149 133.8425379867554 L 174.0136197090149 71.38315359293621 L 181.90586682425607 71.38315359293621 L 181.90586682425607 133.8425379867554 Z"
                                                            pathFrom="M 174.0136197090149 133.8425379867554 L 174.0136197090149 133.8425379867554 L 181.90586682425607 133.8425379867554 L 181.90586682425607 133.8425379867554 L 181.90586682425607 133.8425379867554 L 181.90586682425607 133.8425379867554 L 181.90586682425607 133.8425379867554 L 174.0136197090149 133.8425379867554 Z"
                                                            cy="71.3821535929362" cx="226.97133124669395" j="3"
                                                            val="56" barHeight="62.45938439381918"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1779"
                                                            d="M 227.97133124669395 133.8425379867554 L 227.97133124669395 65.80642284348806 L 235.8635783619351 65.80642284348806 L 235.8635783619351 133.8425379867554 Z"
                                                            fill="rgba(13,110,253,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="0" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 227.97133124669395 133.8425379867554 L 227.97133124669395 65.80642284348806 L 235.8635783619351 65.80642284348806 L 235.8635783619351 133.8425379867554 Z"
                                                            pathFrom="M 227.97133124669395 133.8425379867554 L 227.97133124669395 133.8425379867554 L 235.8635783619351 133.8425379867554 L 235.8635783619351 133.8425379867554 L 235.8635783619351 133.8425379867554 L 235.8635783619351 133.8425379867554 L 235.8635783619351 133.8425379867554 L 227.97133124669395 133.8425379867554 Z"
                                                            cy="65.80542284348806" cx="280.929042784373" j="4"
                                                            val="61" barHeight="68.03611514326732"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1781"
                                                            d="M 281.929042784373 133.8425379867554 L 281.929042784373 69.15246129315696 L 289.82128989961416 69.15246129315696 L 289.82128989961416 133.8425379867554 Z"
                                                            fill="rgba(13,110,253,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="0" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 281.929042784373 133.8425379867554 L 281.929042784373 69.15246129315696 L 289.82128989961416 69.15246129315696 L 289.82128989961416 133.8425379867554 Z"
                                                            pathFrom="M 281.929042784373 133.8425379867554 L 281.929042784373 133.8425379867554 L 289.82128989961416 133.8425379867554 L 289.82128989961416 133.8425379867554 L 289.82128989961416 133.8425379867554 L 289.82128989961416 133.8425379867554 L 289.82128989961416 133.8425379867554 L 281.929042784373 133.8425379867554 Z"
                                                            cy="69.15146129315696" cx="334.886754322052" j="5"
                                                            val="58" barHeight="64.69007669359843"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1783"
                                                            d="M 335.886754322052 133.8425379867554 L 335.886754322052 63.57573054370881 L 343.7790014372932 63.57573054370881 L 343.7790014372932 133.8425379867554 Z"
                                                            fill="rgba(13,110,253,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="0" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 335.886754322052 133.8425379867554 L 335.886754322052 63.57573054370881 L 343.7790014372932 63.57573054370881 L 343.7790014372932 133.8425379867554 Z"
                                                            pathFrom="M 335.886754322052 133.8425379867554 L 335.886754322052 133.8425379867554 L 343.7790014372932 133.8425379867554 L 343.7790014372932 133.8425379867554 L 343.7790014372932 133.8425379867554 L 343.7790014372932 133.8425379867554 L 343.7790014372932 133.8425379867554 L 335.886754322052 133.8425379867554 Z"
                                                            cy="63.57473054370881" cx="388.84446585973103" j="6"
                                                            val="63" barHeight="70.26680744304657"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1785"
                                                            d="M 389.84446585973103 133.8425379867554 L 389.84446585973103 66.9217689933777 L 397.7367129749722 66.9217689933777 L 397.7367129749722 133.8425379867554 Z"
                                                            fill="rgba(13,110,253,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="0" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 389.84446585973103 133.8425379867554 L 389.84446585973103 66.9217689933777 L 397.7367129749722 66.9217689933777 L 397.7367129749722 133.8425379867554 Z"
                                                            pathFrom="M 389.84446585973103 133.8425379867554 L 389.84446585973103 133.8425379867554 L 397.7367129749722 133.8425379867554 L 397.7367129749722 133.8425379867554 L 397.7367129749722 133.8425379867554 L 397.7367129749722 133.8425379867554 L 397.7367129749722 133.8425379867554 L 389.84446585973103 133.8425379867554 Z"
                                                            cy="66.92076899337769" cx="442.80217739741005" j="7"
                                                            val="60" barHeight="66.92076899337769"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1787"
                                                            d="M 443.80217739741005 133.8425379867554 L 443.80217739741005 60.229692094039926 L 451.6944245126512 60.229692094039926 L 451.6944245126512 133.8425379867554 Z"
                                                            fill="rgba(13,110,253,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="0" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 443.80217739741005 133.8425379867554 L 443.80217739741005 60.229692094039926 L 451.6944245126512 60.229692094039926 L 451.6944245126512 133.8425379867554 Z"
                                                            pathFrom="M 443.80217739741005 133.8425379867554 L 443.80217739741005 133.8425379867554 L 451.6944245126512 133.8425379867554 L 451.6944245126512 133.8425379867554 L 451.6944245126512 133.8425379867554 L 451.6944245126512 133.8425379867554 L 451.6944245126512 133.8425379867554 L 443.80217739741005 133.8425379867554 Z"
                                                            cy="60.22869209403993" cx="496.75988893508907" j="8"
                                                            val="66" barHeight="73.61284589271546"
                                                            barWidth="9.892247115241156"></path>
                                                        <g id="SvgjsG1769" class="apexcharts-bar-goals-markers"
                                                            style="pointer-events: none">
                                                            <g id="SvgjsG1770"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1772"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1774"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1776"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1778"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1780"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1782"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1784"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1786"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                        </g>
                                                    </g>
                                                    <g id="SvgjsG1788" class="apexcharts-series" rel="2"
                                                        seriesName="Revenue" data:realIndex="1">
                                                        <path id="SvgjsPath1792"
                                                            d="M 22.032732211218942 133.8425379867554 L 22.032732211218942 49.076230595143635 L 29.924979326460097 49.076230595143635 L 29.924979326460097 133.8425379867554 Z"
                                                            fill="rgba(32,201,151,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="1" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 22.032732211218942 133.8425379867554 L 22.032732211218942 49.076230595143635 L 29.924979326460097 49.076230595143635 L 29.924979326460097 133.8425379867554 Z"
                                                            pathFrom="M 22.032732211218942 133.8425379867554 L 22.032732211218942 133.8425379867554 L 29.924979326460097 133.8425379867554 L 29.924979326460097 133.8425379867554 L 29.924979326460097 133.8425379867554 L 29.924979326460097 133.8425379867554 L 29.924979326460097 133.8425379867554 L 22.032732211218942 133.8425379867554 Z"
                                                            cy="49.07523059514364" cx="74.99044374889799" j="0"
                                                            val="76" barHeight="84.76630739161175"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1794"
                                                            d="M 75.99044374889799 133.8425379867554 L 75.99044374889799 39.03811524613699 L 83.88269086413915 39.03811524613699 L 83.88269086413915 133.8425379867554 Z"
                                                            fill="rgba(32,201,151,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="1" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 75.99044374889799 133.8425379867554 L 75.99044374889799 39.03811524613699 L 83.88269086413915 39.03811524613699 L 83.88269086413915 133.8425379867554 Z"
                                                            pathFrom="M 75.99044374889799 133.8425379867554 L 75.99044374889799 133.8425379867554 L 83.88269086413915 133.8425379867554 L 83.88269086413915 133.8425379867554 L 83.88269086413915 133.8425379867554 L 83.88269086413915 133.8425379867554 L 83.88269086413915 133.8425379867554 L 75.99044374889799 133.8425379867554 Z"
                                                            cy="39.03711524613699" cx="128.94815528657702" j="1"
                                                            val="85" barHeight="94.80442274061839"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1796"
                                                            d="M 129.94815528657702 133.8425379867554 L 129.94815528657702 21.192576847902938 L 137.84040240181818 21.192576847902938 L 137.84040240181818 133.8425379867554 Z"
                                                            fill="rgba(32,201,151,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="1" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 129.94815528657702 133.8425379867554 L 129.94815528657702 21.192576847902938 L 137.84040240181818 21.192576847902938 L 137.84040240181818 133.8425379867554 Z"
                                                            pathFrom="M 129.94815528657702 133.8425379867554 L 129.94815528657702 133.8425379867554 L 137.84040240181818 133.8425379867554 L 137.84040240181818 133.8425379867554 L 137.84040240181818 133.8425379867554 L 137.84040240181818 133.8425379867554 L 137.84040240181818 133.8425379867554 L 129.94815528657702 133.8425379867554 Z"
                                                            cy="21.191576847902937" cx="182.90586682425607" j="2"
                                                            val="101" barHeight="112.64996113885245"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1798"
                                                            d="M 183.90586682425607 133.8425379867554 L 183.90586682425607 24.53861529757182 L 191.79811393949723 24.53861529757182 L 191.79811393949723 133.8425379867554 Z"
                                                            fill="rgba(32,201,151,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="1" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 183.90586682425607 133.8425379867554 L 183.90586682425607 24.53861529757182 L 191.79811393949723 24.53861529757182 L 191.79811393949723 133.8425379867554 Z"
                                                            pathFrom="M 183.90586682425607 133.8425379867554 L 183.90586682425607 133.8425379867554 L 191.79811393949723 133.8425379867554 L 191.79811393949723 133.8425379867554 L 191.79811393949723 133.8425379867554 L 191.79811393949723 133.8425379867554 L 191.79811393949723 133.8425379867554 L 183.90586682425607 133.8425379867554 Z"
                                                            cy="24.53761529757182" cx="236.8635783619351" j="3"
                                                            val="98" barHeight="109.30392268918357"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1800"
                                                            d="M 237.8635783619351 133.8425379867554 L 237.8635783619351 36.807422946357725 L 245.75582547717627 36.807422946357725 L 245.75582547717627 133.8425379867554 Z"
                                                            fill="rgba(32,201,151,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="1" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 237.8635783619351 133.8425379867554 L 237.8635783619351 36.807422946357725 L 245.75582547717627 36.807422946357725 L 245.75582547717627 133.8425379867554 Z"
                                                            pathFrom="M 237.8635783619351 133.8425379867554 L 237.8635783619351 133.8425379867554 L 245.75582547717627 133.8425379867554 L 245.75582547717627 133.8425379867554 L 245.75582547717627 133.8425379867554 L 245.75582547717627 133.8425379867554 L 245.75582547717627 133.8425379867554 L 237.8635783619351 133.8425379867554 Z"
                                                            cy="36.80642294635773" cx="290.82128989961416" j="4"
                                                            val="87" barHeight="97.03511504039766"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1802"
                                                            d="M 291.82128989961416 133.8425379867554 L 291.82128989961416 16.731192248344424 L 299.7135370148553 16.731192248344424 L 299.7135370148553 133.8425379867554 Z"
                                                            fill="rgba(32,201,151,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="1" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 291.82128989961416 133.8425379867554 L 291.82128989961416 16.731192248344424 L 299.7135370148553 16.731192248344424 L 299.7135370148553 133.8425379867554 Z"
                                                            pathFrom="M 291.82128989961416 133.8425379867554 L 291.82128989961416 133.8425379867554 L 299.7135370148553 133.8425379867554 L 299.7135370148553 133.8425379867554 L 299.7135370148553 133.8425379867554 L 299.7135370148553 133.8425379867554 L 299.7135370148553 133.8425379867554 L 291.82128989961416 133.8425379867554 Z"
                                                            cy="16.730192248344423" cx="344.7790014372932" j="5"
                                                            val="105" barHeight="117.11134573841096"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1804"
                                                            d="M 345.7790014372932 133.8425379867554 L 345.7790014372932 32.34603834679921 L 353.67124855253434 32.34603834679921 L 353.67124855253434 133.8425379867554 Z"
                                                            fill="rgba(32,201,151,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="1" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 345.7790014372932 133.8425379867554 L 345.7790014372932 32.34603834679921 L 353.67124855253434 32.34603834679921 L 353.67124855253434 133.8425379867554 Z"
                                                            pathFrom="M 345.7790014372932 133.8425379867554 L 345.7790014372932 133.8425379867554 L 353.67124855253434 133.8425379867554 L 353.67124855253434 133.8425379867554 L 353.67124855253434 133.8425379867554 L 353.67124855253434 133.8425379867554 L 353.67124855253434 133.8425379867554 L 345.7790014372932 133.8425379867554 Z"
                                                            cy="32.345038346799214" cx="398.7367129749722" j="6"
                                                            val="91" barHeight="101.49649963995617"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1806"
                                                            d="M 399.7367129749722 133.8425379867554 L 399.7367129749722 6.693076899337764 L 407.62896009021335 6.693076899337764 L 407.62896009021335 133.8425379867554 Z"
                                                            fill="rgba(32,201,151,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="1" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 399.7367129749722 133.8425379867554 L 399.7367129749722 6.693076899337764 L 407.62896009021335 6.693076899337764 L 407.62896009021335 133.8425379867554 Z"
                                                            pathFrom="M 399.7367129749722 133.8425379867554 L 399.7367129749722 133.8425379867554 L 407.62896009021335 133.8425379867554 L 407.62896009021335 133.8425379867554 L 407.62896009021335 133.8425379867554 L 407.62896009021335 133.8425379867554 L 407.62896009021335 133.8425379867554 L 399.7367129749722 133.8425379867554 Z"
                                                            cy="6.6920768993377635" cx="452.6944245126512" j="7"
                                                            val="114" barHeight="127.14946108741762"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1808"
                                                            d="M 453.6944245126512 133.8425379867554 L 453.6944245126512 28.999999897130333 L 461.5866716278924 28.999999897130333 L 461.5866716278924 133.8425379867554 Z"
                                                            fill="rgba(32,201,151,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="1" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 453.6944245126512 133.8425379867554 L 453.6944245126512 28.999999897130333 L 461.5866716278924 28.999999897130333 L 461.5866716278924 133.8425379867554 Z"
                                                            pathFrom="M 453.6944245126512 133.8425379867554 L 453.6944245126512 133.8425379867554 L 461.5866716278924 133.8425379867554 L 461.5866716278924 133.8425379867554 L 461.5866716278924 133.8425379867554 L 461.5866716278924 133.8425379867554 L 461.5866716278924 133.8425379867554 L 453.6944245126512 133.8425379867554 Z"
                                                            cy="28.998999897130332" cx="506.6521360503302" j="8"
                                                            val="94" barHeight="104.84253808962505"
                                                            barWidth="9.892247115241156"></path>
                                                        <g id="SvgjsG1790" class="apexcharts-bar-goals-markers"
                                                            style="pointer-events: none">
                                                            <g id="SvgjsG1791"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1793"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1795"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1797"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1799"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1801"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1803"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1805"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1807"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                        </g>
                                                    </g>
                                                    <g id="SvgjsG1809" class="apexcharts-series" rel="3"
                                                        seriesName="FreexCashxFlow" data:realIndex="2">
                                                        <path id="SvgjsPath1813"
                                                            d="M 31.924979326460097 133.8425379867554 L 31.924979326460097 94.80542274061841 L 39.81722644170125 94.80542274061841 L 39.81722644170125 133.8425379867554 Z"
                                                            fill="rgba(255,193,7,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="2" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 31.924979326460097 133.8425379867554 L 31.924979326460097 94.80542274061841 L 39.81722644170125 94.80542274061841 L 39.81722644170125 133.8425379867554 Z"
                                                            pathFrom="M 31.924979326460097 133.8425379867554 L 31.924979326460097 133.8425379867554 L 39.81722644170125 133.8425379867554 L 39.81722644170125 133.8425379867554 L 39.81722644170125 133.8425379867554 L 39.81722644170125 133.8425379867554 L 39.81722644170125 133.8425379867554 L 31.924979326460097 133.8425379867554 Z"
                                                            cy="94.8044227406184" cx="84.88269086413914" j="0"
                                                            val="35" barHeight="39.037115246136985"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1815"
                                                            d="M 85.88269086413914 133.8425379867554 L 85.88269086413914 88.11334584128063 L 93.7749379793803 88.11334584128063 L 93.7749379793803 133.8425379867554 Z"
                                                            fill="rgba(255,193,7,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="2" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 85.88269086413914 133.8425379867554 L 85.88269086413914 88.11334584128063 L 93.7749379793803 88.11334584128063 L 93.7749379793803 133.8425379867554 Z"
                                                            pathFrom="M 85.88269086413914 133.8425379867554 L 85.88269086413914 133.8425379867554 L 93.7749379793803 133.8425379867554 L 93.7749379793803 133.8425379867554 L 93.7749379793803 133.8425379867554 L 93.7749379793803 133.8425379867554 L 93.7749379793803 133.8425379867554 L 85.88269086413914 133.8425379867554 Z"
                                                            cy="88.11234584128063" cx="138.84040240181818" j="1"
                                                            val="41" barHeight="45.729192145474755"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1817"
                                                            d="M 139.84040240181818 133.8425379867554 L 139.84040240181818 93.69007659072878 L 147.73264951705934 93.69007659072878 L 147.73264951705934 133.8425379867554 Z"
                                                            fill="rgba(255,193,7,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="2" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 139.84040240181818 133.8425379867554 L 139.84040240181818 93.69007659072878 L 147.73264951705934 93.69007659072878 L 147.73264951705934 133.8425379867554 Z"
                                                            pathFrom="M 139.84040240181818 133.8425379867554 L 139.84040240181818 133.8425379867554 L 147.73264951705934 133.8425379867554 L 147.73264951705934 133.8425379867554 L 147.73264951705934 133.8425379867554 L 147.73264951705934 133.8425379867554 L 147.73264951705934 133.8425379867554 L 139.84040240181818 133.8425379867554 Z"
                                                            cy="93.68907659072877" cx="192.79811393949723" j="2"
                                                            val="36" barHeight="40.15246139602662"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1819"
                                                            d="M 193.79811393949723 133.8425379867554 L 193.79811393949723 104.84353808962506 L 201.6903610547384 104.84353808962506 L 201.6903610547384 133.8425379867554 Z"
                                                            fill="rgba(255,193,7,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="2" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 193.79811393949723 133.8425379867554 L 193.79811393949723 104.84353808962506 L 201.6903610547384 104.84353808962506 L 201.6903610547384 133.8425379867554 Z"
                                                            pathFrom="M 193.79811393949723 133.8425379867554 L 193.79811393949723 133.8425379867554 L 201.6903610547384 133.8425379867554 L 201.6903610547384 133.8425379867554 L 201.6903610547384 133.8425379867554 L 201.6903610547384 133.8425379867554 L 201.6903610547384 133.8425379867554 L 193.79811393949723 133.8425379867554 Z"
                                                            cy="104.84253808962505" cx="246.75582547717627" j="3"
                                                            val="26" barHeight="28.998999897130332"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1821"
                                                            d="M 247.75582547717627 133.8425379867554 L 247.75582547717627 83.65196124172212 L 255.6480725924174 83.65196124172212 L 255.6480725924174 133.8425379867554 Z"
                                                            fill="rgba(255,193,7,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="2" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 247.75582547717627 133.8425379867554 L 247.75582547717627 83.65196124172212 L 255.6480725924174 83.65196124172212 L 255.6480725924174 133.8425379867554 Z"
                                                            pathFrom="M 247.75582547717627 133.8425379867554 L 247.75582547717627 133.8425379867554 L 255.6480725924174 133.8425379867554 L 255.6480725924174 133.8425379867554 L 255.6480725924174 133.8425379867554 L 255.6480725924174 133.8425379867554 L 255.6480725924174 133.8425379867554 L 247.75582547717627 133.8425379867554 Z"
                                                            cy="83.65096124172211" cx="300.7135370148553" j="4"
                                                            val="45" barHeight="50.19057674503327"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1823"
                                                            d="M 301.7135370148553 133.8425379867554 L 301.7135370148553 80.30592279205324 L 309.6057841300965 80.30592279205324 L 309.6057841300965 133.8425379867554 Z"
                                                            fill="rgba(255,193,7,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="2" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 301.7135370148553 133.8425379867554 L 301.7135370148553 80.30592279205324 L 309.6057841300965 80.30592279205324 L 309.6057841300965 133.8425379867554 Z"
                                                            pathFrom="M 301.7135370148553 133.8425379867554 L 301.7135370148553 133.8425379867554 L 309.6057841300965 133.8425379867554 L 309.6057841300965 133.8425379867554 L 309.6057841300965 133.8425379867554 L 309.6057841300965 133.8425379867554 L 309.6057841300965 133.8425379867554 L 301.7135370148553 133.8425379867554 Z"
                                                            cy="80.30492279205323" cx="354.67124855253434" j="5"
                                                            val="48" barHeight="53.53661519470215"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1825"
                                                            d="M 355.67124855253434 133.8425379867554 L 355.67124855253434 75.84453819249472 L 363.5634956677755 75.84453819249472 L 363.5634956677755 133.8425379867554 Z"
                                                            fill="rgba(255,193,7,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="2" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 355.67124855253434 133.8425379867554 L 355.67124855253434 75.84453819249472 L 363.5634956677755 75.84453819249472 L 363.5634956677755 133.8425379867554 Z"
                                                            pathFrom="M 355.67124855253434 133.8425379867554 L 355.67124855253434 133.8425379867554 L 363.5634956677755 133.8425379867554 L 363.5634956677755 133.8425379867554 L 363.5634956677755 133.8425379867554 L 363.5634956677755 133.8425379867554 L 363.5634956677755 133.8425379867554 L 355.67124855253434 133.8425379867554 Z"
                                                            cy="75.84353819249472" cx="408.62896009021335" j="6"
                                                            val="52" barHeight="57.997999794260664"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1827"
                                                            d="M 409.62896009021335 133.8425379867554 L 409.62896009021335 74.72919204260509 L 417.5212072054545 74.72919204260509 L 417.5212072054545 133.8425379867554 Z"
                                                            fill="rgba(255,193,7,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="2" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 409.62896009021335 133.8425379867554 L 409.62896009021335 74.72919204260509 L 417.5212072054545 74.72919204260509 L 417.5212072054545 133.8425379867554 Z"
                                                            pathFrom="M 409.62896009021335 133.8425379867554 L 409.62896009021335 133.8425379867554 L 417.5212072054545 133.8425379867554 L 417.5212072054545 133.8425379867554 L 417.5212072054545 133.8425379867554 L 417.5212072054545 133.8425379867554 L 417.5212072054545 133.8425379867554 L 409.62896009021335 133.8425379867554 Z"
                                                            cy="74.72819204260509" cx="462.5866716278924" j="7"
                                                            val="53" barHeight="59.113345944150296"
                                                            barWidth="9.892247115241156"></path>
                                                        <path id="SvgjsPath1829"
                                                            d="M 463.5866716278924 133.8425379867554 L 463.5866716278924 88.11334584128063 L 471.47891874313353 88.11334584128063 L 471.47891874313353 133.8425379867554 Z"
                                                            fill="rgba(255,193,7,1)" fill-opacity="1"
                                                            stroke="transparent" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-bar-area"
                                                            index="2" clip-path="url(#gridRectMaskb6jh40fp)"
                                                            pathTo="M 463.5866716278924 133.8425379867554 L 463.5866716278924 88.11334584128063 L 471.47891874313353 88.11334584128063 L 471.47891874313353 133.8425379867554 Z"
                                                            pathFrom="M 463.5866716278924 133.8425379867554 L 463.5866716278924 133.8425379867554 L 471.47891874313353 133.8425379867554 L 471.47891874313353 133.8425379867554 L 471.47891874313353 133.8425379867554 L 471.47891874313353 133.8425379867554 L 471.47891874313353 133.8425379867554 L 463.5866716278924 133.8425379867554 Z"
                                                            cy="88.11234584128063" cx="516.5443831655714" j="8"
                                                            val="41" barHeight="45.729192145474755"
                                                            barWidth="9.892247115241156"></path>
                                                        <g id="SvgjsG1811" class="apexcharts-bar-goals-markers"
                                                            style="pointer-events: none">
                                                            <g id="SvgjsG1812"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1814"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1816"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1818"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1820"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1822"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1824"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1826"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                            <g id="SvgjsG1828"
                                                                className="apexcharts-bar-goals-groups"></g>
                                                        </g>
                                                    </g>
                                                    <g id="SvgjsG1768" class="apexcharts-datalabels"
                                                        data:realIndex="0"></g>
                                                    <g id="SvgjsG1789" class="apexcharts-datalabels"
                                                        data:realIndex="1"></g>
                                                    <g id="SvgjsG1810" class="apexcharts-datalabels"
                                                        data:realIndex="2"></g>
                                                </g>
                                                <line id="SvgjsLine1851" x1="0" y1="0"
                                                    x2="485.6194038391113" y2="0" stroke="#b6b6b6"
                                                    stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine1852" x1="0" y1="0"
                                                    x2="485.6194038391113" y2="0" stroke-dasharray="0"
                                                    stroke-width="0" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                                <g id="SvgjsG1853" class="apexcharts-xaxis"
                                                    transform="translate(0, 0)">
                                                    <g id="SvgjsG1854" class="apexcharts-xaxis-texts-g"
                                                        transform="translate(0, -4)"><text id="SvgjsText1856"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="26.97885576883952" y="162.84153798675538"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#f6f7f8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1857">Feb</tspan>
                                                            <title>Feb</title>
                                                        </text><text id="SvgjsText1859"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="80.93656730651855" y="162.84153798675538"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#f6f7f8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1860">Mar</tspan>
                                                            <title>Mar</title>
                                                        </text><text id="SvgjsText1862"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="134.8942788441976" y="162.84153798675538"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#f6f7f8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1863">Apr</tspan>
                                                            <title>Apr</title>
                                                        </text><text id="SvgjsText1865"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="188.85199038187665" y="162.84153798675538"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#f6f7f8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1866">May</tspan>
                                                            <title>May</title>
                                                        </text><text id="SvgjsText1868"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="242.8097019195557" y="162.84153798675538"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#f6f7f8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1869">Jun</tspan>
                                                            <title>Jun</title>
                                                        </text><text id="SvgjsText1871"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="296.7674134572347" y="162.84153798675538"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#f6f7f8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1872">Jul</tspan>
                                                            <title>Jul</title>
                                                        </text><text id="SvgjsText1874"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="350.7251249949137" y="162.84153798675538"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#f6f7f8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1875">Aug</tspan>
                                                            <title>Aug</title>
                                                        </text><text id="SvgjsText1877"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="404.6828365325927" y="162.84153798675538"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#f6f7f8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1878">Sep</tspan>
                                                            <title>Sep</title>
                                                        </text><text id="SvgjsText1880"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="458.64054807027173" y="162.84153798675538"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#f6f7f8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1881">Oct</tspan>
                                                            <title>Oct</title>
                                                        </text></g>
                                                </g>
                                                <g id="SvgjsG1900" class="apexcharts-yaxis-annotations"></g>
                                                <g id="SvgjsG1901" class="apexcharts-xaxis-annotations"></g>
                                                <g id="SvgjsG1902" class="apexcharts-point-annotations"></g>
                                            </g>
                                            <g id="SvgjsG1756" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend" style="max-height: 100px;"></div>
                                        <div class="apexcharts-tooltip apexcharts-theme-dark">
                                            <div class="apexcharts-tooltip-title"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            </div>
                                            <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(13, 110, 253);"></span>
                                                <div class="apexcharts-tooltip-text"
                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-y-label"></span><span
                                                            class="apexcharts-tooltip-text-y-value"></span></div>
                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                            class="apexcharts-tooltip-text-goals-value"></span></div>
                                                    <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                                </div>
                                            </div>
                                            <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(32, 201, 151);"></span>
                                                <div class="apexcharts-tooltip-text"
                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-y-label"></span><span
                                                            class="apexcharts-tooltip-text-y-value"></span></div>
                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                            class="apexcharts-tooltip-text-goals-value"></span></div>
                                                    <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                                </div>
                                            </div>
                                            <div class="apexcharts-tooltip-series-group" style="order: 3;"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(255, 193, 7);"></span>
                                                <div class="apexcharts-tooltip-text"
                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-y-label"></span><span
                                                            class="apexcharts-tooltip-text-y-value"></span></div>
                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                            class="apexcharts-tooltip-text-goals-value"></span></div>
                                                    <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-dark">
                                            <div class="apexcharts-yaxistooltip-text"></div>
                                        </div>
                                        <div class="apexcharts-toolbar" style="top: 0px; right: 3px;">
                                            <div class="apexcharts-menu-icon" title="Menu"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24">
                                                    <path fill="none" d="M0 0h24v24H0V0z"></path>
                                                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
                                                </svg></div>
                                            <div class="apexcharts-menu">
                                                <div class="apexcharts-menu-item exportSVG" title="Download SVG">
                                                    Download SVG</div>
                                                <div class="apexcharts-menu-item exportPNG" title="Download PNG">
                                                    Download PNG</div>
                                                <div class="apexcharts-menu-item exportCSV" title="Download CSV">
                                                    Download CSV</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                                <span class="me-2">
                                    <i class="bi bi-square-fill text-primary"></i> This year
                                </span>

                                <span> <i class="bi bi-square-fill text-secondary"></i> Last year </span>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Online Store Overview</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-sm btn-tool" aria-label="Download">
                                    <i class="bi bi-download"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-tool" aria-label="More options">
                                    <i class="bi bi-list"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-success fs-2">
                                    <svg height="32" fill="none" stroke="currentColor" stroke-width="1.5"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3">
                                        </path>
                                    </svg>
                                </p>
                                <p class="d-flex flex-column text-end">
                                    <span class="fw-bold">
                                        <i class="bi bi-graph-up-arrow text-success"></i> 12%
                                    </span>
                                    <span class="text-secondary">CONVERSION RATE</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-info fs-2">
                                    <svg height="32" fill="none" stroke="currentColor" stroke-width="1.5"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z">
                                        </path>
                                    </svg>
                                </p>
                                <p class="d-flex flex-column text-end">
                                    <span class="fw-bold">
                                        <i class="bi bi-graph-up-arrow text-info"></i> 0.8%
                                    </span>
                                    <span class="text-secondary">SALES RATE</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center mb-0">
                                <p class="text-danger fs-2">
                                    <svg height="32" fill="none" stroke="currentColor" stroke-width="1.5"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z">
                                        </path>
                                    </svg>
                                </p>
                                <p class="d-flex flex-column text-end">
                                    <span class="fw-bold">
                                        <i class="bi bi-graph-down-arrow text-danger"></i>
                                        1%
                                    </span>
                                    <span class="text-secondary">REGISTRATION RATE</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
@endsection