@extends('adminlte::page')

@section('title', 'Material | Course Manager')

@section('content_header')
    <div class="d-flex">
        <div>
            <span class="d-flex flex-row">
                <h4>Material</h4>
                <h5 class="text-muted ml-1 mt-auto">- Edit Material</h5>
            </span>
            <p class="text-muted mb-0">Sesuaikan material ini sesuai keinginan Anda!</p>
        </div>
    </div>
@stop

@section('content')
    <form action="{{ route('materials.update', $material) }}" method="post">
        @csrf
        @method('PUT')
        <x-adminlte-card theme="primary" theme-mode="outline">
            <div class="row">
                <x-adminlte-input name="title" label="Judul" placeholder="Judul yang inspiratif & informatif~" fgroup-class="col" value="{{ $material->title }}"/>
            </div>
            <div class="row">
                <x-adminlte-textarea name="description" label="Deskripsi" rows=3 placeholder="Jelaskan tujuan, materi, dan manfaat apa saja yang akan didapatkan!" fgroup-class="col">
                    {{ $material->description }}
                </x-adminlte-textarea>
            </div>
            <div class="row">
                <x-adminlte-textarea name="embed_link" label="Embed Link" rows=3 placeholder="Masukkan link embed video atau gambarnya!" fgroup-class="col">
                    {{ $material->embed_link }}
                </x-adminlte-textarea>
            </div>
            <x-adminlte-input name="course_id" class="d-none" value="{{ $material->course_id }}"/>
            <x-slot name="footerSlot">
                <div class="d-flex">
                    <x-adminlte-button type="submit" class="ml-auto" theme="success" label="Simpan Perubahan"/>
                </div>
            </x-slot>
        </x-adminlte-card>
    </form>
@stop
