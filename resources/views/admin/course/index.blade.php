@extends('adminlte::page')

@section('title', 'Kursus | Course Manager')

@section('php')
@php
$heads = [
    ['label' => 'No', 'width' => 3],
    'Judul',
    'Deskripsi',
    'Durasi',
    ['label' => 'Opsi', 'width' => 12],
];

$query = [];
$loop = 1;

foreach ($courses as $course) {
    $btnDetails = '<a href="' . route('courses.show', $course) . ' ">
                    <button class="btn btn-sm btn-info text-light m-1 shadow-sm" title="Details">
                        <i class="fa fa-fw fa-eye mr-1"></i>Rincian
                    </button>
                </a>';
    $btnEdit = '<a href="' . route('courses.edit', $course) . ' ">
                    <button class="btn btn-sm btn-success text-light m-1 shadow-sm" title="Details">
                        <i class="fa fa-fw fa-pen mr-1"></i>Edit
                    </button>
                </a>';
    $btnDelete = '<button class="btn btn-sm btn-danger text-light m-1 shadow-sm" title="Details" data-toggle="modal" data-target="#modalDeleteCourse_' . $course->id . '">
                    <i class="fa fa-fw fa-trash mr-1"></i>Hapus
                </button>';

    $query[] = [
        $loop,
        $course->title,
        $course->description,
        $course->duration . ' Jam',
        $btnDetails . $btnEdit . $btnDelete,
    ];

    $loop++;
}

$config = [
    'data' => $query,
    'columns' => [['className' => 'text-center'], null, null, null, ['orderable' => false, 'className' => 'text-center']],
    'language' => ['url' => 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/id.json'],
    'responsive' => true,
];
@endphp
@endsection

@section('content_header')
    <div class="d-flex">
        <div>
            <h4>Kursus</h4>
            <p class="text-muted mb-0">Kelola kursus-kurus yang ada pada Course Manager!</p>
        </div>
        <div class="ml-auto mt-auto">
            <x-adminlte-button label="Buat Kursus Baru" theme="primary" icon="fas fa-plus" data-toggle="modal" data-target="#modalCreateCourse"/>
        </div>
    </div>
@stop

@section('content')
    <x-adminlte-card theme="primary" theme-mode="outline">
        @if (session('success'))
            <x-adminlte-alert theme="success" title="Pemberitahuan" dismissable>
                {{ session('success') }}
            </x-adminlte-alert>
        @endif

        <x-adminlte-datatable id="tableCourse" :heads="$heads" striped hoverable bordered>
            @foreach($config['data'] as $row)
                <tr>
                    @foreach($row as $cell)
                        <td>{!! $cell !!}</td>
                    @endforeach
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>

    <form action="{{ route('courses.store') }}" method="post">
        @csrf
        <x-adminlte-modal id="modalCreateCourse" title="Buat Kursus" v-centered>
            <p class="text-muted">Tambahkan kursus dan bagikan pengetahuan pada dunia!</p>
            <div class="row">
                <x-adminlte-input name="title" label="Judul" placeholder="Judul yang inspiratif & informatif~" fgroup-class="col"/>
            </div>
            <div class="row">
                <x-adminlte-input type="number" min="0" name="duration" label="Durasi" placeholder="Perlu berapa jam belajarnya?" fgroup-class="col">
                    <x-slot name="appendSlot">
                        <div class="input-group-text">
                            Jam
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="row">
                <x-adminlte-textarea name="description" label="Deskripsi" rows=3 placeholder="Jelaskan tujuan, materi, dan manfaat apa saja yang akan didapatkan!" fgroup-class="col"/>
            </div>
            <x-slot name="footerSlot">
                <x-adminlte-button theme="secondary" label="Batal" data-dismiss="modal"/>
                <x-adminlte-button theme="primary" label="Kirim" type="submit"/>
            </x-slot>
        </x-adminlte-modal>
    </form>

    @foreach ($courses as $course)
    <form action="{{ route('courses.destroy', $course) }}" method="post">
        @csrf
        @method('delete')
        <x-adminlte-modal id="modalDeleteCourse_{{ $course->id }}" title="Hapus Kursus" v-centered>
            <p>
                Apakah anda yakin ingin menghapus kursus
                "<strong>{{ $course->title }}</strong>"?
            </p>
            <x-slot name="footerSlot">
                <x-adminlte-button theme="secondary" label="Batal" data-dismiss="modal"/>
                <x-adminlte-button theme="danger" label="Hapus" type="submit"/>
            </x-slot>
        </x-adminlte-modal>
    </form>
    @endforeach
@stop
