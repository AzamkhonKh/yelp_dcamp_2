@extends('layouts.admin')

@section('content')
<!-- Basic -->
<div class="block block-rounded">
            @if(empty($errors))
              {{ var_dump($errors) }}
            @endif
            <div class="block-header block-header-default">
              <h3 class="block-title">{{ $organisation->legal_name }}</h3>
            </div>
            <div class="block-content">
              <form action="{{ route('web.organisation.update', ['id'=> $organisation->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
                <div class="row push">
                  <div class="col-lg-4">
                    <p class="text-muted">
                      The most often used inputs you know and love
                    </p>
                  </div>
                  <div class="col-lg-8 col-xl-5">
                    <div class="mb-4">
                      <label class="form-label" for="example-text-input">Organisation legal name</label>
                      <input type="text" class="form-control" id="example-text-input" value="{{ $organisation->legal_name }}" name="legal_name" placeholder="Text Input">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="example-text-input">
                        source
                    </label>
                      <input 
                        type="text" 
                        class="form-control" 
                        id="example-text-input" 
                        value="{{ $organisation->source }}" 
                        name="source" 
                        placeholder="Text Input">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="example-text-input">
                        inn
                    </label>
                      <input 
                        type="text" 
                        class="form-control" 
                        id="example-text-input" 
                        value="{{ $organisation->inn }}" 
                        name="inn" 
                        placeholder="Text Input">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="example-text-input">
                        location
                    </label>
                      <input 
                        type="text" 
                        class="form-control" 
                        id="example-text-input" 
                        value="{{ $organisation->location }}" 
                        name="location" 
                        placeholder="Text Input">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="example-text-input">
                        head person name
                    </label>
                      <input 
                        type="text" 
                        class="form-control" 
                        id="example-text-input" 
                        value="{{ $organisation->head_person_name }}" 
                        name="head_person_name" 
                        placeholder="Text Input">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="example-textarea-input">Descripion</label>
                      <textarea class="form-control" id="example-textarea-input" name="description" rows="4" placeholder="Textarea content..">
                        {{ $organisation->description }}
                      </textarea>
                    </div>
                    <div class="mb-4" style="display:flex; justify-content:end;">
                        <input type="submit" value="Edit">
                    </div>
                </div>
              </form>
            </div>
          </div>
          <!-- END Basic -->

@endsection