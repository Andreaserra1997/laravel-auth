@extends('admin.layouts.base')

@section('contents')

    <h1>Projects</h1>

    @if (session('delete_success'))
        @php $project = session('delete_success') @endphp
        <div class="alert alert-danger">
            Il project "{{ $project->name }}" è stato eliminato
            {{-- <form
                action="{{ route("admin.projects.restore", ['project' => $project]) }}"
                    method="project"
                    class="d-inline-block"
                >
                @csrf
                <button class="btn btn-warning">Ripristina</button>
            </form> --}}
        </div>
    @endif

    {{-- @if (session('restore_success'))
        @php $project = session('restore_success') @endphp
        <div class="alert alert-success">
            Il project "{{ $project->name }}" è stato ripristinato
        </div>
    @endif --}}

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome Progetto</th>
                <th scope="col">Nome Cliente</th>
                <th scope="col">Data</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->client_name }}</td>
                    <td>{{ $project->date }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.projects.show', ['project' => $project]) }}">View</a>
                        <a class="btn btn-warning" href="{{ route('admin.projects.edit', ['project' => $project]) }}">Edit</a>

                        <button type="button" class="btn btn-danger js-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id={{ $project->id}}>
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Conferma elimina</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare definitivamente il project?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                    <form
                        action=""
                        data-template="{{ route('admin.projects.destroy', ['project' => '*****']) }}"
                        method="post"
                        class="d-inline-block"
                        id="confirm-delete"
                    >
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">SI</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{ $projects->links() }}

@endsection