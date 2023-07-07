@extends('admin.layouts.base')

@section('contents')

    <h1>Projects</h1>

    {{-- @if (session('delete_success'))
        @php $project = session('delete_success') @endphp
        <div class="alert alert-danger">
            La project "{{ $project->titolo }}" è stata eliminata
            <form
                action="{{ route("admin.projects.restore", ['project' => $project]) }}"
                    method="project"
                    class="d-inline-block"
                >
                @csrf
                <button class="btn btn-warning">Ripristina</button>
            </form>
        </div>
    @endif

    @if (session('restore_success'))
        @php $project = session('restore_success') @endphp
        <div class="alert alert-success">
            La project "{{ $project->titolo }}" è stata ripristinata
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
                        <form
                            action="{{ route('admin.projects.destroy', ['project' => $project]) }}"
                            method="project"
                            class="d-inline-block"
                        >
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $projects->links() }}

@endsection