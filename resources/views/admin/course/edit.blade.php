@extends('adminlte::page')

@section('title', 'Kursus | Course Manager')

@section('content_header')
    <div class="d-flex">
        <div>
            <span class="d-flex flex-row">
                <h4>Kursus</h4>
                <h5 class="text-muted ml-1 mt-auto">- Edit Kursus</h5>
            </span>
            <p class="text-muted mb-0">Sesuaikan kursus ini sesuai keinginan Anda!</p>
        </div>
    </div>
@stop

@section('content')
    <form action="{{ route('courses.update', $course) }}" method="post">
        @csrf
        @method('PUT')
        <x-adminlte-card theme="primary" theme-mode="outline">
            <div class="row">
                <x-adminlte-input name="title" label="Judul" placeholder="Judul yang inspiratif & informatif~" fgroup-class="col-md-6" value="{{ $course->title }}"/>
                <x-adminlte-input type="number" min="0" name="duration" label="Durasi" placeholder="Perlu berapa jam belajarnya?" fgroup-class="col-md-6" value="{{ $course->duration }}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text">
                            Jam
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="row">
                <x-adminlte-textarea name="description" label="Deskripsi" rows=3 placeholder="Jelaskan tujuan, materi, dan manfaat apa saja yang akan didapatkan!" fgroup-class="col">
                    {{ $course->description }}
                </x-adminlte-textarea>
            </div>
            <x-slot name="footerSlot">
                <div class="d-flex">
                    <x-adminlte-button type="submit" class="ml-auto" theme="success" label="Simpan Perubahan"/>
                </div>
            </x-slot>
        </x-adminlte-card>
    </form>
@stop
