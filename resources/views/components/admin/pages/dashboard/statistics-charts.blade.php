@assets
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

<div class="sheet_dashboard flex flex-col gap-4">

    {{-- GRAPHIQUE DONUTS --}}
    <x-admin.pages.dashboard.charts.doughnut-chart/>

    {{-- GRAPHIQUE BATONETS --}}
    <x-admin.pages.dashboard.charts.bar-chart/>

    {{-- GRAPHIQUE LIGNE --}}
    <x-admin.pages.dashboard.charts.line-chart/>


</div>
