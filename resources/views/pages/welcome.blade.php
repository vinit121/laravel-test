@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-8 h-8"s>
    <a href="#" class="text-gray-300">Revenue</a>
    <div class="flex items-center h-21">
        <button class="bg-blue-700 text-white px-4 rounded-l-sm">MRR</button>
        <button class="bg-gray-800 text-white px-4 rounded-r-sm">ARPU</button>
    </div>
    <div class="flex items-center space-x-4">
        <div class="flex items-center">
            <span class="text-gray-300 mr-2">📅</span> <!-- Date symbol -->
            <input type="text" id="datepicker" class="bg-gray-800 text-white rounded">
        </div>
        <select id="daysSelect" class="bg-dark text-white rounded px-4">
            <option value="10">Last 10 Days</option>
            <option value="20">Last 20 Days</option>
        </select>
    </div>
</div>

<div class="grid grid-cols-4 gap-4">
    <div class="bg-gray-800 text-white rounded p-4">
        <p>Total MRR</p>
        <p class="text-2xl font-bold">$14,775</p>
    </div>
    <div class="bg-gray-800 text-white rounded p-4">
        <p>New MRR</p>
        <p class="text-2xl font-bold">$14,775</p>
    </div>
    <div class="bg-gray-800 text-white rounded p-4">
        <p>Upgrades</p>
        <p class="text-2xl font-bold">$13,000</p>
    </div>
    <div class="bg-gray-800 text-white rounded p-4">
        <p>Downgrades</p>
        <p class="text-2xl font-bold">$755</p>
    </div>
    <div class="bg-gray-800 text-white rounded p-4">
        <p>ARPU</p>
        <p class="text-2xl font-bold">$10,000</p>
    </div>
    <div class="bg-gray-800 text-white rounded p-4">
        <p>Reactivations</p>
        <p class="text-2xl font-bold">$10,000</p>
    </div>
    <div class="bg-gray-800 text-white rounded p-4">
        <p>Existing</p>
        <p class="text-2xl font-bold">$10,000</p>
    </div>
    <div class="bg-gray-800 text-white rounded p-4">
        <p>Churn</p>
        <p class="text-2xl font-bold">$100</p>
    </div>
</div>

<div class="mt-8">
    <canvas id="mrrChart" style="width: 100%; height: 500px;"></canvas>
</div>

<!-- Custom tooltip -->
<div id="customTooltip" class="absolute bg-gray-800 text-white p-2 rounded hidden">
    <div id="tooltipContent"></div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> 
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
