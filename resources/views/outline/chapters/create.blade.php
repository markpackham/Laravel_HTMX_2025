@extends('layouts.app')

@section('content')
  <h1 class="page-title">Create a New Chapter</h1>

  @fragment('create-chapter-form')
    <div class="chapter-edit-form content">
    <form 
    method="POST" 
    action="{{ route('outline.chapters.store') }}" 
    class="create-form"
    @if($isHtmx)
    {{-- Htmx triggered when form submitted & disabled the default POST --}}
      hx-post="{{ route('outline.chapters.store') }}"
      hx-target=".chapter-list"
      hx-swap="outerHTML"
    @endif
    >
    @csrf

    <div class="form-group">
      <label for="title">Chapter Title</label>
      <input type="text" id="title" name="title" class="form-input" required>

      @error('title')
      <div class="form-error">{{ $message }}</div>
    @enderror
    </div>

    <div class="form-group">
      <label for="description" class="form-label">Description</label>
      <textarea id="description" name="description"></textarea>

      @error('description')
      <div class="form-error">{{ $message }}</div>
    @enderror
    </div>

    <div class="form-actions">
      <button type="submit">Create Chapter</button>
    </div>
    </form>
    @endfragment
  </div>
@endsection