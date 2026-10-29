@extends('layouts.app')

@section('title', 'Misi Harian')

@section('content')
<div class="max-w-3xl mx-auto py-8 px-4">
    <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-2">🎯 Misi Harian</h1>
        <p class="text-gray-500 mb-6">Selesaikan misi di bawah ini untuk mendapatkan poin bonus!</p>

        <div class="space-y-4">
            <!-- Misi 1 -->
            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl border border-gray-200">
                <input type="checkbox" checked disabled class="w-5 h-5 text-emerald-500 rounded">
                <div class="flex-1">
                    <p class="font-bold text-gray-400 line-through">Selesaikan 1 Kuis</p>
                    <p class="text-xs text-gray-400">Progress: 1/1</p>
                </div>
                <span class="text-sm font-bold text-emerald-600">+50 Poin</span>
            </div>

            <!-- Misi 2 -->
            <div class="flex items-center gap-4 p-4 bg-white rounded-xl border border-gray-200">
                <input type="checkbox" disabled class="w-5 h-5 text-emerald-500 rounded">
                <div class="flex-1">
                    <p class="font-bold text-gray-700">Jelajahi 3 Provinsi</p>
                    <p class="text-xs text-gray-500">Progress: 1/3</p>
                </div>
                <span class="text-sm font-bold text-gray-400">+30 Poin</span>
            </div>

            <!-- Misi 3 -->
            <div class="flex items-center gap-4 p-4 bg-white rounded-xl border border-gray-200">
                <input type="checkbox" disabled class="w-5 h-5 text-emerald-500 rounded">
                <div class="flex-1">
                    <p class="font-bold text-gray-700">Dapatkan 1 Lencana Baru</p>
                    <p class="text-xs text-gray-500">Progress: 0/1</p>
                </div>
                <span class="text-sm font-bold text-gray-400">+100 Poin</span>
            </div>
        </div>
    </div>
</div>
@endsection