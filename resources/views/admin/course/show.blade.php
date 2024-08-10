@extends('adminlte::page')

@section('title', 'Kursus - Materi | Course Manager')

@section('php')
@php
$heads = [
    ['label' => 'No', 'width' => 3],
    'Judul',
    'Deskripsi',
    ['label' => 'Embed Link', 'style' => 'width: 256px'],
    ['label' => 'Opsi', 'width' => 12],
];

$query = [];
$loop = 1;

foreach ($course->materials as $material) {
    $btnEdit = '<a href="' . route('materials.edit', $material) . ' ">
                    <button class="btn btn-sm btn-success text-light m-1 shadow-sm" title="Details">
                        <i class="fa fa-fw fa-pen mr-1"></i>Edit
                    </button>
                </a>';
    $btnDelete = '<button class="btn btn-sm btn-danger text-light m-1 shadow-sm" title="Details" data-toggle="modal" data-target="#modalDeleteMaterial_' . $material->id . '">
                    <i class="fa fa-fw fa-trash mr-1"></i>Hapus
                </button>';

    $query[] = [
        $loop,
        $material->title,
        $material->description,
        $material->embed_link,
        $btnEdit . $btnDelete,
    ];

    $loop++;
}

$config = [
    'data' => $query,
    'columns' => [['className' => 'text-center'], null, null, ['orderable' => false], ['orderable' => false, 'className' => 'text-center']],
    'language' => ['url' => 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/id.json'],
    'responsive' => true,
];
@endphp
@endsection

@section('javascript')
<script>

</script>
@endsection

@section('content_header')
    <div class="d-flex">
        <div>
            <span class="d-flex flex-row">
                <a href="{{ route('courses.index') }}" class="text-dark">
                    <h4>Materi Kursus</h4>
                </a>
                <h5 class="text-muted ml-1 mt-auto">- {{ $course->title }}</h5>
            </span>
            <p class="text-muted mb-0">Kelola materi-materi yang luar biasa dari kursus ini!</p>
        </div>
        <div class="ml-auto mt-auto">
            <x-adminlte-button label="Buat Materi Baru" theme="primary" icon="fas fa-plus" data-toggle="modal" data-target="#modalCreateMaterial"/>
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

    <form action="{{ route('materials.store') }}" method="post">
        @csrf
        <x-adminlte-modal id="modalCreateMaterial" title="Buat Kursus" v-centered>
            <p class="text-muted">Tambahkan kursus dan bagikan pengetahuan pada dunia!</p>
            <div class="row">
                <x-adminlte-input name="title" label="Judul" placeholder="Judul yang inspiratif & informatif~" fgroup-class="col"/>
            </div>
            <div class="row">
                <x-adminlte-textarea name="description" label="Deskripsi" rows=3 placeholder="Jelaskan tujuan, materi, dan manfaat apa saja yang akan didapatkan!" fgroup-class="col"/>
            </div>
            <div class="row">
                <x-adminlte-textarea name="embed_link" label="Embed Link" rows=3 placeholder="Masukkan link embed video atau gambarnya!" fgroup-class="col"/>
            </div>
            <x-adminlte-input name="course_id" class="d-none" value="{{ $course->id }}"/>
            <x-slot name="footerSlot">
                <x-adminlte-button theme="secondary" label="Batal" data-dismiss="modal"/>
                <x-adminlte-button theme="primary" label="Kirim" type="submit"/>
            </x-slot>
        </x-adminlte-modal>
    </form>

    @foreach ($course->materials as $material)
    <form action="{{ route('materials.destroy', $material) }}" method="post">
        @csrf
        @method('delete')
        <x-adminlte-modal id="modalDeleteMaterial_{{ $material->id }}" title="Hapus Materi" v-centered>
            <p>
                Apakah anda yakin ingin menghapus materi
                "<strong>{{ $material->title }}?</strong>"?
            </p>
            <x-slot name="footerSlot">
                <x-adminlte-button theme="secondary" label="Batal" data-dismiss="modal"/>
                <x-adminlte-button theme="danger" label="Hapus" type="submit"/>
            </x-slot>
        </x-adminlte-modal>
    </form>
    @endforeach
@stop
