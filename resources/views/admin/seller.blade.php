<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Seller') }}
        </h2>
    </x-slot>
<table class="table" id="sellerTable">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($list as $seller)
    <tr>
      <th scope="row">{{$seller->id}}</th>
      <td>{{$seller->name}}</td>
      <td>{{$seller->email}}</td>
      <td>
      
      <form 
          action="{{route('seller.privilege', $seller->id)}}"
          method="POST"
          id="seller_form_{{$seller->id}}" 
          class="d-none"
      >
          @csrf
          <input 
              type="hidden" 
              name="film" 
              value="{{$seller->id}}"
          >
      </form>
      <a
          href="#"
          class="btn btn-danger btn-sm switch_btn"
          data-id="{{$seller->id}}"
      >
          <i class="fa fa-exchange"></i> switch to buyer
      </a>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
@push('script')
<script>
  $(document).ready( function () {
    $('#sellerTable tbody').on('click', '.switch_btn', function () {
                let sellerId = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, switch it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(`#seller_form_${sellerId}`).trigger('submit');
                    }
                });
            });
        } );
        
</script>
@endpush
</x-app-layout>