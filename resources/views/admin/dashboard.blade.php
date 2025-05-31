@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <!-- Top Buttons -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
        <div style="display: flex; gap: 0.5rem;">
            <button
                style="padding: 0.5rem 1rem; font-size: 0.875rem; background-color: #fff; border: 1px solid #d1d5db; border-radius: 0.375rem; cursor: pointer;"
                onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='#fff'">
                Tambah
            </button>
            <button
                style="padding: 0.5rem 1rem; font-size: 0.875rem; background-color: #fff; border: 1px solid #d1d5db; border-radius: 0.375rem; cursor: pointer;"
                onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='#fff'">
                Filter
            </button>
            <button
                style="padding: 0.5rem 1rem; font-size: 0.875rem; background-color: #fff; border: 1px solid #d1d5db; border-radius: 0.375rem; cursor: pointer;"
                onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='#fff'">
                Ekspor
            </button>
        </div>
        <div style="width: 12rem; height: 1.5rem; background-color: #d1d5db; border-radius: 0.375rem;"></div>
    </div>

    <!-- Bottom Save Button -->
    <div style="margin-top: 2rem; display: flex; justify-content: center;">
        <button
            style="padding: 0.5rem 1.5rem; background-color: #dc2626; color: white; border-radius: 0.375rem; border: none; cursor: pointer;"
            onmouseover="this.style.backgroundColor='#b91c1c'" onmouseout="this.style.backgroundColor='#dc2626'">
            Simpan
        </button>
    </div>
@endsection