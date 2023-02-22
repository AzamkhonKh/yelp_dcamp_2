@extends('layouts.admin')

@section('content')


          <!-- Striped Table -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Tags index</h3>
              <div class="block-options">
                <div class="block-options-item">
                  <button 
                    type="button" 
                    class="btn btn-alt-primary" 
                    data-bs-toggle="modal" 
                    data-bs-target="#modal-normal">
                    Create Organisation
                  </button>
                </div>
              </div>
            </div>
            <div class="block-content">
              <table class="table table-striped table-vcenter">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 50px;"></th>
                    <th>Name</th>
                    <th class="text-center" style="width: 100px;">Actions</th>
                  </tr>
                </thead>
                <tbody>

                @foreach($tags as $org)
                  <tr>
                    <td class="text-center" style="width: 50px;"></td>
                    <td>{{ $org->name }}</td>
                    <td class="text-center">
                      <div class="btn-group">
                        
                        <button 
                          type="button" 
                          class="btn btn-sm btn-secondary" 
                          data-bs-toggle="modal" 
                          data-bs-target="#modal-normal-{{ $org->id }}">
                        >
                          <i class="fa fa-pencil-alt"></i>
                        </button>
                        <form action="{{ route('web.tag.destroy', $org->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                            <i class="fa fa-times"></i>
                            </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>

              {{ $tags->links('vendor.pagination.my') }}
            </div>
          </div>
          <!-- END Striped Table -->

  @include('admin.components.create_tag_model')

  @foreach($tags as $t)
    @include('admin.components.edit_tag_model', ['tag' => $t])
  @endforeach
@endsection