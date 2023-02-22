@extends('layouts.admin')

@section('css')
<style>
  .data {
    display: inline;
  }
  .value {
    display: inline;
    width: 50%;
  }
</style>
@endsection

@section('content')
<!-- Basic -->
<div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">{{ $organisation->legal_name }}</h3>
            </div>
            <div class="block-content">
                <div class="row push">
                  <div class="col-lg-4">
                    <p class="text-muted">
                      The most often used inputs you know and love
                    </p>
                  </div>
                  <div class="col-lg-8 col-xl-5">
                      @include('admin.components.key_val', [
                        'key' => 'Organisation legal name',
                        'value' => $organisation->legal_name
                      ])
                      @include('admin.components.key_val', [
                        'key' => 'source',
                        'value' => $organisation->source
                      ])
                      @include('admin.components.key_val', [
                        'key' => 'inn',
                        'value' => $organisation->inn
                      ])
                      @include('admin.components.key_val', [
                        'key' => 'location',
                        'value' => $organisation->location
                      ])
                      @include('admin.components.key_val', [
                        'key' => 'head person name',
                        'value' => $organisation->head_person_name
                      ])
                      @include('admin.components.key_val', [
                        'key' => 'head person name',
                        'value' => $organisation->head_person_name
                      ])
                    <div class="mb-4">
                      <label class="form-label" for="example-textarea-input">Descripion</label>
                      <textarea class="form-control" id="example-textarea-input" name="description" rows="4" placeholder="Textarea content.." disabled>
                        {{ $organisation->description }}
                      </textarea>
                    </div>
                    <div class="mb-4">
                      <label for="example-textarea-input">Comments</label>
                    </div>
                    <div class="mb-4">
                      @foreach($organisation->comments as $c)
                        @include('admin.components.comment', ['comment' => $c])
                      @endforeach
                    </div>
                </div>
            </div>
          </div>
          <!-- END Basic -->

@endsection