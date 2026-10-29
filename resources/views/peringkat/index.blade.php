@extends('layouts.app')

@section('title', 'Papan Peringkat')

@section('content')
<div class="max-w-3xl mx-auto py-8 px-4">
    <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-2">🏆 Papan Peringkat</h1>
        <p class="text-gray-500 mb-6">Pemain dengan poin tertinggi di Nusantara Land.</p>

        <div class="space-y-3">
            <!-- Peringkat 1 -->
            <div class="flex items-center gap-4 p-3 rounded-xl bg-yellow-50 border border-yellow-200">
                <span class="text-lg font-bold text-yellow-600 w-8 text-center">🥇</span>
                <div class="w-10 h-10 rounded-full bg-yellow-200 flex items-center justify-center font-bold text-yellow-700">S</div>
                <span class="font-bold text-gray-800">Sari Wulandari</span>
                <span class="ml-auto font-bold text-gray-600">1240 Poin</span>
            </div>
            <!-- Peringkat 2 -->
            <div class="flex items-center gap-4 p-3 rounded-xl bg-gray-50 border border-gray-200">
                <span class="text-lg font-bold text-gray-500 w-8 text-center">🥈</span>
                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center font-bold text-gray-600">B</div>
                <span class="font-bold text-gray-800">Budi Santoso</span>
                <span class="ml-auto font-bold text-gray-600">980 Poin</span>
            </div>
            <!-- Peringkat 3 -->
            <div class="flex items-center gap-4 p-3 rounded-xl bg-orange-50 border border-orange-200">
                <span class="text-lg font-bold text-orange-500 w-8 text-center">🥉</span>
                <div class="w-10 h-10 rounded-full bg-orange-200 flex items-center justify-center font-bold text-orange-700">A</div>
                <span class="font-bold text-gray-800">Ayu Lestari</span>
                <span class="ml-auto font-bold text-gray-600">865 Poin</span>
            </div>
            <!-- Peringkat Kamu -->
            <div class="flex items-center gap-4 p-3 rounded-xl bg-emerald-50 border-2 border-emerald-300 mt-4">
                <span class="text-lg font-bold text-emerald-600 w-8 text-center">#</span>
                <div class="w-10 h-10 rounded-full bg-emerald-200 flex items-center justify-center font-bold text-emerald-700">K</div>
                <span class="font-bold text-emerald-800">Kamu</span>
                <span class="ml-auto font-bold text-emerald-700">{{ Auth::user()->points ?? 0 }} Poin</span>
            </div>
        </div>
    </div>
</div>
@endsection