/**
 * Chart helpers – wrap ApexCharts with the Sneat colour palette.
 * Pages pass their data in via window.MV (see each page's inline script).
 */
'use strict';
(function () {
  const c = (window.config && window.config.colors) || { primary: '#696cff', success: '#71dd37', info: '#03c3ec', warning: '#ffab00', danger: '#ff3e1d', secondary: '#8592a3', headingColor: '#566a7f', axisColor: '#a1acb8', borderColor: '#eceef1' };
  const palette = [c.primary, c.success, c.info, c.warning, c.danger, c.secondary, '#9055fd', '#ff6bd6', '#2dd4bf', '#f97316'];
  const taka = v => '$' + Number(v).toLocaleString();

  window.mvChart = {
    palette, taka,
    donut(el, labels, series, colors) {
      new ApexCharts(document.querySelector(el), {
        chart: { type: 'donut', height: 280, fontFamily: 'Public Sans' },
        labels, series, colors: colors || palette,
        legend: { position: 'bottom', fontSize: '13px', labels: { colors: c.headingColor } },
        dataLabels: { enabled: false },
        stroke: { width: 3, colors: ['#fff'] },
        plotOptions: { pie: { donut: { size: '68%', labels: { show: true, total: { show: true, label: 'Total', color: c.headingColor, fontSize: '14px' } } } } }
      }).render();
    },
    bar(el, categories, series, opts = {}) {
      new ApexCharts(document.querySelector(el), {
        chart: { type: 'bar', height: opts.height || 300, toolbar: { show: false }, fontFamily: 'Public Sans' },
        series, colors: opts.colors || palette,
        plotOptions: { bar: { horizontal: !!opts.horizontal, borderRadius: 6, columnWidth: '45%', barHeight: '55%', distributed: !!opts.distributed } },
        dataLabels: { enabled: false },
        legend: { show: !opts.distributed && series.length > 1, position: 'top' },
        xaxis: { categories, labels: { style: { colors: c.axisColor, fontSize: '12px' } }, axisBorder: { show: false }, axisTicks: { show: false } },
        yaxis: { labels: { style: { colors: c.axisColor }, formatter: opts.money ? v => taka(v) : v => v } },
        grid: { borderColor: c.borderColor, strokeDashArray: 6 },
        tooltip: { y: { formatter: opts.money ? v => taka(v) : v => v } }
      }).render();
    },
    area(el, categories, series, opts = {}) {
      new ApexCharts(document.querySelector(el), {
        chart: { type: 'area', height: opts.height || 300, toolbar: { show: false }, fontFamily: 'Public Sans' },
        series, colors: opts.colors || [c.primary, c.success],
        stroke: { curve: 'straight', width: 3 },
        fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.35, opacityTo: 0.02 } },
        dataLabels: { enabled: false },
        legend: { position: 'top' },
        xaxis: { categories, labels: { style: { colors: c.axisColor } }, axisBorder: { show: false }, axisTicks: { show: false } },
        yaxis: { labels: { style: { colors: c.axisColor }, formatter: opts.money ? v => taka(v) : v => Math.round(v) } },
        grid: { borderColor: c.borderColor, strokeDashArray: 6 },
        tooltip: { y: { formatter: opts.money ? v => taka(v) : v => v } }
      }).render();
    }
  };
})();
