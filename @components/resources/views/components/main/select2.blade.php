<div>
    <div wire:ignore>
        <select class="form-control" id="select2-dropdown"  {{$attributes}} multiple >
            <option value="">Select Option</option>
          <option value="dasda">dasdasd</option>
          <option value="dasda">dasdasd</option>
          <option value="dasda">dasdasd</option>
          <option value="dasda">dasdasd</option>
          <option value="dasda">dasdasd</option>
        </select>
    </div>
</div>

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#select2-dropdown').select2();
            $('#select2-dropdown').on('change', function(e) {
                var data = $('#select2-dropdown').select2("val");
                @this.set('usersss', data);
            });
        });
    </script>
@endpush
