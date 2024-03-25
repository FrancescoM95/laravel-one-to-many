@extends('layouts.app')

@section('title', 'Project')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
      <h1 class="py-3">Projects</h1>
      <div>
        <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Torna alla lista</a>
      </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
          <div class="d-flex">
            <img src="{{ $project->printImage() }}" class="card-img-top me-3 mb-3 img-fluid" alt="{{ $project->title }}">
            <div class="div">
              <h3 class="card-title">{{ $project->title }}</h3>
              <p class="card-text">{{ $project->content }}</p>
            </div>
          </div>
          
          
          <div>
            <strong>Linguaggi di programmazione:</strong>
            {{ $project->programming_languages }}.
          </div>


          <div class=" d-flex flex-column align-items-end gap-2">
            <div>
                <strong>Data creazione:</strong>
                {{ $project->getCreatedAt() }}
            </div>
            <div>
                <strong>Data ultima modifica:</strong>
                {{ $project->getUpdatedAt() }}
            </div>
          </div>

          <div class="d-flex justify-content-end mt-4">
            <div class="d-flex gap-2">
              <a href="{{ route('admin.projects.edit', $project->id)}}" class="btn btn-secondary">
                Modifica
              </a>
              <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" id="delete-form">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Elimina</button>
              </form>
            </div>
            
          </div>
          
        </div>
      </div>
@endsection

@section('scripts')
    <script>
        const deleteForm = document.getElementById('delete-form');

        deleteForm.addEventListener('submit', e => {
            e.preventDefault();

            const confirmation = confirm('Sei sicuro di voler spostare questo progetto nel cestino?');

            if(confirmation) deleteForm.submit();
        });
    </script>
@endsection