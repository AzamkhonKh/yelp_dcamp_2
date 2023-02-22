@extends('layouts.admin')

@section('content')


          <!-- Striped Table -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Orgnisations index</h3>
              <div class="block-options">
                <div class="block-options-item">
                  <a href="{{ route('web.organisation.create') }}" type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Create">
                    <i class="fa fa-pencil-alt"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="block-content">
              <table class="table table-striped table-vcenter">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 50px;"></th>
                    <th>Legal name</th>
                    <th>Source</th>
                    <th>INN</th>
                    <th class="text-center" style="width: 100px;">Actions</th>
                  </tr>
                </thead>
                <tbody>

                @foreach($organisations as $org)
                  <tr>
                    <td class="text-center" style="width: 50px;"></td>
                    <td>{{ $org->legal_name }}</td>
                    <td>{{ $org->source }}</td>
                    <td>{{ $org->inn }}</td>
                    <td class="text-center">
                      <div class="btn-group">
                        
                        <a href="{{ route('web.organisation.show', $org->id) }}" type="button" class="btn btn-sm btn-secondary pr-2" data-bs-toggle="tooltip" title="Show">
                          <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('web.organisation.edit', $org->id) }}" type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                          <i class="fa fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('web.organisation.destroy', $org->id) }}" method="POST">
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

              {{ $organisations->links('vendor.pagination.my') }}
            </div>
          </div>
          <!-- END Striped Table -->


@endsection